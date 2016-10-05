<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sessao;
use Carbon\Carbon;
use League\Csv\Writer;
use League\Csv\Reader;
use DB;

class ImportaSecaoV2Bus extends Controller
{
    public function index()
     {
         $sessoes = Sessao::all();
         return $sessoes;
     }

     public function upload()
     {
         return view('importa-secao');
     }

     public function uploadPost(Request $request)
     {
         $file = $request->csv;
         $caminho = $request->file('csv')->move('../storage/csv/',Carbon::now().'.csv');

         $file = Reader::createFromPath($caminho);
         $csv = $file->fetchAll();
        //  foreach ($csv as $sessao) {
        //      DB::insert('insert into routes (lines_id, routes_id, origin, origin_latitude,origin_longitude, destination, destination_latitude, destination_longitude, price) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', $sessao);
        //  }

        foreach ($csv as $sessao) {
            //return $sessao;
            try {
                DB::insert('insert into routes (lines_id, routes_id, origin, origin_latitude,origin_longitude, destination, destination_latitude, destination_longitude, price) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', $sessao);
                DB::commit();
            } catch (Exception $e) {
                echo $e;
            }
        }

         return ".CSV Importado com Sucesso";
         //return $csv;
     }
}
