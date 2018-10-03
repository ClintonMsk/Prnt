<?php

    

    require_once "library/class.query.php";
    require_once "library/class.utility.php";
    require_once "library/class.upload_image.php";


    if ($_SERVER["PHP_AUTH_USER"] !== 'nontaburi' && $_SERVER["PHP_AUTH_PW"] !== 'nontaburi2018') {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        echo "Error";
        exit;
    }





    $Query = new Query();
    $Utility = new utility();
    $url_main = $Query->url;
    $Upload = new uploadimage();

    $breaks_newline = array("<br />","<br>","<br/>");
    $breaks_newline_p = array("<p>","</p>","<span>","</span>");
    $breaks_space = array("&nbsp;","&rdquo;","&rdquo;","&ndash;","&ldquo;","&quot;","&#39;");

    function ViewData($title,$img){
    $html = "";
    $html .='<b>'.$title.'</b><br>';
    $html .='<img src="'.$img.'" width="50" />';
    return $html."<hr>";
}


    if(isset($_POST["editmember"])){


    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $code = $_POST["codemember"];
    $code_image = $_POST["image"];

    $mainfolder = "Member";
    $path = "../Picture/".$mainfolder."/";

    if(!is_dir("../Picture/".$mainfolder)){
        mkdir("../Picture/".$mainfolder,0777, true);
        //echo "No_Folder";
    }


        if($_FILES["image_file"]["tmp_name"]){
            $Upload->image_upload_original($_FILES["image_file"]["tmp_name"],$path,"$code_image",1);
            $Upload->upload_thumb($_FILES["image_file"]["tmp_name"],$path,"$code_image",500,500,100,false);
        }




        $input = array("member_fullname","member_email","member_password","member_image");
        $value = array("'$name'","'$email'","'$password'","'$code_image'");
        $Query->update_data("non_member",$input,$value,"member_code","'$code'");
        echo 1;
}

    if(isset($_POST["register"])){


       $uid = $_POST["u_id"];
       $email = $_POST["email"];
       $password = $_POST["password"];
       $name = $_POST["name"];
       $type = $_POST["type"];
       $code = $Utility->generate_code(10);
       $code_image = $Utility->generate_code(10);

       $mainfolder = "Member";
       $path = "../Picture/".$mainfolder."/";

        if(!is_dir("../Picture/".$mainfolder)){
            mkdir("../Picture/".$mainfolder,0777, true);
            //echo "No_Folder";
        }

        $data_check = $Query->select_data_con("non_member","member_email","$email");

       if(count($data_check) == 1){
           echo "0";
       }else{
           if($_FILES["image_file"]["tmp_name"]){
               $Upload->image_upload_original($_FILES["image_file"]["tmp_name"],$path,"$code_image",1);
               $Upload->upload_thumb($_FILES["image_file"]["tmp_name"],$path,"$code_image",500,500,100,false);
           }

           if($_POST["image_url"]){
               $Upload->image_upload_original($_POST["image_url"],$path,"$code_image",1);
               $Upload->upload_thumb($_POST["image_url"],$path,"$code_image",500,500,100,false);
           }




           $input = array("member_code","member_u_id","member_fullname","member_email","member_type","member_password","member_image","member_dateadd");
           $value = array("'$code'","'$uid'","'$name'","'$email'","'$type'","'$password'","'$code_image'","NOW()");
           $Query->insertarray("non_member",$input,$value);
       }
        echo 1;
    }

    if(isset($_POST["comment"])){




        $member_code = $_POST["member_code"];
        $content_code = $_POST["content_code"];
        $detail = $_POST["detail"];
        $code = $Utility->generate_code(10);
        $code_image = $Utility->generate_code(10);

        $mainfolder = "Comment";
        $path = "../Picture/".$mainfolder."/";

        if(!is_dir("../Picture/".$mainfolder)){
            mkdir("../Picture/".$mainfolder,0777, true);
            //echo "No_Folder";
        }


        if($_FILES["image_file"]["tmp_name"]){
            $Upload->image_upload_original($_FILES["image_file"]["tmp_name"],$path,"$code_image",1);
            $Upload->upload_thumb($_FILES["image_file"]["tmp_name"],$path,"$code_image",500,500,100,false);
        }

        $input = array("comment_code","comment_code_content","comment_code_member","comment_detail","comment_image","comment_dateadd");
        $value = array("'$code'","'$content_code'","'$member_code'","'$detail'","'$code_image'","NOW()");
        $Query->insertarray("non_comment",$input,$value);
        echo 1;
    }

    if(isset($_POST["visit"])){



        $code = $_POST["code_content"];
        $input = array("visit_code_content","visit_dateadd");
        $value = array("'$code'","NOW()");
        $Query->insertarray("non_visit",$input,$value);
        echo 1;
    }

    if(isset($_POST["getPlace"])){

        $category = $_POST["category"];
        $mainFolder = "Place";
        $page = $_POST["pagenumber"];
        $sortby = $_POST["sortby"];
        $orderby = $_POST["orderby"];
        $limit = $_POST["limit"];
        $lang = $_POST["lang"];
        $keyword = $_POST["keyword"];

        if($category == ""){
            $category = "001,002,003,004,005";
        }



        $data = $Query->CustomQuery("SELECT * FROM non_place JOIN non_place_sub ON non_place_sub.places_p_code = non_place.place_code   WHERE non_place_sub.places_category IN ($category) AND (place_title LIKE '%$keyword%' OR place_detail LIKE '%$keyword%' ) AND place_lang_id = 1  ORDER BY 'place_dateadd' , 'DESC' ");

        $countdata = count($data);
        $totall_page = ceil($countdata / $limit);
        //echo $totall_page."<br>";

        if($totall_page >= $page ) {
            $pagenew = $page-1;
            $start = ($pagenew*$limit);

            //echo  $pagenew."_".$start."_".$end."<br>";

            $data = $Query->CustomQuery("SELECT * FROM non_place JOIN non_place_sub ON non_place_sub.places_p_code = non_place.place_code  WHERE non_place_sub.places_category IN ($category) AND ( place_title LIKE '%$keyword%' OR place_detail LIKE '%$keyword%' ) AND place_lang_id = 1 ORDER BY 'place_dateadd' , 'DESC' LIMIT  $start,$limit   ");

            foreach ($data as $result){
                $code = $result["place_code"];

                $detail = $result["place_detail"];

                $detail_newline_p = str_ireplace($breaks_newline_p, "", $detail);
                $detail_newline = str_ireplace($breaks_newline, "\n", $detail_newline_p);
                $detail_space = str_ireplace($breaks_space, " ", $detail_newline);


                $addess = $result["place_address"];
                $addess_newline_p = str_ireplace($breaks_newline_p, "", $addess);
                $addess_newline = str_ireplace($breaks_newline, "\n", $addess_newline_p);
                $addess_space = str_ireplace($breaks_space, " ", $addess_newline);


                $data_g = $Query->select_data_con("non_gallery","gal_code_content	","$code");
                $data_sub = $Query->select_data_con("non_place_sub","places_p_code","$code");


                //echo count($data_sub);
                foreach ($data_sub as $result_s) {
                    $cat_code = $result_s["places_category"];
                    $data_cat = $Query->select_data_con_and("non_place_cat", "cat_code", "$cat_code", "cat_lang_id	", "$lang");
                    $folder = $result_s["places_folder"];

                    foreach ($data_g as $result_g ){

                        $galdata [] = array("Thumb"=>$url_main."Picture/".$mainFolder."/".$folder."/Gallery/".$result_g["gal_name"]."_Thumb.jpg",
                            "Original"=>$url_main."Picture/".$mainFolder."/".$folder."/Gallery/".$result_g["gal_name"]."_Original.jpg",);

                    }


                    if($result_s["places_asset"] == 1){
                        $asset_thumb = $url_main."Picture/".$mainFolder."/".$folder."/".$result_s["places_cover_asset"]."_Thumb.jpg";
                        $asset_origi = $url_main."Picture/".$mainFolder."/".$folder."/".$result_s["places_cover_asset"]."_Thumb.jpg";
                    }else{
                        $asset_thumb = "";
                        $asset_origi = "";
                    }

                    foreach ($data_cat as $result_cat) {
                        $place_array = array(
                            "place_code" => $result["place_code"],
                            "place_title" => $result["place_title"],
                            "place_detail" => strip_tags($detail_space),
                            "place_address" => strip_tags($addess_space),
                            "places_tel" => $result_s["places_tel"],
                            "places_line" => $result_s["places_line"],
                            "places_asset" => $result_s["places_asset"],
                            "places_asset_cover_thumb" => $asset_thumb,
                            "places_asset_cover_original" => $asset_origi,
                            "places_content_asset" => $result_s["places_content_asset"],
                            "places_facebook" => $result_s["places_facebook"],
                            "places_website" => $result_s["places_website"],
                            "places_folder" => $result_s["places_folder"],
                            "places_category" => $result_cat["cat_name"],
                            "places_category_code" => $result_cat["cat_code"],
                            "places_cover_thumb" => $url_main."Picture/".$mainFolder."/".$folder."/".$result_s["places_cover"]."_Thumb.jpg",
                            "places_cover_original" => $url_main."Picture/".$mainFolder."/".$folder."/".$result_s["places_cover"]."_Original.jpg",
                            "places_location_la" => $result_s["places_location_la"],
                            "places_location_long" => $result_s["places_location_long"],
                            "places_dateadd" => $result_s["places_dateadd"],
                            "places_gal"=>$galdata,
                        );

                      // echo ViewData($result["place_title"],$url_main."Picture/".$mainFolder."/".$folder."/".$result_s["places_cover"]."_Thumb.jpg");
                    }

                }

                $data_set[]=$place_array;
            }

            $datas =  array("ListPlace"=>$data_set);
            $dataj =  json_encode($datas);
            echo $dataj;
        }else{
           echo 0;
        }

    }

    if(isset($_POST["listcomment"])){
        $page = $_POST["pagenumber"];
        $code = $_POST["code"];
        $data_comment = array();
        $mainFolder = "Comment";
        $data_set = array();
        $datas = array();
        $limit = $_POST["limit"];



        $data = $Query->CustomQuery("SELECT * FROM non_comment WHERE  comment_code_content = '$code' ORDER BY 'comment_dateadd' , 'DESC'   ");

        $countdata = count($data);
        $totall_page = round($countdata / $limit);

        if($totall_page >= $page ) {
            $pagenew = $page-1;
            $start = ($pagenew*$limit);
            $data = $Query->CustomQuery("SELECT * FROM non_comment WHERE  comment_code_content = '$code' ORDER BY 'comment_dateadd' , 'DESC' LIMIT  $start,$limit  ");

            foreach ($data as $result){
                $memcode = $result["comment_code_member"];
                $member = $Query->CustomQuery("SELECT * FROM non_member WHERE member_code = '$memcode' ");

                foreach ($member as $resultmem){
                    $profile_image = $url_main."Picture/Member/".$resultmem["member_image"]."_Thumb.jpg";
                    $profile_name = $resultmem["member_fullname"];
                }

                $data_comment = array(
                  "code"=>$result["comment_code"],
                  "detail"=>$result["comment_detail"],
                  "image"=>$url_main."Picture/".$mainFolder."/".$result["comment_image"]."_Thumb.jpg",
                  "profile_image"=>$profile_image,
                  "profile_name"=>$profile_name,
                );
                $data_set[]=$data_comment;
            }

            $datas =  array("ListComment"=>$data_set);
            $dataj =  json_encode($datas);
            echo $dataj;


        }else{

        }



    }

    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $datas = array();

       $data = $Query->CustomQuery("SELECT * FROM non_member WHERE member_email = '$email' AND member_password = '$password' ");

       foreach ($data as $result){
           $code = $result["member_code"];
           $name = $result["member_fullname"];
           $password = $result["member_password"];
           $image = $url_main."Picture/Member/".$result["member_image"]."_Thumb.jpg";
           $datas = array(
               "code"=>$code,
               "name"=>$name,
               "password"=>$password,
               "image"=>$image,
               "imagecode"=>$result["member_image"],
           );
           $dataj[] = $datas;
           $datalist = array("UserProfile"=>$datas);
           $dataj =  json_encode($datalist);
           echo $dataj;
       }



    }


