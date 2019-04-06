<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\article_model;
use App\Http\Resource\ArticleResource;


class article_controller extends Controller
{

    public function index($user_id)
    {
        // get articles
        // $data = article_model::all();

        echo  $user_id."<br><br>";

        return view("welcome");

   
    }

    public function not_login()
    {
        return view("notlogin");
    }
    
    public function create()
    {

    }

    public function store(Request $request)
    {

    }


    public function show()
    {
        return view('instruction');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }


}
