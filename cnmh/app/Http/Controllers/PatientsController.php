<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PatientRepository;


class PatientsController extends Controller
{
    protected $patientRepository;

    public function __construct(PatientRepository $patientRepository){
        $this->patientRepository = $patientRepository;
    }

    public function create(Request $request){
        $this->validate($request,[
            'nom'=>'required',
            'prenom'=>'required',
            'telephone'=>'required',
            'gender'=>'required',
            'handicape'=>'required',
            'date'=>'required',

        ]);

        $data = $request->all();

        $patient = $this->patientRepository->create($data);
        
        return redirect('/patient/ajouter')->with('success','Patient a ete ajoutee reussir');
    }

    public function getAll() {
        $patients = $this->patientRepository->getAll();
        return view('patient.index', compact('patients'));
    }

    public function find(Request $request,$id){
        $patient =  $this->patientRepository->find($id);
        return view('patient.edit', compact('patient'));
    }

    public function update(Request $request ,$id){
        $this->validate($request,[
            'nom'=>'required',
            'prenom'=>'required',
            'telephone'=>'required',
            'gender'=>'required',
            'handicape'=>'required',
            'date'=>'required',
        ]);

        $data = $request->all();

        $patient = $this->patientRepository->find($id);

        if (!$patient) {
            return redirect()->route('patient.edit', $id)->with('error', 'Stagiaire not found');
        }
    
        $this->patientRepository->update($id, $data);

        return redirect()->route('patient.show', $id)->with('success', 'Patient a ete modifiee avec reussir');

    }
    

    public function delete($id){
        $patients = $this->patientRepository->delete($id);
        return redirect()->route('listPatient')->with('success', 'Patient a ete supprimer avec reussir');
    }
    
}
