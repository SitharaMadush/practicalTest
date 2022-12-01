<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTicketReceived;

class PublicController extends Controller
{
    public function index(){
        return view('public.index');
    }

    public function store_ticket(Request $request){
        $validated = $request->validate([
            'customer_name' => 'required|max:255',
            'problem_description' => 'required|max:800',
            'email' => 'required|email',
            'phone' => 'required|max:15',
        ]);

        //generate unique reference No.
        function generateRef(){
            $ref_no = Str::random(10);
            $ref_count = Ticket::where('ref_no', $ref_no)->count();
            if($ref_count > 0){
                $ref_no = generateRef();
            }
            return $ref_no;
        }

        $ref_no = generateRef();

        $ticket = Ticket::create([
            'customer_name' => $validated['customer_name'],
            'problem_description' => $validated['problem_description'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'ref_no' => $ref_no,
            'status' => 'pending'
        ]);

        $data = [
            'title' => 'Support Ticket',
            'ref_no' => $ticket->ref_no,
            'body' => 'Dear customer, this is to inform that we have received your support ticket. One of our agents will be attending your ticket very soon. You can check Ticket Status on our site.'
        ];

        Mail::to($ticket->email)->send(new MailTicketReceived($data));

        return redirect()->route('public.index')->with('success', 'Support Ticket created successfully. Your Reference Number: '.$ticket->ref_no.'. You can check the ticket status bellow.');
    }

    public function check_status(Request $request){

        $request->validate([
            'ref_no' => 'required',
        ]); 

        $ticket = Ticket::where('ref_no', $request->ref_no)->first();

        if(!isset($ticket)){
            return redirect()->route('public.index')->with('error', 'Invalid Ticket Reference Number!');
        }
        
        return view('public.show_status', compact('ticket'));
    }
}
