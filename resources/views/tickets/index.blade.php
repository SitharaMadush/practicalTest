@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>All Tickets</h3>
        <div class="card">
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-6">
                        <form action="{{ route('tickets.search') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="input-group">
                                        <div class="input-group-text" id="btnGroupAddon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                          </svg>
                                        </div>
                                        <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" aria-label="Input group example" aria-describedby="btnGroupAddon">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>CUSTOMER NAME</th>
                            <th>PROBLEM DESCRIPTION</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>STATUS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr class="<?php echo ($ticket->status == 'pending') ? 'table-warning' : '' ?>">
                            <td>{{ $ticket->customer_name }}</td>
                            <td>{{ $ticket->problem_description }}</td>
                            <td>{{ $ticket->email }}</td>
                            <td>{{ $ticket->phone }}</td>
                            <td> <span class="badge bg-danger">{{ $ticket->status }}</span></td>
                            <td>
                                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
@endsection