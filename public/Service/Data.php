<?php

require_once "library/class.query.php";
require_once "library/class.utility.php";
require_once "library/class.upload_image.php";



$Query = new Query();
$Utility = new utility();
$url_main = $Query->url;
$Upload = new uploadimage();

$data = $Query->select_data("non_place_sub");

foreach ($data as $result){
    $code = $result["places_code"];
    $code_asset = $Utility->generate_code(5);
    $input = array("places_cover_asset");
    $value = array("'$code_asset'");
    $Query->update_data("non_place_sub",$input,$value,"places_code","'$code'");
    echo 1;
}