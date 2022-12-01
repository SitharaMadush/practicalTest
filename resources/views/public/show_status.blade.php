@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 offset-md-3 my-4">
            <h3>TICKET STATUS</h3>
            <table class="table table-striped table-responsive mt-3">
                <tbody>
                    <tr>
                        <th>CUSTOMER NAME</th>
                        <td>{{ $ticket->customer_name }}</td>
                    </tr>
                    <tr>
                        <th>PROBLEM DESCRIPTION</th>
                        <td>{{ $ticket->problem_description }}</td>
                    </tr>
                    <tr>
                        <th>STATUS</th>
                        <td><span class="badge bg-warning">{{ Str::ucfirst($ticket->status) }}</span></td>
                    </tr>
                </tbody>
            </table>

            @isset($error)
                <span class="alert alert-danger">
                    {{ $error }}
                </span>
            @endisset
            @isset($ticket)
                @isset($ticket->reply)
                    <div class="my-3">
                        <h4>REPLY FROM OUR STAFF</h4>
                        <textarea class="form-control" id="reply" rows="8" readonly>{{ $ticket->reply }}</textarea>
                    </div>  
                @endisset
            @endisset
            

            <a href="{{ route('public.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection