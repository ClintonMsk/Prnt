<?php
    require_once "library/class.query.php";

    if ($_SERVER["PHP_AUTH_USER"] !== 'nontaburi' && $_SERVER["PHP_AUTH_PW"] !== 'nontaburi2018') {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        echo "Error";
        exit;
    }

    $Query = new Query();
    $url_main = "http://localhost:8000/";

    $breaks_newline = array("<br />","<br>","<br/>");
    $breaks_newline_p = array("<p>","</p>","<span>","</span>");
    $breaks_space = array("&nbsp;","&rdquo;","&rdquo;","&ndash;","&ldquo;","&quot;","&#39;");

    if(isset($_POST["getPlacce"])){
        $lang = $_POST["lang"];
        $mainFolder = "Place";
       $data = $Query->select_data_con("non_place","place_lang_id","$lang");
        $place_array = array();
        $datas = array();
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



        foreach ($data_sub as $result_s) {
            $cat_code = $result_s["places_category"];
            $data_cat = $Query->select_data_con_and("non_place_cat", "cat_code", "$cat_code", "cat_lang_id	", "$lang");
            $folder = $result_s["places_folder"];

          foreach ($data_g as $result_g ){

                $galdata [] = array("Thumb"=>$url_main."Picture/".$mainFolder."/".$folder."/Gallery/".$result_g["gal_image_name"]."_Thumb.jpg",
                    "Original"=>$url_main."Picture/".$mainFolder."/".$folder."/Gallery/".$result_g["gal_image_name"]."_Original.jpg",);

            }

            foreach ($data_cat as $result_cat) {
                $place_array = array(
                    "place_code" => $result["place_code"],
                    "place_title" => $result["place_title"],
                    "place_detail" => strip_tags($detail_space),
                    "place_address" => strip_tags($addess_space),
                    "places_tel" => $result_s["places_tel"],
                    "places_tel" => $result_s["places_tel"],
                    "places_line" => $result_s["places_line"],
                    "places_content_asset" => $result_s["places_content_asset"],
                    "places_facebook" => $result_s["places_facebook"],
                    "places_website" => $result_s["places_website"],
                    "places_folder" => $result_s["places_folder"],
                    "places_category" => $result_cat["cat_name"],
                    "places_cover" => $result_cat["places_cover"],
                    "places_location_la" => $result_cat["places_location_la"],
                    "places_location_long" => $result_cat["places_location_long"],
                    "places_dateadd" => $result_cat["places_dateadd"],
                    "places_gal"=>$galdata,
                );

            }

        }


    }

        $datas =  array("ListPlace"=>$place_array);
        $dataj =  json_encode($datas);
        echo $dataj;
    }








