<?php

namespace App\Http\Controllers\form;
use App\Http\Controllers\Form\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\PendingImages;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class UpdateImageController extends Controller
{

    public function get_citys(){
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);

      $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/citys',[
        'api_token' => $enc_api_token,
      ]);
      $data = array();
      $data['citys'] = $response->json();
      if ($response->successful()) {
        return response()->json($data);
      }
    }


    public function upload_image(Request $request){


      $is_id = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $session_id = Session::getId();
      // dd($request);

      $image = $request->file('paper_img');
      $body = [
              "headers" => [
              "Accept" => "multipart/form-data"
             ],
             "multipart" => [
              "name" => "paper_img",
              "contents" => file_get_contents($image),
              "filename" => $image->getClientOriginalName(),

            ],

            "request" => [
              'is_id' => $is_id,
              'paper_title' => $request->get('paper_title'),
              'publication' => $request->get('publication'),
              'language_id' => $request->get('language_id'),
              'language' => $request->get('language'),
              // 'paper_img' => $request->file('paper_img'),
              'paper_img' => $request->get('paper_img'),
              'session_id' => $session_id,
              'api_token' => $enc_api_token,
            ]
         ];
         $encoded_body = mb_convert_encoding($body,'UTF-8', 'UTF-8'  );
         // dd($body);
      $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/user-image-upload',[$encoded_body]);
      $data = array();
      $data['res'] = $response->json();
      dd($data);
      if ($response->successful()) {
        return redirect('/image-update')->with('success','Image uploaded successfully');
      }else {
      return redirect('/image-update')->with('danger','Please try later');
      }
      //   $year = Carbon::now()->format('Y');
      //   $month = Carbon::now()->format('m');
      //   $date = Carbon::now()->format('d');
      //   $month_save = Carbon::now()->format('F');
      //   $user_id = Auth::user()->user_id;
      //   $random_name = $request->get('paper_title');
      //   // dd($date);
      //
      // $validated = $request->validate([
      //   'paper_title'=>'required',
      //   'publication'=>'required',
      //   'language_id'=>'required',
      //   'paper_img'=>'required|mimes:jpeg,jfif,png',
      // ]);
      //
      // if ($validated) {
      //   if($request->hasFile('paper_img')){
      //         $image = $request->file('paper_img');
      //         // dd($image);
      //         $filename = $random_name.".".$request->file('paper_img')->extension();
      //         // dd($filename);
      //         $path = $image->move(public_path('/storage/files/images/').'/'.$year.'/'.$month.'/'.$date.'/',$filename);
      //
      //         $paper_img = $filename;
      //         $paper_img_url = URL::asset('/storage/files/images/').'/'.$year.'/'.$month.'/'.$date.'/'.$filename;
      //       }
      //       // dd($path);
      //
      //   $create = new PendingImages([
      //     'user_id' => $user_id,
      //     'paper_title' => $request->get('paper_title'),
      //     'publication' => $request->get('publication'),
      //     'language_id' => $request->get('language_id'),
      //     'paper_img' => $paper_img,
      //     'paper_img_url' => $paper_img_url,
      //     'year' => $year,
      //     'month' => $month_save,
      //     'date' => $date,
      //
      //   ]);
      //
      //   $save_success = $create->save();
      // }
      // if ($save_success) {
      //   return redirect('/image-update')->with('success','Image uploaded successfully');
      // }
    }
}
