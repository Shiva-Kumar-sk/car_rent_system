@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ _('Payment Fail') }}</div>
                <div class="text-center mb-4">
                    @if(session('error'))
                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                    @endif

                    <h1 class="">!Oh Somthing Went Wrong</h1>
                    <strong class="text-danger"> We aren't able to process your payment, Please try again. </strong><br>
                    <a href="javascript:history.back()" class="btn btn-success">Try Again</a>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection