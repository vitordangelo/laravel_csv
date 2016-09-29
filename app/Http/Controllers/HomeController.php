<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\SchemaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use League\Csv\Writer;
use League\Csv\Reader;

class HomeController extends Controller
{
    public function upload() {
        return view('welcome');
    }

    public function uploadPost(Request $request) {
        //dd($request->csv);
        //$file = $request->csv->storeAs('csv', 'csv.csv');
        $file = $request->csv;
        $request->file('csv')->move('../storage/csv/',Carbon::now().'.csv');
        //return $file;
    }

    public function readCsv() {
        $file = Reader::createFromPath('../storage/csv/2016-09-28 19:32:05.csv');
        //return ($file->fetchAll());
        $salvar = ($file->fetchAll());
        $dados = new User($salvar);
        $dados->save();
    }

}
