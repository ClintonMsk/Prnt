<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use App\Http\Controllers\Controller;
use App\Query;
use App\Libraries\utility;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationServiceProvider;



class CardBEController extends BaseController
{

    public function __construct()
    {
      $this->Mainfolder = "Card";
    }
    public function list(\Illuminate\Http\Request $request){

        $limit = $request->limit;
        $group = $request->group;
        $product = $request->product;
        $search = $request->search;
        $orderby = $request->orderby;
        $sortby = $request->sortby;

        $group_code = "";
        $product_code = "";
        $order = "";
        $sort = "";

        switch ($orderby){
            case "วันที่":
                $order = "card_date_time";
                break;
            case "ราคา":
                $order = "card_price";
                break;
            case "ชื่อ":
                $order = "card_title";
                break;
            default:
                $order = "card_date_time";
                break;
        }


        switch ($sortby){
            case "มากไปน้อย":
                $sort = "DESC";
                break;
            case "น้อยไปมาก":
                $sort = "ASC";
                break;
            default:
                $sort = "DESC";
                break;
        }

        //echo $sort;
        //echo $order;

        //exit();

        // echo $limit;


        if ($request->page == 0) {
            $page_number = 0;
        } else {
            $page_number = (($request->page - 1) * $limit);
        }

       $group_data = Query::CustomQuery("SELECT * FROM print_type WHERE type_main_title = 'group' AND type_title = '$group' ");
       $product_data = Query::CustomQuery("SELECT * FROM print_type WHERE type_main_title = 'product' AND type_title = '$product' ");

        //exit();

        //echo $group ."<br>";
        //echo $product ."<br>";

       if(count($group_data) != 0 ){
           $group_code = $group_data[0]->type_code;
       }

       if(count($product_data) != 0 ){
           $product_code = $product_data[0]->type_code;
       }
        //echo $group_code ."<br>";
        //echo $product_code ."<br>";




        /*All*/
        if($product == trans("tool.all") && $search == ""  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.''.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);

        }
        /*All*/

