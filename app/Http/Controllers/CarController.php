<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        $branch = $request['branch'] ?? "";
        if($search != ""){
            $car = Car::where("model", "like", "%$search%")->orwhere("rate", "like", "%$search%")->get();
        }else{
            $car = Car::all();
        }
        if($branch != ""){
            $car = Car::where("branch", "like", "%$branch%")->get();


         }
        return view('car_home',['car' => $car]);


        // $car = Car::all();
        // return view('car_home', ['car' => $car]);
        // $search = $request->input('search');
        // $branch = $request->input('branch');
        // $query = Car::query();

        // if ($search) {
        //     $query->where(function ($q) use ($search) {
        //         $q->where('model', 'like', "%{$search}%")
        //             ->orWhere('rate', 'like', "%{$search}%");
        //     });
        // }

        // if ($branch) {
        //     $query->where('Branch', $branch);
        // }

        // $car = $query->orderBy('id', 'desc')->get();
        // // $post_count = $query->count();
        // $users = Car::select('id','model')->get();
        // return view('home', compact('car','branch'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
