<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
Use App\Models\Player;
use Carbon\Carbon;

class EmailVerifyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function VerifyEmail($id,$token)
      {
        // return response()->json("success");
          $token = $token;
          $token = Crypt::decryptString($token);
          $idget = Crypt::decryptString($id);

          $response = Http::accept('application/json')->get('http://127.0.0.1:8000/api/seeder-verify-email',[
              'id' => $idget,
          ]);

          if ($response->successful()) {
            return redirect('/profile-setting');
          }else {
            return response()->json("error");
          }

      }

}
