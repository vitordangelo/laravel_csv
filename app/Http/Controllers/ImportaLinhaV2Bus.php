<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Linha;
use Carbon\Carbon;
use League\Csv\Writer;
use League\Csv\Reader;
use DB;

class ImportaLinhaV2Bus extends Controller
{
    public function index()
     {
         $linha = Linha::all();
         return $linha;
     }

     public function upload()
     {
         return view('importa-linha');
     }

     public function uploadPost(Request $request)
     {
         $file = $request->csv;
         $caminho = $request->file('csv')->move('../storage/csv/',Carbon::now().'.csv');

         $file = Reader::createFromPath($caminho);
         $csv = $file->fetchAll();

        foreach ($csv as $linha) {
            DB::insert('insert into routes_lines (id, description) values (?, ?)', $linha);
        }

         return ".CSV Importado com Sucesso";
     }
}
