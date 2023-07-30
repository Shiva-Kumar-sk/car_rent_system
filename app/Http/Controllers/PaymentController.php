<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use Exception;
use Session;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class PaymentController extends Controller
{
    public function payment_submit1(Request $request)
    {

        $validate =  $request->validate([
            'hour_data' => 'required',
            'money_data' => 'required',
            'drop_of_date' => 'required',
            'pick_up_date' => 'required',
            'car' => 'required',
            'mobile' => 'required|numeric|digits:10',


        ]);
        $booking = Payment::create([
            'hours' => $request->input('hour_data'),
            'money' => $request->input('money_data'),
            'pick_up_date' => $request->input('pick_up_date'),
            'drop_of_date' => $request->input('drop_of_date'),
            'mobile' => $request->input('mobile'),
            'car_id' => $request->input('car'),
            'user_id' => auth()->user()->id
        ]);


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');

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

        $payload = array(

            'purpose' => $booking->id,

            'amount' => $request->money_data,

            'phone' => $request->mobile,

            'buyer_name' => Auth()->user()->name,

            'redirect_url' => "http://127.0.0.1:8000/redirect?purpose=$booking->id",

            'send_email' => true,

            'send sms' => true,
            'email' => Auth()->user()->email,

            'allow_repeated payments' => false


        );

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));

        $response = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($response);

        return redirect($response->payment_request->longurl);
    }


    public function redirect(Request $request)
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
        //  return response(["payment_details" => $response, "purpose" => $request->purpose]);


        // $booking_id = DB::table('bookings')->select('id')->where('id', $request->purpose);
       

        $booking_id = Booking::find($request->purpose);
        $booking_costumer_id = 'CR' . date("Y") . $request->purpose;

        if ($booking_id->id  == $request->purpose && $response->success == true && $response->payment->status == 'Credit' && $response->payment->failure == null ) {
              Booking::where('id', $request->purpose)
                ->update([
                    'status' => 1,
                    'booking_id' => $booking_costumer_id
                ]);
                Payment::where('booking_id', $request->purpose)
                ->update([
                    'status' => 1,
                    'payment_id' => $response->payment->payment_id
                ]);

                Car::where('id', $booking_id->car_id)
                ->update([
                    'vehicle_status' => 0
                
                ]);
        // return $response;

        return view('payment_done', compact('booking_costumer_id'));

        }
        elseif($booking_id->id  == $request->purpose && $response->success == true && $response->payment->status == 'Failed' && $response->payment->failure->reason == 'AUTHORIZATION_FAILED'){
            Payment::where('booking_id', $request->purpose)
                ->update([
                    'status' => 2,
                    'payment_id' => $response->payment->payment_id
                ]);
                // return 'one';
        return redirect(url('/payment-fail'))->with('error', 'Transaction was declined by the bank');


        }
        elseif($booking_id->id  == $request->purpose && $response->success == true && $response->payment->status == 'Failed' && $response->payment->failure->reason == 'AUTHENTICATION_FAILED'){
            Payment::where('booking_id', $request->purpose)
                ->update([
                    'status' => 2,
                    'payment_id' => $response->payment->payment_id
                ]);
                // return 'two';
            return redirect(url('/payment-fail'))->with('error', 'Payer did not complete authentication');
    
    
            }
        else{
            Payment::where('booking_id', $request->purpose)
                ->update([
                    'status' => 2
                
                ]);
                // return 'three';
        return redirect(url('/payment-fail'));

        }

        // return $response->success;
        // return $response;

        // return response(["payment_details" => $response, "purpose" => $request->purpose]);
    }


    public function payment_submit(Request $request, string $id)
    {
        $rate = Vehicle::with(['Vehicle_rate', 'car'])->find($id);
        //   return $rate->Vehicle_rate->cost;
        $cost_per_hour = $rate->Vehicle_rate->cost;

        $car = Car::find($request->car);
        if ($car == null) {
            return back()->with('error', '!! please select a car !!');
        }

        $date1 = $request->input('pick_up_date');
        $date2 = $request->input('drop_of_date');
        $timestamp1 = strtotime($date1);

        $timestamp2 = strtotime($date2);
        $hour = abs($timestamp2 - $timestamp1) / (60 * 60);
        $cost = $hour * $rate->Vehicle_rate->cost;
        $cost_data = round($cost, 2);
        $hour_data = round($hour, 2);



        // return $car ;

        $validate =  $request->validate([
            'hour_data' => 'required',
            'money_data' => 'required',
            'drop_of_date' => 'required',
            'pick_up_date' => 'required',
            'car' => 'required',
            'mobile' => 'required|numeric|digits:10',


        ]);
        $booking = Booking::create([
            'hours' => $hour_data,
            'money' => $cost_data,
            'cost_per_hour'=> $cost_per_hour,
            'pick_up_date' => $request->input('pick_up_date'),
            'drop_of_date' => $request->input('drop_of_date'),
            'mobile' => $request->input('mobile'),
            'car_id' => $request->input('car'),
            'status' => 0,
            'user_id' => auth()->user()->id
        ]);

        Payment::create([
            'booking_id' => $booking->id,
            'amount' => $cost_data,
            'status' => 0,
            'payment_id' => 'null'
        ]);

        $payload = array(

            'purpose' => $booking->id,

            'amount' => $cost_data,

            'phone' => $request->mobile,

            'buyer_name' => Auth()->user()->name,

            'redirect_url' => "http://127.0.0.1:8000/redirect?purpose=$booking->id",

            'send_email' => true,

            'send sms' => true,
            'email' => Auth()->user()->email,

            'allow_repeated payments' => false,



        );
        $response = Http::withHeaders([
            "X-Api-Key" => config('app.instamojo_key'),
            "X-Auth-Token" => config('app.instamojo_secret')
            // "X-Api-Key" => "test_1cae406fe1cbbb3bcd14bbad0ff",
            // "X-Auth-Token" => "test_c33c051cb54f5503a101911ab4e"
        ])->post('https://test.instamojo.com/api/1.1/payment-requests/', $payload);

        $response = json_decode($response);
        // return $response;


        return redirect($response->payment_request->longurl);
    }



    public function payment_success()
    {
        return view('payment_done');
    }


    public function payment_fail()
    {
        return view('payment_fail');
    }
}
