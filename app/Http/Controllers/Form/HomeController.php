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

        return view('user.profile-setting');
    }


    public function image_update()
    {
        return view('user.image-update');
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
        return redirect('/profile-setting')->with('success','profile updated successfilly');
      }else {
      return redirect('/profile-setting')->with('danger','Please try later');
      }

    }

    public function upload_profile_pic(Request $request){
        $id = $request->get('id');
        $user = User::where('id',$id)->first();
        $name = $user->name;
        $profile_pic = $request->get('profile_pic');
        if($request->hasFile('profile_pic')){
              $image = $request->file('profile_pic');
              // dd($image);
              $filename = $name.".".$request->file('profile_pic')->extension();
              // dd($filename);
              $path = $image->move(public_path('/uploads/users/profile/images/'),$filename);

              $user->profile_pic = $filename;
              $user->profile_pic_url = URL::asset('/uploads/users/profile/images/').'/'.$filename;
            }
            $profile_pic_url = $user->profile_pic_url;
        if ($user) {
          $update_new = $user->update([
            'profile_pic' => $filename,
            'profile_pic_url' => $profile_pic_url,
          ]);
        }

        if ($update_new) {
          return redirect('/profile-setting')->with('success','profile updated successfilly');
        }

    }


    public function reset_password(Request $request){

      $id = $request->get('id');
      $user = User::where('id',$id)->first();

      $validated = $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);
      if ($validated) {
      $change_password = $user->update([
        'password' => Hash::make($request->get('password')),
      ]);
      }
      if ($change_password) {
        return redirect('/change-password')->with('success','Password updated successfilly');
      }
    }
}
