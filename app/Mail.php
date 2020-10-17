<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'subject', 
        'address', 
        'from',
        'message_id',
        'date',
        'deleted',
        'created_by', 
        'ip_address',
        'status',
    ];
}
