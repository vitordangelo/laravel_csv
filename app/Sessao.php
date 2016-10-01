<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    protected $table = 'routes';

    protected $fillable = [
    		 'lines_id','origin', 'destination', 'price', 'routes_id',
             'origin_latitude', 'origin_longitude',
             'destination_latitude', 'destination_longitude'
    ];
}
