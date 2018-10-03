<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Query;
use App\Libraries\utility;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;



class FormController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function PostFile(\Illuminate\Http\Request $request){

        if(Input::hasFile("file")){
            $file = Input::file('file');
            $anme_file = $request->input("name_file");
            list($width, $height) = getimagesize($file);
            $file->move("Upload",$anme_file.".jpg");
            $img_src = url("/Upload/".$anme_file.".jpg");
            $data = array("src" => $img_src,"width"=>$width,"height"=>$height);
            echo json_encode($data);

        }


    }
    public function DeleteUpload(\Illuminate\Http\Request $request){


        $path = "Upload/".$request->name_file_del.".jpg";
        if(File::exists($path)){
                File::delete($path);
                echo 1;
        }


    }
    public function Deletetimage(\Illuminate\Http\Request $request){


        $path = $request->path."_Thumb.jpg";
        $path2 = $request->path."_Original.jpg";
        if(File::exists($path)){
            File::delete($path);
            File::delete($path2);
            echo 1;
        }


    }
    public static function DeletetimageSet($pathimage){


        $path = $pathimage."_Thumb.jpg";
        $path2 = $pathimage."_Original.jpg";
        if(File::exists($path)){
            File::delete($path);
            File::delete($path2);
        }


    }

    public static function DeleteFile($path){
        if(File::exists($path)){
            File::delete($path);
        }
    }



    public static function UploadImage($file,$width,$height,$name,$type,$mainfolder,$folder){


            $image_thumb = Image::make($file);
            $image_thumb->fit($width,$height);
            $image_thumb_name = $name."_Thumb".$type;
            $image_thumb->save("Media/".$mainfolder."/".$folder."/".$image_thumb_name);
            $image_original = Image::make($file);
            $image_original_name = $name."_Original".$type;
            $image_original->save("Media/".$mainfolder."/".$folder."/".$image_original_name);
            return "Success";

    }
    public static function UploadImagereturnData($file,$width,$height,$name,$type,$mainfolder,$folder){

        $image_thumb_socail = Image::make($file);
        $image_thumb_socail->fit(round($width/2),round($height/2));
        $image_thumb_socail_name = $name."_Socail".$type;
        $image_thumb_socail->save("Media/".$mainfolder."/".$folder."/".$image_thumb_socail_name);

        $image_thumb = Image::make($file);
        $image_thumb->fit($width,$height);
        $image_thumb_name = $name."_Thumb".$type;
        $image_thumb->save("Media/".$mainfolder."/".$folder."/".$image_thumb_name);

        $image_original = Image::make($file);
        $image_original_name = $name."_Original".$type;
        $image_original->save("Media/".$mainfolder."/".$folder."/".$image_original_name);

        return "/Media/".$mainfolder."/".$folder."/".$name;

    }

    public static function UploadVideo($file,$path,$name,$type){
        $pathupload = $path."/".$name.$type;
        //$file->
        //Storage::copy($file,$pathupload);
        //return $pathupload;

    }


    public static function UploadImageEvent($file,$width,$height,$name,$type,$mainfolder,$folder,$width2,$height2){

        $image_thumb = Image::make($file);
        $image_thumb->fit($width,$height);
        $image_thumb_name = $name."_Thumb".$type;
        $image_thumb->save("Picture/".$mainfolder."/".$folder."/".$image_thumb_name);


        $image_thumb = Image::make($file);
        $image_thumb->fit($width2,$height2);
        $image_thumb_name = $name."_Thumbs".$type;
        $image_thumb->save("Picture/".$mainfolder."/".$folder."/".$image_thumb_name);


        $image_original = Image::make($file);
        $image_original_name = $name."_Original".$type;
        $image_original->save("Picture/".$mainfolder."/".$folder."/".$image_original_name);
        return "Success";

    }
    public static function DelFolder($path){

        if(File::isDirectory($path)){
            File::deleteDirectory($path);
        }else{
            echo $path."Not-Have";
        }


    }
    public static function Delete(\Illuminate\Http\Request $request){
        $Type = $request->del_type;
        $code = $request->code;
        $folder = $request->folder;

        switch ($Type){
            case "Card":
                $Path = "Media/Card/".$folder;

                Query::DeleteData("print_card","card_code","$code");
                Query::DeleteData("print_gallery","gal_code_content","$code");
                self::DelFolder($Path);
                echo 1;
                break;
            case "Group":

                $data = Query::selectDataCon("honda_activity_group","group_code","$code","=");

                foreach ($data as $result){
                    $code_g = $result->group_code;

                    $data_ac = Query::selectDataCon("honda_activity","activity_code_group","$code_g","=");

                    foreach ($data_ac as $result_activity){
                        $code_activity = $result_activity->activity_code;
                        $folder = $result_activity->activity_folder;

                        Query::DeleteData("honda_activity","activity_code","$code_activity");
                        Query::DeleteData("honda_gallery","gal_code_content","$code_activity");
                        Query::DeleteData("honda_video","video_code_content","$code_activity");
                        Query::DeleteData("honda_document","doc_code_content","$code_activity");
                        $Path = "Media/Activity/".$folder;
                        self::DelFolder($Path);


                    }


                }
                Query::DeleteData("honda_activity_group","group_code","$code");
                echo 1;
                break;

        }


    }


}
