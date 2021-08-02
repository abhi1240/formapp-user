<?php

namespace App\Http\Controllers\form;
use App\Http\Controllers\Form\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware(['api_auth']);
      // $this->middleware(['api_auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile_setting()
    {
      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/seeder_profile_details',[
          'api_token' => $enc_api_token,
          'is_id' => $is_id,
      ]);
      if ($response->successful()) {
        $data = array();

        $data['item'] = $response->json();
        return view('user.profile-setting',compact('data'));
      }
    }


    public function image_update()
    {
      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/seeder_profile_details',[
          'api_token' => $enc_api_token,
          'is_id' => $is_id,
      ]);
      if ($response->successful()) {
        $data = array();

        $data['item'] = $response->json();
        return view('user.image-update',compact('data'));
      }
    }

    public function change_password()
    {
        return view('user.change-password');
    }

    public function approval()
    {
        return view('user.approve');
    }

    public function verify_email()
    {
        return view('user.verify-email');
    }

    public function update_user_info(Request $request){
      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $session_id = Session::getId();
      $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/user-profile-setting',[
          'is_id' => $is_id,
          'name' => $request->name,
          'email' => $request->email,
          'company_name' => $request->company_name,
          'linked_account' => $request->linked_account,
          'website' => $request->website,
          'position' => $request->position,
          'office_num' => $request->office_num,
          'phone_num' => $request->phone_num,
          'address' => $request->address,
          'session_id' => $session_id,
          'api_token' => $enc_api_token,
      ]);

      if ($response->successful()) {
        $res = $response->json();
        if($res['success'] == 'true'){
          $data = array();
          $data['seeder'] = $response->json();
        return redirect('/profile-setting')->with('success','profile updated successfilly');
      }elseif ($res['success'] == 'false') {
        return redirect('/profile-setting')->withError('Please try later');
      }
      }else {
      return redirect('/profile-setting')->with('danger','Please try later');
      }

    }

    public function upload_profile_pic(Request $request){

      $datas = $request->all();
      $datas['is_id'] = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $datas['api_token'] = Crypt::encryptString($api_token);
      $session_id = Session::getId();
      // dd($datas);
      if ($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()) {
        $image = $request->file('profile_pic');
        // dd($image);
        $response = Http::attach('profile_pic', file_get_contents($image), 'paperimg.jpg')
            ->post('http://127.0.0.1:8000/api/upload_profile_picture', $datas);
    } else {
        $response = Http::post('http://127.0.0.1:8000/api/upload_profile_picture',$datas);
    }


    if ($response->successful()) {
      $res = $response->json();
      if($res['success'] == 'true'){
        $data = array();
        $data['seeder'] = $response->json();
      // dd($data);
      return redirect('/profile-setting')->with('success','Profile pic uploaded successfully');
    }elseif ($res['success'] == 'false') {
      return redirect('/profile-setting')->withError('Please try later');
    }
    }else {
    return redirect('/profile-setting')->with('danger','Please try later');
    }
  }



    public function reset_password(Request $request){
      $datas = $request->all();
      $datas['is_id'] = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $datas['api_token'] = Crypt::encryptString($api_token);
      $session_id = Session::getId();

      if ($request->password == $request->password_confirmation) {

        $response = Http::post('http://127.0.0.1:8000/api/reset_password',$datas);

        if ($response->successful()) {
          $res = $response->json();
          if($res['success'] == 'true'){
            $data = array();
            $data['seeder'] = $response->json();
          // dd($data);
          return redirect('/change-password')->with('success','Successfully updated Password');
        }elseif ($res['success'] == 'false') {
          return redirect('/change-password')->withError('Please try later');
        }
        }else {
        return redirect('/change-password')->with('danger','Please try later');
        }
      }else {
        return redirect('/change-password')->with('danger','new password must match verify password');
      }

    }
}
