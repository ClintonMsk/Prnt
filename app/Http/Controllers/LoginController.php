<?php

namespace App\Http\Controllers;

use App\Libraries\utility;
use App\Http\Controllers\HomeBEController;
use App\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index(Request $request)
    {

        $u = "admintnc";
        $p = "admintnc2018";



        return View("loginform");
    }

    public function Login(Request $request){


        $user = $request->username;
        $password = md5($request->password);
       // echo $password;
        //exit();
        $data = DB::table("print_admin")->where("admin_username","=",$user)
            ->where("admin_password","=",$password)->get()
        ;


        if(count($data) == 1 ){
            foreach ($data as $result){
                $request->session()->put('username',$result->admin_username);
            }


            $respon = array("status"=>"success");
        }else{
            $respon = array("status"=>"fail");
        }

        echo json_encode($respon);



        }


    public function Logout(Request $request){

        $request->session()->flush();
        return redirect("/");

    }

}
