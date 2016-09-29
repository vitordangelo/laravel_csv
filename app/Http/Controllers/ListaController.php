<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lista;
use Carbon\Carbon;
use Illuminate\Database\SchemaBuilder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Writer;
use League\Csv\Reader;
use DB;

class ListaController extends Controller
{
    public function index()
    {
        $lista = Lista::all();

        $message = [
             'status' => true,
             'data' => $lista
        ];
        return $message;
    }

    public function upload()
    {
        return view('lista-importa');
    }

    public function uploadPost(Request $request)
    {
        $file = $request->csv;
        $caminho = $request->file('csv')->move('../storage/csv/',Carbon::now().'.csv');

        $file = Reader::createFromPath($caminho);
        $csv = $file->fetchAll();
        foreach ($csv as $user) {
            DB::insert('insert into listas (name, email, status) values (?, ?, ?)', $user);
        }
        return ".CSV Importado com Sucesso";
    }

    public function readCsv()
    {
        $file = Reader::createFromPath('../storage/csv/2016-09-29 12:46:34.csv');
        $teste = $file->fetchAll();
        foreach ($teste as $user) {
            DB::insert('insert into listas (name, email, status) values (?, ?, ?)', $user);
        }
    }

    public function exporta(Request $request)
    {

        $lista = Lista::all();
        //dd(Schema::getColumnListing('listas')); //Mostra as colunas da tabela usuário

        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        //$csv = Writer::createFromFileObject(new \SplFileObject('../storage/csv/usuarios_'.Carbon::now().'.csv', 'w')); //Salva uma cópia do arquivo
        //$csv->insertOne(['Nome', 'Email', 'Status']); //Informa o nome do cabeçalho da coluna
        foreach ($lista as $user) {
            $csv->insertOne($user->toArray());
        }
        $csv->output('usuarios_'.Carbon::now().'.csv'); //Faz o download
    }
}
