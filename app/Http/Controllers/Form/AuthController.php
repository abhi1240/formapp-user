<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Form\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class AuthController extends Controller
{
  public function seeder_login(Request $request){
    $response = Http::post('http://127.0.0.1:8000/Form-filling-testing/api/seeder-login',[
        'email' => $request->name,
        'password' => $request->password,
    ]);
    return response()->json(json_encode($response));
  }

  public function seeder_register(Request $request){
    $response = Http::post('http://127.0.0.1:8000/Form-filling-testing/api/seeder-register',[
        'name' => $request->name,
        'email' => $request->password,
        'password' => $request->name,
        'password_confirmation' => $request->password,
    ]);
      return response()->json(json_encode($response));
  }
  public function test(){
    return view('form');

  }
}
