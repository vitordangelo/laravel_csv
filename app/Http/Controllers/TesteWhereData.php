<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\User;

class TesteWhereData extends Controller
{
    public function index()
    {
        //return $users = DB::table('users')->count('id');
        //return $email = DB::table('users')->where('name', 'Mr. Cesar Kulas V')->value('email');
        return $picks = User::distinct()->select()->where('created_at', '!=', 0)->get();
    }
}
