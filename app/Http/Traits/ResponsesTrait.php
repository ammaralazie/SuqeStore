<?php

namespace App\Http\Traits;

trait ResponsesTrait
{

    public function errToken($token = null)
    {
        return response()->json([
            'token' => $token,
            'msg' => 'somethink fail plase check the data and try agine',
            'state' => 'f001'
        ]);
    } //end of errToken function

    public function successData($data = null)
    {
        return response()->json([
            'token' => true,
            'msg' => 'data was submited ',
            'data' => $data,
            'state' => 'f001'
        ]);
    } //end of successData function

    public function errAuthenticate()
    {
        return response()->json([
            'msg' => 'plase login and try agine',
            'err' => 'the user is unauthenticated',
            'state' => '202',
            'token' => null
        ]);
    }
}//end of trait
