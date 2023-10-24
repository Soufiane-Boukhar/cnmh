<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Client;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;

class SimpleExcelController extends Controller
{
    public function import (Request $request) {

    	$this->validate($request, [
    		'fichier' => 'bail|required|file|mimes:xlsx'
    	]);

    	$fichier = $request->fichier->move(public_path(), $request->fichier->hashName());

    	$reader = SimpleExcelReader::create($fichier);

        $rows = $reader->getRows();

        $status = Client::insert($rows->toArray());

    	if ($status) {

            $reader->close(); 
            unlink($fichier);

            return back()->withMsg("Importation réussie !");

        } else { abort(500); }
    }


    public function export (Request $request) {

    	$this->validate($request, [ 
    		'name' => 'bail|required|string',
    		'extension' => 'bail|required|string|in:xlsx,csv'
    	]);

    	$file_name = $request->name.".".$request->extension;

    	// 3. On récupère données de la table "clients"
    	$clients = Client::select("name", "email", "phone", "address")->get();

    	// 4. $writer : Objet Spatie\SimpleExcel\SimpleExcelWriter
    	$writer = SimpleExcelWriter::streamDownload($file_name);

 		// 5. On insère toutes les lignes au fichier Excel $file_name
    	$writer->addRows($clients->toArray());

        // 6. Lancer le téléchargement du fichier
        $writer->toBrowser();

    }
}