<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interface\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = $this->userRepository->register($data);
        if(!$user){
            return response()->json(['msg' => 'User existed'], 500);
        }
        return response()->json($user, 200);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],[
            'email.email' => 'Incorrect standard of email'
        ]);
        $user = $this->userRepository->login($data);
        if(!$user){
            return response()->json(['msg' => 'User not found'], 404);
        }
        return response()->json(['msg'=> 'Login Successfully','jwt'=> $user],200);
    }
}
