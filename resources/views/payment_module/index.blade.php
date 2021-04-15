@extends('layouts.app')

@section('content')
    <!-- Custom Css for hidding navbar -->
    <style>
        nav
        {
            visibility: hidden;
        }
        img
        {
            margin-top: -40px;
        }
        
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button 
        {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] 
        {
            -moz-appearance: textfield;
        }

    </style>

    <!-- Content -->
    <div class="container col-6">
        <div class="text-center">
            <img src="{{ asset('img/coffee.png') }}" class="img-fluid" width="150" >
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-title">
                            <h4>Payment Gateway</h4>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        @if(Session::has('data'))
                            <!-- Razorpay Integration Form -->
                            <form action="{{ url('pay') }}" method="POST">
                                <script
                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="rzp_test_KRQjWCJfgLUgA6"
                                    data-amount="{{ Session::get('data.amount') }}"
                                    data-currency="INR"
                                    data-order_id="{{ Session::get('data.order_id') }}"
                                    data-buttontext="Pay online"
                                    data-name="Coffee Shop"
                                    data-description="Coffee Shop transaction"
                                    data-theme.color="#F37254"
                                >
                                </script>
                                <input type="hidden" custom="Hidden Element" name="hidden">
                            </form>
                            <!-- End Razorpay Integration Form -->
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- Form -->
                <form action="{{ url('payment') }}" method="post" autocomplete="off">
                @csrf    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Enter amount" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>

                </form>
        <!-- End form -->
        </div>
        </div>
    </div>
    <!-- End content -->

@endsection