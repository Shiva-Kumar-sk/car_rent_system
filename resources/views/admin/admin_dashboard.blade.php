@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
               @if(session('success'))
                   <div class="alert alert-success mt-3">{{ session('success') }}</div>
               @endif

               @if(session('error'))
                 <div class="alert alert-danger mt-3">{{ session('error') }}</div>
               @endif
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
              
            </div>
        </div>
    </div>
</div>
@endsection