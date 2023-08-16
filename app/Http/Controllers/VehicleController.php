<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Store;
use App\Models\Car;

use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Vehicle::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('model', 'like', "%{$search}%");
            });
        }

        $vehicles = $query->orderBy('id', 'desc')->get();
        return view('car_home', compact('vehicles'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
       

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,string $id)
    {
        // $car = Vehicle::find($id);
        $store = $request->input('branch');
      $car = Vehicle::with(['Vehicle_rate','car'])->find($id);
      $branch = Store::all();


  



      $vehicles = Car::where([
        ['branch_id',$store],
        ['vehicle_id',$id],
        ['vehicle_status',1]

    ])->get();

   

        return  view('car_info',compact('car','branch','vehicles'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
