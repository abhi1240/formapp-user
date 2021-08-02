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

    public function get_citys(Request $request){
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $search = $request->search;
      $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/citys',[
        'api_token' => $enc_api_token,
        'search' => $search,
      ]);
      $data = array();
      $data = $response->json();
      if ($response['citys']) {
        $output = '<ul class="dropdown-menu auto_c" style="display:block; position:relative">';
        foreach($response['citys'] as $key => $row)
        {
         $output .= '
         <li><a class="city_auto_list" href="#">'.$row['city'].'</a></li>
         ';
        }
        $output .= '</ul>';

        if ($response->successful()) {
          return response()->json($output);
        }
      }

    }

    public function papers_autocomplete(Request $request){
      $api_token = Session::get('users')['api_token'];
      $enc_api_token = Crypt::encryptString($api_token);
      $search = $request->search;
      $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/papers_autocomplete',[
        'api_token' => $enc_api_token,
        'search' => $search,
      ]);
      $data = array();
      $data = $response->json();
      // dd($data);

      if ($response['papers']) {
        $output = '<ul class="dropdown-menu auto_c" style="display:block; position:relative">';
        foreach($response['papers'] as $key => $row)
        {
         $output .= '
         <li><a class="paper_auto_list" href="#">'.$row['name'].'</a></li>
         ';
        }
        $output .= '</ul>';

        if ($response->successful()) {
          return response()->json($output);
        }
      }
    }


    public function upload_image(Request $request){

      $datas = $request->all();
      $datas['is_id'] = Session::get('users')['seeder_id'];
      $api_token = Session::get('users')['api_token'];
      $datas['api_token'] = Crypt::encryptString($api_token);
      $session_id = Session::getId();



      if ($request->hasFile('paper_img') && $request->file('paper_img')->isValid()) {
        $image = $request->file('paper_img');
        $response = Http::attach('paper_img', file_get_contents($image), 'paperimg.jpg')
            ->post('http://127.0.0.1:8000/api/user-image-upload', $datas);
    } else {
        $response = Http::post('http://127.0.0.1:8000/api/user-image-upload', $request->all());
    }

      if ($response->successful()) {
        $res = $response->json();
        // dd($res);
        if($res['success'] == 'true' && $res['error'] == 'false' && $res['duplicate'] == 'false'){
          // dd('success');
          $data = array();
        return redirect('/image-update')->with('success','Image uploaded successfully');
      }elseif ($res['success'] == 'false' && $res['error'] == 'true' && $res['duplicate'] == 'false') {
        // dd('error');
        return redirect('/image-update')->with('danger','Please try later');
      }elseif ($res['success'] == 'false' && $res['error'] == 'false' && $res['duplicate'] == 'true') {
        // dd('dup');
      return redirect('/image-update')->with('danger','Paper Title Already Exists');
      }
      }else {
        // dd('please try later');
      return redirect('/image-update')->with('danger','Please try later');
      }
    }
}
