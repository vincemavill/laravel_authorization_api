<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class login extends Model
{
    static function save_user($data){
        $result = DB::table('user_tble')->insert($data);
        
        return $result;
    }

    static function check_user($request){

        $email = $request->email;
        $password = $request->password;
        
        $result = DB::table('user_tble')
                     ->select('*')
                    //  ->where('BINARY email', $email)
                    //  ->where('BINARY password', $password)
                    ->where( DB::raw('BINARY `email`'), $email)
                    ->where( DB::raw('BINARY `password`'), $password)
                     ->get();

        if(count($result)){

            $data=array(
                'token' => 'Basic '.sha1(time()),
            );
            DB::table('user_tble')
            ->where( DB::raw('BINARY `token`'), $result[0]->token )
            ->where( 'id','=', $result[0]->id )
            ->update($data);
            echo "success";
        }   else {
            echo "error";
        }
    
   
    }
}
