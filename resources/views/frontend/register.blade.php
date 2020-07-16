@extends('frontend.layout.layout')

@section('content')
            <!-- Start Login Form -->
            <section class="auth__form">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-6">
                        <h1 class="">Register</h1>
                        <form class="" action="">
                            <input class="form-control" type="text" name="" id="full_name" placeholder="Full Name">
                            <input class="form-control" type="email" name="" id="email_address" placeholder="Email Address">
                            <input class="form-control" type="text" name="" id="phone_number" placeholder="Phone Number">
                            <input class="form-control" type="password" name="" id="password" placeholder="Password">
                            <input class="form-control" type="password" name="" id="cfpassword" placeholder="Confirm Password">
                            <button class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Form -->
@endsection