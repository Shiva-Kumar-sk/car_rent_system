
@extends('layouts.app')
@section('title', 'Home Page')
@section('heading', 'All Vehicles')
@section('link_text', 'All Vehicles')
@section('link', '/home')

@section('content')

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('car.home') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                <select name="branch" class="form-control ml-2">
                    <option value="">All Branches</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ request('branch') == $branch->id ? 'selected' : '' }}>{{ $branch->branch }}</option>
                    @endforeach
                </select>
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
    <a href="{{route('car.show',$row->id)}}" class="nav-link link-dark">
        <div>{{$row->model}}</div>
        <div><img src="{{ $row->image }}" class="card-img-top" alt="car Image"></div>
        <div class="row">
            <div class="col-6">{{$row->seating_capacity}}  <span>  People</span></div>
        <div class="col-6">{{$row->fuel_type}}</div>
        </div>
        
    </a>
   
   </div>

   @endforeach($car as $row)

</div>

@endsection