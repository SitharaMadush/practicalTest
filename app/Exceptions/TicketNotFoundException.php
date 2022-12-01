<?php

namespace App\Exceptions;

use Exception;

class TicketNotFoundException extends Exception
{
    function report() {}

    function render() {
        return view('errors.ticket_not_found');
    }

}
