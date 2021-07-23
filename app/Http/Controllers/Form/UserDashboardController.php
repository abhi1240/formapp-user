<?php

namespace App\Http\Controllers\form;
use App\Http\Controllers\Form\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Auth;

class UserDashboardController extends Controller
{

    public function dashboard(Request $request)
    {
      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/user-dashboard',[
          'is_id' => $is_id,
          'api_token' => $enc_api_token,
      ]);
      if ($response->successful()) {
        $data = array();

        $data['item'] = $response->json();
        // dd($data);
        return view('user.dashboard.dashboard',compact('data'));
        }
    }

    public function image_explorer()
    {

      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/user-explorer',[
          'is_id' => $is_id,
          'api_token' => $enc_api_token,
      ]);
      if ($response->successful()) {
        $data = array();

        $data['item'] = $response->json();
        // dd($data);
        return view('user.dashboard.image-explorer',compact('data'));
        }

    }

    public function get_month_folder(Request $request){

      $year_req =  $request->get('year');
      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/user-explorer-month',[
          'is_id' => $is_id,
          'api_token' => $enc_api_token,
          'year' => $year_req,
      ]);
      // dd($response->successful());
      if ($response->successful()) {
        $data = array();

        $data['item'] = $response->json();
        // dd($data);
        return View::make('user.dashboard.months-folder', compact('data'));
        }
      // return view('user.dashboard.month-folder');
    }

    public function get_date_folder(Request $request){
      $month_req =  $request->get('month');
      $year_req =  $request->get('year');
      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/user-explorer-date',[
          'is_id' => $is_id,
          'api_token' => $enc_api_token,
          'year' => $year_req,
          'month' => $month_req,
      ]);
      if ($response->successful()) {
        $data = array();

        $data['item'] = $response->json();
        return View::make('user.dashboard.dates-folder', compact('data'));
        }
    }

    public function get_file(Request $request){
      $date_req =  $request->get('date');
      $month_req =  $request->get('month');
      $year_req =  $request->get('year');
      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/user-explorer-file',[
          'is_id' => $is_id,
          'api_token' => $enc_api_token,
          'year' => $year_req,
          'month' => $month_req,
          'date' => $date_req,
      ]);
      if ($response->successful()) {
        $data = array();

        $data['item'] = $response->json();
        return View::make('user.dashboard.files-folder', compact('data'));
        }
    }

}
