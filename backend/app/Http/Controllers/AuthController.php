<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;
use Crypt;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */



    public function register_submit()
    {
        // return Request::all();
        $data = Request::all();
        $rules['first_name']                = "required";
        $rules['middle_name']               = "required";
        $rules['last_name']                 = "required";
        $rules['contact']                   = "required";
        $rules['birthdate']                 = "required|date";
        $rules['gender']                    = "required";
        $rules['email']                     = "required|unique:users,email";
        $rules['password']                  = "required";
        $rules['password_confirmation']     = "required|same:password";
        $rules['group_id']                  = "required|integer";


        $validator = Validator::make($data,$rules);
        if($validator->fails())
        {
            $return['status']       = "error";
            $return['status_code']  = 400;
            $return['status_data']  = $validator->errors()->getMessages();

            
            // foreach ($validator->errors()->getMessages() as $key => $value) 
            // {
            //     foreach($value as $val) 
            //     {
            //         $return['status_data'][$error] = $val;

            //         $error++;
            //     }
            // }

        }
        else
        {
            
            $user = User::create([
                'name'          => $data['first_name']." ".$data['last_name'],
                'first_name'    => $data['first_name'],
                'middle_name'   => $data['middle_name'],
                'last_name'     => $data['last_name'],
                'contact'       => $data['contact'],
                'birthdate'     => $data['birthdate'],
                'gender'        => $data['gender'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
                'auth'          => Crypt::encrypt($data['password']),
                'access'        => $data['access'],
                'status'        => 0,
                'group_id'      => $data['group_id'],
                
            ]);
            $user->decrypted_password = $data['password'];

            $return['status']       = "success";
            $return['status_code']  = 200;
            $return['status_data']  = $user;
        }
     
        return $return;
    }
}
