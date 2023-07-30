@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
               {{-- {{ print_r($data);}} --}}
               <table>
                    <tr>
                        <th>id</th>
                        <th>user id</th>
                        <th>car id</th>
                        <th>mobile</th>
                        <th>pick up time</th>
                        <th>drop of time</th>
                        <th>money</th>
                        <th>hours</th>
                        <th>booking id</th>
                        <th>Action</th>

                    </tr>    
                
                        @foreach ($data as $booked )
                        <tr>
                            <td> {{$booked->id}}</td>
                            <td> {{$booked->user_id}}</td>
                            <td> {{$booked->car_id}}</td>
                            <td> {{$booked->mobile}}</td>
                            <td> {{$booked->pick_up_date}}</td>
                            <td> {{$booked->drop_of_date}}</td>
                            <td> {{$booked->money}}</td>
                            <td> {{$booked->hours}}</td>
                            <td> {{$booked->booking_id}}</td>
                            <td><a href="{{route('admin.edit',$booked->id)}}" class="btn btn-success">actual drop of time</a></td>


                        </tr>
                        

                            
                        @endforeach
                   
                </table>
                {{-- <form method="POST" action="">
                    @csrf
                <div class="form group mb-3">
                    <label>Actual Drop off date time</label>  
                    <input type="datetime-local" required class="form-control" name="drop_of_date" id="drop_of_date" value="{{old('drop_of_date')}}">
                    <span class="text-danger">
                        @error('drop_of_date')
                        {{$message}}
                            
                        @enderror
                    </span>
                </div>
                <input class="btn btn-success" type="submit" name="submit" value="send">
        
                </form> --}}

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection