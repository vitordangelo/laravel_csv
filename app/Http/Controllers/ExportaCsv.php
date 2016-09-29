<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\SchemaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use League\Csv\Writer;

class ExportaCsv extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->status)) {
            $users = User::whereStatus($request->status)->select('name', 'email', 'status')->get()->all();
        }else{
            $users = User::all();
        }
        //dd(Schema::getColumnListing('users')); //Mostra as colunas da tabela usuário

        // $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv = Writer::createFromFileObject(new \SplFileObject('../storage/csv/usuarios_'.Carbon::now().'.csv', 'w')); //Salva uma cópia do arquivo
        $csv->insertOne(['Nome', 'Email', 'Status']); //Informa o nome do cabeçalho da coluna
        foreach ($users as $user) {
            $csv->insertOne($user->toArray());
        }
        $csv->output('usuarios_'.Carbon::now().'.csv');
    }
}
