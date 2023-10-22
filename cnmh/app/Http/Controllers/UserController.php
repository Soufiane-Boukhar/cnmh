<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 



class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function create(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);
    
        $data = $request->all();
    
        $data['password'] = Hash::make($data['password']);
    
        $user = $this->userRepository->create($data);
        Auth::login($user);
        return redirect()->route('login')->with('success', 'Utilisateur a été créé avec succès'); 
    }

   
}
