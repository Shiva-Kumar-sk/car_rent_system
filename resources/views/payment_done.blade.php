@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ _('Payment Done') }}</div>
                <div class="text-center mb-4">

                    <h1 class=" text-success"> Thank You!</h1>
                    <strong> Payment Done Successfully </strong><br>
                    <strong> <span class="text-primary">Your Booking Id </span> {{$booking_costumer_id}} </strong><br>

                    <a href="/car_home" class="btn btn-success">HOME</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
