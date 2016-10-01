<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    protected $table = 'routes_lines';

    protected $fillable = [
    		 'description'
    ];
}
