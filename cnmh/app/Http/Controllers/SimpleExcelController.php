<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Patients;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Support\Facades\File;
use App\Repository\PatientRepository;
use Illuminate\Support\Facades\Validator; 




class SimpleExcelController extends Controller
{
    protected $patientRepository;

    public function __construct(PatientRepository $patientRepository){
        $this->patientRepository = $patientRepository;
    }
    public function import(Request $request) {
        

        $this->validate($request, [
            'fichier' => 'bail|required|file|mimes:xlsx',
        ]);
    
        $fichier = $request->fichier->move(public_path(), $request->fichier->hashName());
    
        $reader = SimpleExcelReader::create($fichier);
        $rows = $reader->getRows();
    
        foreach ($rows as $row) {
            $data = [
                'nom' => $row['nom'],
                'prenom' => $row['prenom'],
                'telephone' => $row['telephone'],
                'gender' => $row['gender'],
                'handicape' => $row['handicape'],
                'date' => $row['date'],
            ];
        
            $validator = Validator::make($data, [
                'nom' => 'required',
                'prenom' => 'required',
                'telephone' => 'required',
                'gender' => 'required',
                'handicape' => 'required',
                'date' => 'required',
            ]);

            $status = $this->patientRepository->create($data);
            $patients = $this->patientRepository->getAll();

        }
    
        if ($patients) {
            $reader->close();
            sleep(2); 
            File::delete($fichier);

            return view('patient.index', compact('patients'))
                ->with("success","Importation réussie!");
        }
    }

    public function export (Request $request) {

    	$file_name = 'Patients.xlsx';

    	$Patients = Patients::select("nom", "prenom", "telephone", "gender" , "handicape" , "date")->get();

    	$writer = SimpleExcelWriter::streamDownload($file_name);

    	$writer->addRows($Patients->toArray());

        $writer->toBrowser();

    }
}