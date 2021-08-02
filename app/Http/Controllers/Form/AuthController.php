<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Form\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AuthController extends Controller
{
  public function seeder_login(Request $request){
    $api_token = Crypt::encryptString($request->email.$request->password);
    // dd($encrypted);
    $session_id = Session::getId();
    $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/seeder-login',[
        'email' => $request->email,
        'password' => $request->password,
        'session_id' => $session_id,
        'api_token' => $api_token,
    ]);


    if ($response->successful()) {
        $res = $response->json();
        if($res['success'] == 'true'){

          $agent = new Agent();
          // $user_agent = $agent->browser();
          $data['browser_info'] = Session::put('browser_info', $agent);

          $data = array();

          $data['seeder'] = $response->json();
          if(isset($response['user']['api_token'])){
            $data['api_token'] = Session::put('api_token', $response['user']['api_token']);
          } else {
            $data['api_token'] = Session::put('api_token', '');
          }
          if(isset($response['user']['approved_at'])){
            $data['approved_at'] = Session::put('approved_at', $response['user']['approved_at']);
          } else {
            $data['approved_at'] = Session::put('approved_at', '');
          }

          if(isset($response['user']['rights'])){
            $data['rights'] = Session::put('rights', $response['user']['rights']);
          } else {
            $data['rights'] = Session::put('rights', '');
          }

          if(isset($response['user']['email_verified_at'])){
            $data['email_verified_at'] = Session::put('email_verified_at', $response['user']['email_verified_at']);
          } else {
            $data['email_verified_at'] = Session::put('email_verified_at', '');
          }
          // $data['success'] = $response['success'];
          $data['users'] = Session::put('users', $response['user']);
          $data['sessions'] = Session::all();
          // dd($data);
          return redirect('/profile-setting')->with('success','Logged in successfully');

        } elseif ($res['success'] == 'false') {
          return redirect('/')->withError('User Unauthorised');
        }
    }
    return redirect('/')->withErrors('User Unauthorised');
  }

  public function seeder_register(Request $request){
    $url = URL::to('');
    // dd($url);
    $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/seeder-register',[
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'rights' => '0',
        'password_confirmation' => $request->password_confirmation,
        'url' => $url,
    ]);

    if ($response->successful()) {
      $res = $response->json();
      if($res['success'] == 'true'){
        $data = array();
        $data['seeder'] = $response->json();
        // dd($data['seeder']);
        if(isset($response['seeder']['api_token'])){
          $data['api_token'] = Session::put('api_token', $response['seeder']['api_token']);
        } else {
          $data['api_token'] = Session::put('api_token', '');
        }
        if(isset($response['seeder']['approved_at'])){
          $data['approved_at'] = Session::put('approved_at', $response['seeder']['approved_at']);
        } else {
          $data['approved_at'] = Session::put('approved_at', '');
        }
        $data['users'] = Session::put('users', $response['seeder']);
        $data['sessions'] = Session::all();

        return redirect('/')->with('success','Successfully created account please login to continue');
      } elseif ($res['success'] == 'false') {
        return redirect('/register')->withError('Please try later');
      }
    }
    return redirect('/register')->withError('Please try later');
  }

  public function seeder_logout(Request $request){
    $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/seeder-logout',[
        'id' => $request->id,
        'api_token' => $request->api_token,
    ]);
    $cdsa = $response->json();
    if ($response->successful()) {
      Session::flush();
      return redirect('/');
    }

  }
  public function test(){
    return view('form');

  }
}
