
@extends('layouts.app')
@section('title', 'Home Page')
@section('heading', 'All Vehicles')
@section('link_text', 'All Vehicles')
@section('link', '/home')

@section('content')

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('vehicle.home') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Vehicle" value="{{ request('search') }}">
        
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    @foreach ($vehicles as $row )
   <div class="col-sm-4 mb-4 border border-info rounded mt-2 bg-primary">
    <a href="{{route('vehicle.show',$row->id)}}" class="nav-link link-dark">
        <div><h2>{{$row->model}}</h2></div>
        <div><img src="{{ $row->image }}" class="card-img-top" alt="car Image"></div>
        <div class="row">
            <div class="col-6"><h2>{{$row->seating_capacity}}  <span>  People</span></h2></div>
        <div class="col-6"><h2>{{$row->fuel_type}}</h2></div>
        </div>
        
    </a>
   
   </div>

   @endforeach($car as $row)

</div>

@endsection