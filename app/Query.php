<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Query extends Model
{
    public static function CustomQuery($SQL){
        $data = DB::select("$SQL");
        //echo $SQL;
        return $data;

    }

    public  static function selectData($table){
      $data = DB::table($table)->get();
      return $data;
    }

    public  static function selectDataCon($table,$fild,$values,$con){
        $data = DB::table($table)->where($fild, $con, $values)->get();
        return $data;
    }


    public  static function selectDataConLimitBy($table,$fild,$values,$con,$limit,$ordername,$orderby){
        $data = DB::table($table)->where($fild, $con, $values)->orderBy($ordername, $orderby)->limit($limit)->get();
        return $data;
    }

    public  static function selectDataConLimitByPagi($table,$fild,$values,$con,$ordername,$orderby,$start,$end){
        $data = DB::table($table)->where($fild, $con, $values)->orderBy($ordername, $orderby)->skip($start)->take($end)->get();
        return $data;
    }

    public static function whereData($table,$fild,$value){
        $data = DB::table($table)->where($fild,$value)->get();
        return $data;
    }

    public static function Insertdata($table,$input,$value){

        for ($i = 0 ; sizeof($input) > $i ; $i++ ){
            $datas[$input[$i]] = $value[$i];
        }
        DB::table($table)->insert($datas);
        //echo 0;
    }


    public static function updateData($table,$input,$value,$fild,$values){

        for ($i = 0 ; sizeof($input) > $i ; $i++ ){
            $datas[$input[$i]] = $value[$i];
        }
        DB::table($table)->where($fild,$values)->update($datas);

    }


    public static function updateDataMulti($table,$input,$value,$fild,$values,$fild2,$value2){

        for ($i = 0 ; sizeof($input) > $i ; $i++ ){
            $datas[$input[$i]] = $value[$i];
        }
        DB::table($table)
            ->where($fild,$values)
            ->where($fild2,$value2)
            ->update($datas);

    }

    public static function DeleteData($table,$fild,$values){


        //DB::table($table)->where($fild,$values)->update($datas);
        DB::table($table)->where($fild,'=',$values)->delete();

    }

    public static function DeleteDatamultiple($table,$fild,$values,$fild2,$value2){


        //DB::table($table)->where($fild,$values)->update($datas);
        DB::table($table)->
        where($fild, '=', $values)->
        orWhere($fild2, '=', $value2)
        ->delete();

    }

    public static function Pagination($table,$start,$end){
        $data =  DB::table($table)->skip($start)->take($end)->get();
        return $data;

    }
    public static function SelectContitionor($table,$input,$value,$con,$sortby,$orderby){


        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orWhere($input[4],$con[4],$value[4])
                    ->orderBy($sortby,$orderby)->get();
                return $data;
                break;
        }




    }
    public static function SelectContitionand($table,$input,$value,$con,$sortby,$orderby){


        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->where($input[4],$con[4],$value[4])
                    ->orderBy($sortby,$orderby)->get();
                return $data;
                break;
        }




    }
    public static function SelectContitionandlimit($table,$input,$value,$con,$sortby,$orderby,$limit){


        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($sortby,$orderby)
                    ->limit($limit)
                    ->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orderBy($sortby,$orderby)
                    ->limit($limit)
                    ->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->orderBy($sortby,$orderby)
                    ->limit($limit)
                    ->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orderBy($sortby,$orderby)
                    ->limit($limit)
                    ->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->where($input[4],$con[4],$value[4])
                    ->orderBy($sortby,$orderby)
                    ->limit($limit)
                    ->get();
                return $data;
                break;
        }




    }

    public static function Loginform($table,$userip,$passip,$username,$password){


                $data =  DB::table($table)
                    ->where("$userip","=",$username)
                    ->where("$passip","=",$password)
                    ->get();
                return $data;

    }
    public static function PaginationContitionSortLimit($table,$start,$end,$sortby,$orderby,$input,$value,$con){




        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orWhere($input[4],$con[4],$value[4])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
        }




    }
    public static function PaginationContitionSort($table,$sortby,$orderby,$input,$value,$con){


        //echo count($input);





        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orWhere($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orWhere($input[4],$con[4],$value[4])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
        }




    }

    public static function PaginationContitionSortLimitand($table,$start,$end,$sortby,$orderby,$input,$value,$con){




        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->where($input[4],$con[4],$value[4])
                    ->orderBy($orderby,$sortby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
        }





    }
    public static function PaginationContitionSortand($table,$sortby,$orderby,$input,$value,$con){


        //echo count($input);





        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->where($input[4],$con[4],$value[4])
                    ->orderBy($orderby,$sortby)
                    ->get();
                return $data;
                break;
        }




    }

    public static function PaginationContitionSortLimitandor($table,$start,$end,$sortby,$orderby,$input,$value,$con){




        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orderBy($sortby,$orderby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orderBy($sortby,$orderby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orderBy($sortby,$orderby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orderBy($sortby,$orderby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->where($input[4],$con[4],$value[4])
                    ->orderBy($sortby,$orderby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;
                break;
        }




    }
    public static function PaginationContitionSortandor($table,$sortby,$orderby,$input,$value,$con){


        //echo count($input);





        switch (count($input)){
            case "1":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "2":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "3":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "4":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->orWhere($input[2],$con[2],$value[2])
                    ->orWhere($input[3],$con[3],$value[3])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
            case "5":
                $data =  DB::table($table)
                    ->where($input[0],$con[0],$value[0])
                    ->where($input[1],$con[1],$value[1])
                    ->where($input[2],$con[2],$value[2])
                    ->where($input[3],$con[3],$value[3])
                    ->where($input[4],$con[4],$value[4])
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;
                break;
        }




    }

    public static function PaginationSortLimit($table,$start,$end,$sortby,$orderby){



                $data =  DB::table($table)
                    ->orderBy($sortby,$orderby)
                    ->skip($start)
                    ->take($end)->get();
                return $data;

        }
    public static function PaginationSort($table,$sortby,$orderby){

                $data =  DB::table($table)
                    ->orderBy($sortby,$orderby)
                    ->get();
                return $data;

    }

}
