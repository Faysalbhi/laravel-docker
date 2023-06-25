<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Apiauth\UserRegisterRequest;
use App\Http\Requests\Apiauth\UserLogingRequest;
use App\Models\User;
use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->validated());
        
        return $this->success([
            'user'=>$user,
            'toker'=>$user->createToken($user->name)->plainTextToken,
        ]);
    }    
    
    
    public function login(UserLogingRequest $request)
    {
        if (!\Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            return $this->error('','Credentials do not match',401);
        };

        $user = User::where('email',$request->email)->first();
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('Token of' . $user->name)->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {   
        // \Auth::user()->tokens()->where('id', $request->user_id)->delete();
        \Auth::user()->tokens()->delete();

        return $this->success('');
    }
}
