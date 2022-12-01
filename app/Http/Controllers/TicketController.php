<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Mail\MailTicketReplied;
use App\Exceptions\TicketNotFoundException;
use App\Exceptions\EmailSendingFailedException;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('status', 'desc')->paginate(15);
        return view('tickets.index', compact('tickets'));
    }

    public function search(Request $request){
        $tickets = Ticket::where('customer_name', 'like' , '%'.$request->customer_name.'%')->paginate(5);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required',
            'problem_description' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Ticket::create($validated);
        return redirect()->route('public.index')->with('success', 'Support Ticket created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $ticket = Ticket::findOrFail($id);
        }catch(\Exception $exception){
            throw new TicketNotFoundException();
        }

        if($ticket->status === 'pending'){
            $ticket->update([
                'status' => 'attending',
            ]);
            $ticket = Ticket::findOrFail($id);
        }


        return view('tickets.show', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reply' => 'required|max:800',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'status' => 'completed',
            'reply' => $validated['reply'],
        ]);

        $data = [
            'title' => 'Support Ticket was replied',
            'body' => 'Dear customer, this is to inform that you have received a response for your Support Ticket',
            'ref_no' => $ticket->ref_no,
            'reply' => $validated['reply'],
        ];

        try{
            Mail::to($ticket->email)->send(new MailTicketReplied($data));
        }catch(\Exception $exception){
            return view('errors.email_sending_failed');
        }
        return redirect()->route('tickets.show', $ticket->id)->with('success', 'Succesfully replied for the Support Ticket');
    }

}
