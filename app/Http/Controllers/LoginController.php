<?php

namespace App\Http\Controllers;

use App\login;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }




    public function create()
    {
        
    }

    public function store(Request $request){

        $data = array(
            'email' => $request->email,
            'password' => $request->password,
            'number' => $request->number,
            'token' => 'Basic '.sha1(time()),
        );
        
  
        $result = login::save_user($data);

        if($result){
            echo "success";
        } else {
            echo "error";
        }

    }


    public function show(Request $request)
    {
        $result = login::check_user($request);

        echo $result;
    }


    public function edit(login $login)
    {

    }


    public function update(Request $request, login $login)
    {

    }

    public function destroy(login $login)
    {

    }
}
