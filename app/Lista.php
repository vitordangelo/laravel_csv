<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'status',
    ];

    protected $hidden = [
        'id',
    ];
}
