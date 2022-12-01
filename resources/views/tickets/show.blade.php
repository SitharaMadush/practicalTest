@extends('layouts.app')
@section('content')
<div class="container">
    <div class="offset-md-3 col-md-6">
        <h3 class="my-4">Support Ticket: {{ $ticket->ref_no }}</h3>

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

        <table class="table table-striped table-responsive">
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
                    <td>{{ Str::ucfirst($ticket->status) }}</td>
                </tr>
            </tbody>
        </table>
        @isset($ticket->reply)
        <div class="mb-3">
            <th>STATUS</th>
            <textarea class="form-control" id="reply" rows="8" readonly>{{ $ticket->reply }}</textarea>
        </div>  

        @else
            <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
                @method('PATCH') 
                @csrf
                <div class="mb-3">
                    <h5 class="text-primary">Reply</h5>
                    <textarea class="form-control" name="reply" id="reply" rows="8"></textarea>
                    @error('reply')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save Reply</button>
            </form>
        @endisset
        <a href="{{ route('tickets.index') }}" class="btn btn-success my-4">Back</a>
    </div>
</div>
@endsection