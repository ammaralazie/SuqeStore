<?php

namespace App\Http\Controllers\SuqeStore;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('global:api')->except([
            'signup',
            'login'
        ]);
    }//end of constructer

    public function signup(Request $request){

        //we will make validation for data
        $vldat=Validator::make(request()->all(),[
            'username'=>['required','string','unique:users,username'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','confirmed','min:8']
        ]);
        if($vldat->fails()){
            return response()->json([
                'token'=>null,
                'msg'=>$vldat->errors()->first(),
                'state'=>'202'
            ]);
        }//end if and end validation for data

        //we will create new user from this data
        $user=User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        //we will create token for this user
        if(!!$user){
            $email=$user->email;
            $password=request()->password;
            $token=Auth::guard('api')->attempt(['email' => $email, 'password' => $password]);
        }

        return response()->json([
            'token'=>$token,
            'msg'=>$user,
            'state'=>'200'
        ]);

    }//end of signup

    public function login(Request $request){

         //this to check this value is email or username
         $value = $request->identfy;
         $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
         request()->merge([$field => $value]);

        //we will make validation for data
        if($field == 'username'){
            $vldat=Validator::make(request()->all(),[
                'username'=>['required','exists:users,username'],
                'password'=>['required','min:8']
            ]);
        }else{
            $vldat=Validator::make(request()->all(),[
                'email'=>['required','exists:users,email'],
                'password'=>['required','min:8']
            ]);
        }//end if

        if($vldat->fails()){
            return response()->json([
                'token'=>null,
                'msg'=>$vldat->errors()->first(),
                'state'=>'202'
            ]);
        }//end if and end validation for data

        //we will send token for this user
       if($field=='username'){
        $token=Auth::guard('api')->attempt([
            'username' => request()->username,
            'password' => request()->password
        ]);
       }else{
        $token=Auth::guard('api')->attempt([
            'email' => request()->email,
            'password' => request()->password
        ]);
       }

        return response()->json([
            'token'=>$token,
            'msg'=>Auth::guard('api')->user(),
            'state'=>'200'
        ]);
    }//end of login

    public function logout(Request $request){
        $token=$request->header('auth_token');

        if($token){
            try{

               $user= JWTAuth::setToken($token)->invalidate();
                return response()->json([
                    'token' => 'invalidate token',
                    'data' => 'user was logout',
                    'state' => '200',
                    'err' =>null
                ]);
            }catch(\Exception $e){
                return response()->json
                ([
                    'token' => null,
                    'data' => null,
                    'state' => '404',
                    'err' => 'something is worng'
                ]);
            }//end try and catch
        }else{
            return response()->json
            ([
                'token' => null,
                'data' => null,
                'state' => '404',
                'err' => 'something is worng'
            ]);
        }//end of if
    }//end of logout
}
