@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-center">
        <div>
            <h1 class="display-1">404 - Not Fond!</h1 class="display-1">
                <div class="align-self-center">
                    <a href="{{ url()->previous(); }}" class="btn btn-primary">Go Back</a>
                </div>
        </div>
    </div>
</div>
@endsection