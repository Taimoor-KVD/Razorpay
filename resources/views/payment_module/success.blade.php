@extends('layouts.app')

@section('content')
    <!-- Custom Css for hidding navbar -->
    <style>
        nav
        {
            visibility: hidden;
        }
    </style>

    <!-- Content -->
    <div class="container col-6">
    <div class="text-center">
                    <img src="{{ asset('img/success.png') }}" class="img-fluid" width="150" >
                </div>
        <div class="card">
            <div class="card-body">
                <!-- Paragraph -->
                <div class="text-center">
                    <h5>Your payment has been processed</h5>     
                    <!-- End paragraph -->
                    <a href="{{ url('/') }}" class="btn btn-info btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection