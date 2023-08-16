<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Models\User;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function register($data){
        $checkUser = User::where('email', $data['email'])->first();
        if($checkUser){
            return false;
        }

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $jwt = JWTAuth::fromUser($newUser);
        return ['user'=>$newUser,'jwt'=> $jwt];
    }

    public function login($data){
        if(!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            return false;
        }
        // $user = DB::table('users')->where('email', $data['email'])->first();
        $user = Auth::user();
        return JWTAuth::fromUser($user);
    }
}


