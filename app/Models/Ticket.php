<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'problem_description',
        'email',
        'phone',
        'ref_no',
        'status',
        'reply'
    ];
}
