@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center offset-md-3 col-md-6">
            <div class="">
                <?php
                if(session()->has('success')){
                    ?>
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success'); }}
                      </div>
                    <?php
                    session()->forget('success');
                }    
                ?>

                <?php
                if(session()->has('error')){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error'); }}
                    </div>
                    <?php
                    session()->forget('error');
                }    
                ?>

                <h3>Check your Ticket Status</h3>
                <form action="{{ route('public.check_status') }}" method="POST" class=" mt-5">
                    @csrf
                    <div class="mb-3">
                        <label for="ref_no" class="form-label">Reference Number</label>
                        <input type="text" name="ref_no" id="ref_no" class="form-control" placeholder="Reference Number">
                        @error('ref_no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Check Status</button>
                </form>

                <div class="d-flex justify-content-center">
                    <h1 class="display-3 align my-5">OR</h1>

                </div>

                <h3>Create new Support Ticket</h3>
                <form action="{{ route('public.store_ticket') }}" method="POST" class=" mt-5">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Customer Name">
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="problem_description" class="form-label">Problem Description</label>
                        <textarea name="problem_description" id="problem_description" cols="30" rows="10" class="form-control" placeholder="Problem Description"></textarea>
                        {{-- <input type="text" name="problem_description" id="problem_description" > --}}
                        @error('problem_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Ticket</button>
                </form>
            </div>
          </div>
        
    </div>
@endsection