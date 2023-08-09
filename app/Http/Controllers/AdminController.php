<?php

namespace App\Http\Controllers;

use App\Mail\MyCustomerMail;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Vehicle;
use App\Models\Rate;
use App\Models\Payment;
use App\Models\User;
use DateTime;
use Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail as FacadesMail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Booking::where('status', 1)->get();
        // return $data;
        return view('admin/admin_dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function test_mail()
    {
        $details = [
            "title" => "this is title  fo email test",
            "message" => "this is message for test"
        ];
        Mail::to("sksinghsingh355@gmail.com")->send(new MyCustomerMail($details));
        return redirect('/');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Booking::where('status', 1)->find($id);
        if($data == null){
            return redirect(url('/admin'))->with('error','Data Not found');

        }


        return view('admin/car_submission', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function extra_payment(Request $request, $id)
    {

        $data = Booking::where('status', 1)->find($id);

        $user = User::where('id', $data->user_id)->first();





        $date1 = $data->drop_of_date;
        $date2 = $request->input('actual_drop_time');

        $timestamp1 = strtotime($date1);

        $timestamp2 = strtotime($date2);
        $hour = abs($timestamp2 - $timestamp1) / (60 * 60);
        $cost = $hour * $data->cost_per_hour;
        $cost_data = round($cost, 2);
        $hour_data = round($hour, 2);

        // date string

        $dateString = $request->actual_drop_time;
        $dateTime = new DateTime($dateString);

        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');

        if ($formattedDateTime > $data->drop_of_date && $data->car_submitted == null) {







            $payload = array(

                'purpose' => $data->id,

                'amount' => $cost_data,



                'phone' => $data->mobile,

                'buyer_name' => $user->name,

                'redirect_url' => "http://127.0.0.1:8000/extra_payment_redirect?purpose=$data->id",

                'send_email' => true,

                'send sms' => true,
                'email' => $user->email,

                'allow_repeated payments' => false,



            );
            $response = Http::withHeaders([
                "X-Api-Key" => config('app.instamojo_key'),
                "X-Auth-Token" => config('app.instamojo_secret')
                // "X-Api-Key" => "test_1cae406fe1cbbb3bcd14bbad0ff",
                // "X-Auth-Token" => "test_c33c051cb54f5503a101911ab4e"
            ])->post('https://test.instamojo.com/api/1.1/payment-requests/', $payload);

            $response = json_decode($response);





            Booking::where('id', $data->id)
                ->update([
                    'actual_drop_time' => $request->input('actual_drop_time'),
                    'over_cost_money' => $cost_data,
                    'extra_hour' => $hour_data,
                    'over_cost_invoice_link' => $response->payment_request->longurl
                ]);
            Payment::where('booking_id', $data->id)
                ->update([
                    'over_cost_money' => $cost_data,
                    'is_extra_cost' => 1
                ]);



            $details = [
                "title" => "Dear $user->name You have have to pay over cost for over time please pay payment link is below.",
                "message" => $response->payment_request->longurl
            ];
            Mail::to($user->email)->send(new MyCustomerMail($details));





            return back()->with('error', '!! this user has extra  cost  !!');
        } else {
            Booking::where('id', $data->id)
                ->update([
                    'actual_drop_time' => $request->input('actual_drop_time'),
                    'car_submitted' => 1,
                    'status' => 3


                ]);

            Car::where('id', $data->car_id)
                ->update([
                    'vehicle_status' => 1

                ]);
            return redirect(url('/admin'))->with('success', '!! car submitted  successfully !!');

           
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function extra_payment_redirect(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/' . $request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key: test_1cae406fe1cbbb3bcd14bbad0ff",
                "X-Auth-Token:test_c33c051cb54f5503a101911ab4e"
            )
        );

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        //    #to day

        $booking_id = Booking::find($request->purpose);


        if ($booking_id->id  == $request->purpose && $response->success == true && $response->payment->status == 'Credit' && $response->payment->failure == null) {
            Booking::where('id', $request->purpose)
                ->update([
                    'car_submitted' => 1,
                    'is_extra_cost_paid' => 1,
                    'status' => 3,

                ]);
            Payment::where('booking_id', $request->purpose)
                ->update([
                    'is_extra_cost' => null,

                ]);

            Car::where('id', $booking_id->car_id)
                ->update([
                    'vehicle_status' => 1

                ]);



            return redirect(url('/car_home'))->with('success', 'extra cost payment success');
        }
    }
}
