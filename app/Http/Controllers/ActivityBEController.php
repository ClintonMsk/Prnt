<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\stream_for;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use App\Query;
use App\Libraries\utility;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ActivityBEController extends BaseController
{

    public function __construct()
    {
      $this->Mainfolder = "Activity";
    }
    public function list(\Illuminate\Http\Request $request){

        $limit = $request->limit;
        // echo $limit;


        if ($request->page == 0) {
            $page_number = 0;
        } else {
            $page_number = (($request->page - 1) * $limit);
        }


        if ($request->search == "null") {

            //echo "Null";

            $input = array('group_title');
            $con = array('LIKE');
            $value = array('%'.''.'%');

            $data = Query::PaginationContitionSortLimit("honda_activity_group", $page_number, $limit, "$request->sortby", "$request->orderby", $input, $value, $con);
            //echo count($data)."<br>";
            $all = Query::PaginationContitionSort("honda_activity_group", "$request->sortby", "$request->orderby", $input, $value, $con);
           // echo count($all)."<br>";

        } else {

            echo "Search";

            $input = array('group_title');
            $con = array('LIKE');
            $value = array('%' . $request->search . '%');

            $data = Query::PaginationContitionSortLimit("honda_activity_group", $page_number, $limit, "$request->sortby", "$request->orderby", $input, $value, $con);
            //echo count($data)."<br>";
            $all = Query::PaginationContitionSort("honda_activity_group", "$request->sortby", "$request->orderby", $input, $value, $con);
            //echo count($all)."<br>";

        }

        //echo count($all);
        //exit();



        return View("b_list_activity")
            ->with("data",$data)
            ->with("count", count($all))
            ->with("limit", $request->limit)
            ->with("sortby", $request->sortby)
            ->with("orderby", $request->orderby)
            ->with("search", $request->search)
            ->with("page", $request->page);
            ;
    }
    public function Add(){$Utility = new utility();
       $folder = $Utility->generate_code(5);
       $code = $Utility->generate_code(5);
       return View("b_activity_form")
           ->with("folder",$folder)
           ->with("code",$code)
           ;
    }
    public function UploadImageActivity(\Illuminate\Http\Request $request){

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

        $urlDelte = URL::to('/')."/DeleteImageActivity";



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
        Query::Insertdata("honda_gallery",$input,$value);



        echo json_encode($data);


    }
    public function DeleteImageActivity(\Illuminate\Http\Request $request){

       $mainfolder = $this->Mainfolder;
       $code = $request->key;
       $folder = $request->folder;
       $namefile = $request->namefile;

       $url = 'Media/'.$mainfolder."/".$folder."/Gallery/".$namefile;
        Query::DeleteData("honda_gallery","gal_code","$code");
        FormController::DeletetimageSet($url);
        echo "{}";
    }
    public function Post(\Illuminate\Http\Request $request){
        $Utility = new utility();
        $mytime = Carbon::now();

        $mainfolder = $this->Mainfolder;
        $folder = $request->folder;
        $code = $request->code;

        $codevdo = $Utility->generate_code(10);
        $namevdo = $Utility->generate_code(10);
        $title = $request->title;
        $detail = $request->detail;
        $instructor = $request->instructor;
        $category = $request->category;
        $week = $request->week;
        $type = $request->type;
        $link = $request->link;
        $vdolink = $request->vdolink;
        $materail = $request->materail;





            $input = array("activity_code","activity_code_group","activity_title","activity_week","activity_detail","activity_materail","activity_video","activity_folder","activity_instructor","activity_date_add");
            $value = array("$code","$category","$title","$week","$detail","$vdolink","$materail","$folder","$instructor","$mytime");
            Query::Insertdata("honda_activity", $input, $value);




        if(!File::isDirectory("Media/".$mainfolder)){
            File::makeDirectory("Media/".$mainfolder,0777, true);
        }

        if(!File::isDirectory("Media/".$mainfolder."/".$folder)){
            File::makeDirectory("Media/".$mainfolder."/".$folder,0777, true);
        }


        if(!File::isDirectory("Media/".$mainfolder."/".$folder."/Gallery")){
            File::makeDirectory("Media/".$mainfolder."/".$folder."/Gallery",0777, true);
        }


        if(!File::isDirectory("Media/".$mainfolder."/".$folder."/Video")){
            File::makeDirectory("Media/".$mainfolder."/".$folder."/Video",0777, true);
        }

        if($_POST["type"] == 1){


            $input = array("video_code","video_code_content","video_name","video_folder","video_link","video_type","video_date_add");
            $value = array("$codevdo","$code","$namevdo","$folder","$link","$type","$mytime");
            Query::Insertdata("honda_video",$input,$value);
        }else{

            $path = "Media/".$mainfolder."/".$folder."/Video";
            $file = Input::file('file');
            $file->move($path,$namevdo.".MP4");

            $input = array("video_code","video_code_content","video_name","video_folder","video_link","video_type","video_date_add");
            $value = array("$codevdo","$code","$namevdo","$folder","$link","$type","$mytime");
            Query::Insertdata("honda_video",$input,$value);

        }








        echo 1;
    }
    public function Edit(\Illuminate\Http\Request $request){
        $code = $request->code;
        $category = Query::selectDataCon("non_place_cat","cat_lang_id","1","=");
        $lang = Query::selectData("non_lang");
        $place_data = Query::selectDataCon("non_place","place_code","$code","=");
        $plac_sub = Query::selectDataCon("non_place_sub", "places_p_code", "$code", "=");
        $gallery = Query::selectDataCon("non_gallery", "gal_code_content", "$code", "=");
        $folder = $plac_sub[0]->places_folder;

        $Conifotall = array();
        $data = array();
        $config = array();
        $extra = array();
        $urlDelte = URL::to('/')."/DeleteImagePlace";
        $url_array =  array ();

        //print_r($gallery);
        foreach ($gallery as $result_gal){

            $url = URL::to('/')."/Picture/Place/".$folder."/Gallery/".$result_gal->gal_name."_Original.jpg";




            $extra = array("folder"=>$folder,"namefile"=>$result_gal->gal_name);
            $url_array [] = $url;
            $config [] = array(["caption"=>$result_gal->gal_name]);
        }


        //print_r($config);
        $url_jde = json_encode($url_array);
        $gal_jde = json_encode($config);

       // echo $url_jde;
        //echo $gal_jde;


        //print_r($url_array);
        //print_r($config);




        /*$data = array("initialPreview"=>$url,
            "initialPreviewConfig"=>$config,
            "append"=>false
        );*/


       return View("b_place_edit_form")
            ->with("code", $code)
            ->with("lang", $lang)
            ->with("data", $place_data)
            ->with("data_sub", $plac_sub)
            ->with("gallery", $gallery)
            ->with("url", $url_array)
            ->with("gallery", $gallery)
            ->with("category", $category)
            ;



    }
    public function LoadImage(\Illuminate\Http\Request $request)
    {
    }
    public function Update(\Illuminate\Http\Request $request){

        $Utility = new utility();
        $mytime = Carbon::now();
        $lang = Query::selectData("non_lang");

        $mainfolder = $this->Mainfolder;
        $folder = $request->foldername;
        $code = $request->code;
        $codes = $Utility->generate_code(5);
        $tel = $request->tel;
        $line = $request->line;
        $facebook = $request->facebook;
        $website = $request->website;
        $category = $request->category;
        $latitude = $request->latitude;
        $longtitude= $request->longtitude;
        $asset = $request->asset;
        $asset_set = $request->asset_set;
        $cover = $request->cover;
        $covername = $request->covername;
        $cover_asset_name = $request->cover_asset_name;



        foreach($lang as $result){
            $lang_id = $result->lang_id;
            $title = $request->title[$lang_id];
            $detail= $request->detail[$lang_id];
            $address = $request->address[$lang_id];

            $input = array("place_title","place_detail","place_address");
            $value = array("$title","$detail","$address");

            Query::updateDataMulti("non_place",$input,$value,"place_code",$code,"place_lang_id",$lang_id);

        }







        $input = array("places_category","places_tel","places_line","places_asset","places_content_asset","places_facebook","places_website","places_folder","places_location_la","places_location_long","places_dateadd");

        $value = array("$category","$tel","$line","$asset_set","$asset","$facebook","$website","$folder","$latitude","$longtitude","$mytime");

        Query::updateData("non_place_sub",$input,$value,"places_p_code",$code);




        if(!File::isDirectory("Picture/".$mainfolder)){
            File::makeDirectory("Picture/".$mainfolder,0777, true);
        }

        if(!File::isDirectory("Picture/".$mainfolder."/".$folder)){
            File::makeDirectory("Picture/".$mainfolder."/".$folder,0777, true);
        }


        if(!File::isDirectory("Picture/".$mainfolder."/".$folder."/Gallery")){
            File::makeDirectory("Picture/".$mainfolder."/".$folder."/Gallery",0777, true);
        }

        if ($request->hasFile('cover')) {
            $uploadIMG = FormController:: UploadImage($request->file('cover'), 1048, 768, $covername, ".jpg", "$mainfolder", $folder);
        }

        if ($request->hasFile('cover_asset')) {
            $uploadIMG = FormController:: UploadImage($request->file('cover_asset'), 1048, 768, $cover_asset_name, ".jpg", "$mainfolder", $folder);
        }


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

        $code = $Utility->generate_code(5);
        $input = array("group_code","group_title","group_date_add");
        $value = array("$code","$title","$mytime");
        Query::Insertdata("honda_activity_group",$input,$value);
        //echo 1;

        $data = array("Status" => "Success","Code"=>$code);
        echo json_encode($data);


    }


}



