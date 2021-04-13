<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;


class LoginController extends FrontController
{
    protected $data = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function show(){
        return view('pages.log', $this->data);
    }
    public function login(Request  $request){

        try {
            $user = new User();
            $user->email = $request->input('email');
            $user->password = $request->input('password');


            $rez = $user->login();

            if($rez){
                $request->session()->put('user', $rez);


                return $rez->roleName == "admin" ? redirect('/admin') :redirect('/');

            }else{
                return  redirect()->back()->with('neuspesnoLogovanje', 'EMAIL OR PASSWORD IS INCORRECT!');
            }

           }catch (Exception $e){

            Log::error("GRESKA  : " . $e->getMessage());
            return redirect(route('/'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
              }

       }




    public function logout(){
        session()->forget('user');
        return redirect('/');
    }
}
