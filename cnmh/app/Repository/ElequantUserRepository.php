<?php

namespace App\Repository;

use App\Models\User;

class ElequantUserRepository extends UserRepository {
   

    public function find($id) {
        return User::find($id);
    }

    public function create(array $data) {
        return User::create($data);
    }

    public function update($id, array $data) {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
        }
        return $user;
    }
    

    public function delete($id) {
        return User::destroy($id);
    }

   
    
}
