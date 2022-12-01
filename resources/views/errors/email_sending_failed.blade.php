@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-center">
        <div>
            <h1>Email Sending failed.</h1>
                <div class="align-self-center">
                    <a href="{{ url()->previous(); }}" class="btn btn-primary">Go Back</a>
                </div>
        </div>
    </div>
</div>
@endsection