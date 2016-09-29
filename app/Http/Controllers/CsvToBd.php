<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Lista;
use League\Csv\Reader;
use DB;
use App\Http\Controllers\PDO;

class CsvToBd extends Controller
{
    public function index()
    {
        $dbh = DB::connection()->getPdo();
        //We are going to insert some data into the users table
        $sth = $dbh->prepare(
        	"INSERT INTO listas (name, email, status) VALUES (:name, :email, :status)"
        );

        $csv = Reader::createFromPath('../storage/csv/2016-09-29 12:46:34.csv');
        $csv->setOffset(1); //because we don't want to insert the header
        $nbInsert = $csv->each(function ($row) use (&$sth) {
        	//Do not forget to validate your data before inserting it in your database
        	$sth->bindValue(':name', $row[0], PDO::PARAM_STR);
        	$sth->bindValue(':email', $row[1], PDO::PARAM_STR);
        	$sth->bindValue(':status', $row[2], PDO::PARAM_STR);

    	       return $sth->execute(); //if the function return false then the iteration will stop
           });
    }
}
