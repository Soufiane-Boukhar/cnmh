<?php

namespace App\Repository;

use App\Models\Patients;

class ElequantPatientRepository extends PatientRepository{
    public function create(array $data){
        return Patients::create($data);
    }

    public function getAll(){
       return $patients = Patients::all();
    }

    public function find($id){
        return $patients = Patients::find($id);
    }

    public function update($id ,array $data){
        $patient = Patients::find($id);

        if($patient){
            $patient->update($data);
        }

        return $patient;
    }

    public function delete($id){
        $patient = Patients::find($id);

        if($patient){
            $patient->destroy($id);
        }
    }
}