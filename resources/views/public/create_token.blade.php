@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <form action="" method="POST">
                @csrf
                <div class="mb-3 mt-5">
                    <label for="exampleFormControlInput1" class="form-label">Ticket Reference Number</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Type reference No. here...">
                  </div>
                  <button type="submit" class="btn btn-primary">Check Status</button>
            </form>
        </div>
    </div>
@endsection