<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SecretController extends Controller {
    public function gets()
    {
        $response = DB::table('oauth_clients')->where('id',2)->first();
        dd($response);
        return response()->json($response);
    }
    function get(Request $request){
        
        return  json_encode("james");
     }
}