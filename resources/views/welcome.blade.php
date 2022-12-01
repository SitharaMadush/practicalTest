@extends('layouts.app')
@section('content')
<div class="container">
    {{-- @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class=" text-gray-700 underline">Home</a>
            @else
                <a href="{{ url('/ticket/check') }}" class=" text-gray-700 ">Check Ticket Status </a>
                <a href="{{ route('login') }}" class="ml-4 text-gray-700 ">Log in </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4  text-gray-700 ">Register </a>
                @endif
            @endauth
        </div>
    @endif --}}

    <div class="">
        <div class="d-flex justify-content-center ">
            <div class="d-flex align-items-center" style="height:80vh">
                <h1 class="display-3 text-primary">Online Support Platform</h1>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

