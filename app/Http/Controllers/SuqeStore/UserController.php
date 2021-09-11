<?php

namespace App\Http\Controllers\SuqeStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('global:api');
    }//end of constructer

    public function signup(Request $request){}//end of signup

    public function login(Request $request){}//end of login

    public function logout(Request $request){}//end of logout
}
