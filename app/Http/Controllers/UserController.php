<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\ValidationException;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = $this->userRepository->register($data);
        if(!$user){
            return response()->json(['msg' => 'User existed'], 500);
        }
        return response()->json($user, 200);
    }

    public function login(UserRequest $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = $this->userRepository->login($data);
        if(!$user){
            Log::channel('login_history')->error('Login fail!');
            return response()->json(['msg' => 'User not found'], 404);
        }
        Log::channel('login_history')->info(($this->userRepository->findByEmail($request->email)));
        return response()->json(['msg'=> 'Login Successfully','jwt'=> $user],200);
    }
}
