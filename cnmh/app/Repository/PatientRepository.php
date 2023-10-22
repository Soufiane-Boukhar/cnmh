<?php

namespace App\Repository;

abstract class PatientRepository{
    abstract public function getAll();
    abstract public function find($id);
    abstract public function create(array $data);
    abstract public function update($id ,array $data);

}