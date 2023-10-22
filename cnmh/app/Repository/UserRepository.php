<?php

namespace App\Repository;

abstract class UserRepository {
    abstract public function find($id);
    abstract public function create(array $data);
    abstract public function update($id, array $data);
    abstract public function delete($id);
}