        /*Condition*/
        if($product == trans("tool.all") && $search == ""  ){


            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.''.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);
            //echo  "2";
            //exit();


        }
        if( $product != trans("tool.all") && $search == ""  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.$product_code.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        if($product == trans("tool.all") && $search != ""  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.''.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        /*Condition*/


        /*Contition multi*/
        if($product != trans("tool.all") && $search == ""  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.$product_code.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }

        if( $product != trans("tool.all") && $search != ""  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.$product_code.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }

        if($product == trans("tool.all") && $search != "" ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.''.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }

        //print_r($data);
        //exit();


        return View("b_list_card")
            ->with("data",$data)
            ->with("count", count($all))
            ->with("limit", $request->limit)
            ->with("sortby", $request->sortby)
            ->with("orderby", $request->orderby)
            ->with("search", $request->search)
            ->with("group", $group)
            ->with("product",$product)
            ->with("page", $request->page);
            ;
    }
    public function Add(){$Utility = new utility();
       $folder = $Utility->generate_code(5);
       $code = $Utility->generate_code(5);

       $product = Query::selectDataCon("print_type","type_main_title","product","=");
       $group = Query::selectDataCon("print_type","type_main_title","group","=");
       $dimensions = Query::selectDataCon("print_type","type_main_title","dimensions","=");
       $type_paper = Query::selectDataCon("print_type","type_main_title","type_paper","=");
       $printime = Query::selectDataCon("print_type","type_main_title","printime","=");

       return View("b_card_form")
           ->with("folder",$folder)
           ->with("code",$code)
           ->with("group",$group)
           ->with("product",$product)
           ->with("dimensions",$dimensions)
           ->with("type_paper",$type_paper)
           ->with("printime",$printime)
           ;
    }
    public function UploadImageCard(\Illuminate\Http\Request $request){

       $mytime = Carbon::now();
       $Utility = new utility();
       $name_file = $Utility->generate_code(5);
       $mainfolder = $this->Mainfolder;
       $folder = $request->foldername;
       $contentcode = $request->codes;
       //echo $mainfolder;
       $codeimage = $Utility->generate_code(5);



        if(!File::isDirectory("Media/".$mainfolder)){
            File::makeDirectory("Media/".$mainfolder,0777, true);
        }

        if(!File::isDirectory("Media/".$mainfolder."/".$folder)){
            File::makeDirectory("Media/".$mainfolder."/".$folder,0777, true);
        }


        if(!File::isDirectory("Media/".$mainfolder."/".$folder."/Gallery")){
            File::makeDirectory("Media/".$mainfolder."/".$folder."/Gallery",0777, true);
        }

        $name_original = $request->file('file_data')->getClientOriginalName();

        $uploadIMG = FormController:: UploadImagereturnData($request->file('file_data'), 640, 480, $name_file, ".jpg", "$mainfolder", $folder."/Gallery");
        $url = URL::to('/').$uploadIMG."_Original.jpg";

        $urlDelte = URL::to('/')."/DeleteImageCard";



        $data = array();
        $config = array();
        $extra = array();

        $extra = array("folder"=>$folder,"namefile"=>$name_file);

        $config = array(["caption"=>"$name_original","url"=>$urlDelte,"width"=>"120px","key"=>$codeimage,"extra"=>$extra,"showDelete"=>true]);
        $data = array("initialPreview"=>$url,
                      "initialPreviewConfig"=>$config,
                      "append"=>false
        );

        $input = array("gal_code","gal_code_content","gal_o_name","gal_name","gal_folder","gal_date");
        $value = array("$codeimage","$contentcode","$name_original","$name_file","$folder","$mytime");
        Query::Insertdata("print_gallery",$input,$value);



        echo json_encode($data);


    }
    public function DeleteImageCard(\Illuminate\Http\Request $request){

       $mainfolder = $this->Mainfolder;
       $code = $request->key;
       $folder = $request->folder;
       $namefile = $request->namefile;

       $url = 'Media/'.$mainfolder."/".$folder."/Gallery/".$namefile;
        Query::DeleteData("print_gallery","gal_code","$code");
        FormController::DeletetimageSet($url);
        echo "{}";
    }
    public function Post(Request $request){

        $Utility = new utility();
        $mytime = Carbon::now();

        $mainfolder = $this->Mainfolder;
        $folder = $request->folder;
        $code = $request->code;

        $title = $request->title;
        $detail = $request->detail;
        $note = $request->note;
        $other = $request->other;
        $group = $request->group;
        $product = $request->product;
        $dimensions = $request->dimensions;
        $type_paper = $request->type_paper;
        $printime = $request->printime;
        $price = $request->price;

        $cover_name = $Utility->generate_code(10);

        if(!File::isDirectory("Media/".$mainfolder)){
            File::makeDirectory("Media/".$mainfolder,0777, true);
        }

        if(!File::isDirectory("Media/".$mainfolder."/".$folder)){
            File::makeDirectory("Media/".$mainfolder."/".$folder,0777, true);
        }


        if(!File::isDirectory("Media/".$mainfolder."/".$folder."/Gallery")){
            File::makeDirectory("Media/".$mainfolder."/".$folder."/Gallery",0777, true);
        }


        if ($request->hasFile('Cover')) {
            $uploadIMG = FormController:: UploadImagereturnData($request->file('Cover'), 1024, 731, $cover_name, ".jpg", "$mainfolder", $folder);
        }



        $input = array("card_code","card_title","card_description","card_cover","card_folder","card_product","card_dimension","card_type","card_printing_time","card_price","card_date_time");
        $value = array("$code","$title","$detail","$cover_name","$folder","$product","$dimensions","$type_paper","$printime","$price","$mytime");
        Query::Insertdata("print_card", $input, $value);










        echo 1;

    }
    public function Edit(\Illuminate\Http\Request $request){

        $url_array = [];
        $code = $request->code;

        $data = Query::selectDataCon("print_card","card_code","$code","=");

        $product = Query::selectDataCon("print_type","type_main_title","product","=");
        $group = Query::selectDataCon("print_type","type_main_title","group","=");
        $dimensions = Query::selectDataCon("print_type","type_main_title","dimensions","=");
        $type_paper = Query::selectDataCon("print_type","type_main_title","type_paper","=");
        $printime = Query::selectDataCon("print_type","type_main_title","printime","=");
        $gallery = Query::selectDataCon("print_gallery", "gal_code_content", "$code", "=");
        $folder = $data[0]->card_folder;

        foreach ($gallery as $result_gal){

            $url = URL::to('/')."/Media/Card/".$folder."/Gallery/".$result_gal->gal_name."_Original.jpg";




            $extra = array("folder"=>$folder,"namefile"=>$result_gal->gal_name);
            $url_array [] = $url;
            $config [] = array(["caption"=>$result_gal->gal_name]);
        }




       return View("b_card_edit_form")
           ->with("data", $data)
           ->with("group",$group)
           ->with("product",$product)
           ->with("dimensions",$dimensions)
           ->with("type_paper",$type_paper)
           ->with("printime",$printime)
           ->with("url", $url_array)
           ->with("gallery", $gallery)
            ;



    }
    public function LoadImage(\Illuminate\Http\Request $request)
    {
    }
    public function Update(\Illuminate\Http\Request $request){


        $mainfolder = $this->Mainfolder;
        $folder = $request->folder;
        $code = $request->code;
        $title = $request->title;
        $detail = $request->detail;
        $product = $request->product;
        $dimensions = $request->dimensions;
        $type_paper = $request->type_paper;
        $printime = $request->printime;
        $price = $request->price;
        $cover_name = $request->cover_name;

        if(!File::isDirectory("Media/".$mainfolder)){
            File::makeDirectory("Media/".$mainfolder,0777, true);
        }

        if(!File::isDirectory("Media/".$mainfolder."/".$folder)){
            File::makeDirectory("Media/".$mainfolder."/".$folder,0777, true);
        }


        if(!File::isDirectory("Media/".$mainfolder."/".$folder."/Gallery")){
            File::makeDirectory("Media/".$mainfolder."/".$folder."/Gallery",0777, true);
        }


        if ($request->hasFile('Cover')) {
            $uploadIMG = FormController:: UploadImagereturnData($request->file('Cover'), 1024, 731, $cover_name, ".jpg", "$mainfolder", $folder);
        }


        $input = array("card_title","card_description","card_product","card_dimension","card_type","card_printing_time","card_price");
        $value = array("$title","$detail","$product","$dimensions","$type_paper","$printime","$price");
        Query::updateData("print_card", $input, $value,"card_code","$code");
        echo 1;



    }
    public function UploadDocument(\Illuminate\Http\Request $request){
        $mytime = Carbon::now();
        $Utility = new utility();
        $name_file = $Utility->generate_code(20);
        $mainfolder = $this->Mainfolder;
        $folder = $request->foldername;
        $contentcode = $request->codes;
        //echo $mainfolder;
        $codedoc= $Utility->generate_code(20);
        $path = "Media/".$mainfolder."/".$folder."/Document";


        if(!File::isDirectory("Media/".$mainfolder)){
            File::makeDirectory("Media/".$mainfolder,0777, true);
        }

        if(!File::isDirectory("Media/".$mainfolder."/".$folder)){
            File::makeDirectory("Media/".$mainfolder."/".$folder,0777, true);
        }


        if(!File::isDirectory("Media/".$mainfolder."/".$folder."/Document")){
            File::makeDirectory("Media/".$mainfolder."/".$folder."/Document",0777, true);
        }

        $type_set = "";
        $type = $request->file('file_document')->getClientMimeType();
        $name_original = $request->file('file_document')->getClientOriginalName();

        //echo $type;


        switch ($type){
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document" :
                $type_set = "docx";
                $type_preview = "office";
                break;
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" :
                $type_set = "xlsx";
                $type_preview = "office";
                break;
            case "application/vnd.openxmlformats-officedocument.presentationml.presentation" :
                $type_set = "pptx";
                $type_preview = "office";
                break;
            case "application/msword" :
                $type_set = "doc";
                $type_preview = "office";
                break;
            case "application/octet-stream" :
                $type_set = "xls";
                $type_preview = "office";
                break;
            case "application/vnd.ms-powerpoint" :
                $type_set = "ppt";
                $type_preview = "office";
                break;
            case "application/pdf" :
                $type_set = "pdf";
                $type_preview = "pdf";
                break;
        }

        $file = Input::file('file_document');
        $file->move($path,$codedoc.".".$type_set);


        $urlDelte = URL::to('/')."/DeleteDoc";
        $url = URL::to('/')."/".$path."/".$codedoc.".".$type_set;


        $data = array();
        $config = array();
        $extra = array();

        $extra = array("folder"=>$folder,"namefile"=>$name_file,"type",$type_set);

        $input = array("doc_code","doc_code_content","doc_folder","doc_namefile","doc_name_original","doc_type","doc_date_add");
        $value = array("$codedoc","$contentcode","$folder","$name_file","$name_original","$type_set","$mytime");
        Query::Insertdata("honda_document",$input,$value);

        $config = array(["caption"=>"$name_original","url"=>$urlDelte,"width"=>"120px","type"=>$type_preview,"key"=>$codedoc,"extra"=>$extra,"showDelete"=>true]);
        $data = array("initialPreview"=>$url,
            "initialPreviewConfig"=>$config,
            "append"=>false
        );


        echo json_encode($data);

    }
    public function DeleteDoc(\Illuminate\Http\Request $request){
        $mainfolder = $this->Mainfolder;
        $code = $request->key;
        $folder = $request->folder;
        $namefile = $request->namefile;
        $type = $request->type;

        $url = 'Media/'.$mainfolder."/".$folder."/Document/".$namefile.".".$type;
        Query::DeleteData("honda_document","doc_code","$code");
        FormController::DeleteFile($url);
        echo "{}";
    }
    public function GetGroup(\Illuminate\Http\Request $request){
        $html = '';
        $group = $request->group;
        $G = Query::selectData("honda_activity_group");
        $html .= "<option value='' >SelectGroup</option>";
        foreach ($G as $result){

            if($group == $result->group_code){
                $html.= "<option selected value='$result->group_code' >$result->group_title</option>";
            }else{
                $html.= "<option value='$result->group_code' >$result->group_title</option>";
            }


        }


        echo $html;
    }
    public function PostGroup(\Illuminate\Http\Request $request){
        $data=  array();
        $Utility = new utility();
        $mytime = Carbon::now();
        $title = $request->title;
        $type_title = $request->type;

        $check = Query::CustomQuery("SELECT * FROM print_type WHERE type_title = '$title' AND type_main_title = '$type_title'  ");
        if(count($check) != 1){
            $code = $Utility->generate_code(5);
            $input = array("type_code","type_title","type_main_title","type_date_add");
            $value = array("$code","$title","$type_title","$mytime");
            Query::Insertdata("print_type",$input,$value);

            $data = array("Status" => "Success","Code"=>$code);
            echo json_encode($data);
        }else{
            $data = array("Status" => "Duplicate","Code"=>"NULL");
            echo json_encode($data);
        }


    }
    public function UpdateType(\Illuminate\Http\Request $request){
        $title = $request->title;
        $code = $request->code;
        $input = array("type_title");
        $value = array("$title");
        Query::updateData("print_type",$input,$value,"type_code","$code");
        $data = array("Status" => "Success","Code"=>$code);
        echo json_encode($data);
    }
    public function TypeList(\Illuminate\Http\Request $request){
       $data =  Query::CustomQuery("SELECT DISTINCT (type_main_title) FROM print_type");
        //print_r($data);
        //exit();
        return View("b_list_type")
            ->with("data",$data)
            ;
    }

}



