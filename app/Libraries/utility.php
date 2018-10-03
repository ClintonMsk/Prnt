<?php

namespace App\Libraries;
use Carbon\Carbon;
class utility{



        function generate_code($amount){
             $text = "";
             $md5 = md5('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
             $char = str_split($md5);
		foreach (array_rand($char,$amount) as $k) $text.= $char[$k];

                return $text;
        }
        
        
          function generate_password(){
             $text = "";
             $char = str_split('abcdefghijklmnopqrstuvwxyz'
                     .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789');
		foreach (array_rand($char, 8) as $k) $text.= $char[$k];
                
                return $text;
        }

        function generate_text($amount){
            $text = "";
            $char = str_split('abcdefghijklmnopqrstuvwxyz'
                .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                .'0123456789');
            foreach (array_rand($char, $amount) as $k) $text.= $char[$k];

            return $text;
        }
        
        
          public function url_get(){
            $url = isset($_GET["url"]) ? $_GET["url"]:NULL;    
            $url = rtrim($url,"/");
            $url = explode("/",$url);
           // print_r($url); 
            return $url;
        }

        function cal_date($date){
            $new_date = explode("-",$date);
            return $new_date;
        }

        function shot_date ($month){

            if($month == "มกราคม"){
                $month="ม.ค.";
            }if($month == "กุมภาพันธ์"){
                $month="ก.พ.";
            }if($month == "มีนาคม"){
                $month="มี.ค.";
            }if($month == "เม.ย."){
                $month="เมษายน";
            }if($month == "พฤษภาคม"){
                $month="พ.ค.";
            }if($month == "มิถุนายน"){
                $month="มิ.ย.";
            }if($month == "กรกฎาคม"){
                $month="ก.ค.";
            }if($month == "สิงหาคม"){
                $month="ส.ค.";
            }if($month == "กันยายน"){
                $month="ก.ย.";
            }if($month == "ตุลาคม"){
                $month="ต.ค";
            }if($month == "พฤศจิกายน"){
                $month="พ.ย.";
            }if($month == "ธันวาคม"){
                $month="ธ.ค.";
            }
            echo $month;

        }

   /* monthNamesShort: ['January','February','March','April','May','June','July','August','September','October','November','December'], */




    function convert_months ($month){


        if($month == "01"){
            $month="ม.ค.";
        }if($month == "02"){
            $month="ก.พ.";
        }if($month == "03"){
            $month="มี.ค.";
        }if($month == "04"){
            $month="เม.ย.";
        }if($month == "05"){
            $month="พ.ค.";
        }if($month == "06"){
            $month="มิ.ย.";
        }if($month == "07"){
            $month="ก.ค.";
        }if($month == "08"){
            $month="ส.ค.";
        }if($month == "09"){
            $month="ก.ย.";
        }if($month == "10"){
            $month="ต.ค";
        }if($month == "11"){
            $month="พ.ย.";
        }if($month == "12"){
            $month="ธ.ค.";
        }
        return $month;

    }

        function convert_month ($month){


            switch ($month){
                    case "01":
                        $month="มกราคม";
                        break;
                    case "02":
                        $month="กุมภาพันธ์";
                        break;
                    case "03":
                        $month="มีนาคม";
                        break;
                    case "04":
                        $month="เมษายน";
                        break;
                    case "05":
                        $month="พฤษภาคม";
                        break;
                    case "06":
                        $month="มิถุนายน";
                        break;
                    case "07":
                        $month="กรกฎาคม";
                        break;
                    case "08":
                        $month="สิงหาคม";
                        break;
                    case "09":
                        $month="กันยายน";
                        break;
                    case "10":
                        $month="ตุลาคม";
                        break;
                    case "11":
                        $month="พฤศจิการยน";
                        break;
                    case "12":
                        $month="ธันวาคม";
                        break;
                    default:
                        $month = "Not-Found".$month;
                        break;
                }



            return $month;

        }




    function convert_th_mount ($month){


        switch ($month){
            case "มกราคม":
                $month="01";
                break;
            case "กุมภาพันธ์":
                $month="02";
                break;
            case "มีนาคม":
                $month="03";
                break;
            case "เมษายน":
                $month="04";
                break;
            case "พฤษภาคม":
                $month="05";
                break;
            case "มิถุนายน":
                $month="06";
                break;
            case "กรกฎาคม":
                $month="07";
                break;
            case "สิงหาคม":
                $month="08";
                break;
            case "กันยายน":
                $month="09";
                break;
            case "ตุลาคม":
                $month="10";
                break;
            case "พฤศจิกายน":
                $month="11";
                break;
            case "ธันวาคม":
                $month="12";
                break;
            default:
                $month = "Not-Found".$month;
                break;
        }



        return $month;

    }



        function convert_month_eng ($month){

            if($month == "01"){
                $month="January";
            }if($month == "02"){
                $month="February";
            }if($month == "03"){
                $month="March";
            }if($month == "04"){
                $month="April";
            }if($month == "05"){
                $month="May";
            }if($month == "06"){
                $month="June";
            }if($month == "07"){
                $month="July";
            }if($month == "08"){
                $month="August";
            }if($month == "09"){
                $month="September";
            }if($month == "10"){
                $month="October";
            }if($month == "11"){
                $month="November";
            }if($month == "12"){
                $month="December";
            }

            return $month;

        }




        function del_file($directory,$filename){

            $file = $directory."/".$filename;
            //echo $file;
            if(file_exists($file)){
                unlink($file);
            }else{

            }
        }






        function SetTextMain($lang,$menu,$label){
            
                            
                           if($GLOBALS["languages"][$lang][$menu][$label] != ""){
                               echo $GLOBALS["languages"][$lang][$menu][$label];
                           }else{
                               echo "<font color='red' >Not-Found</font>";
                           }
            
            
                    }

     function remove_all($main_dir) {
            if ($handle = opendir($main_dir)) {
                while (false !== ($entry = readdir($handle))) {
                    $absolute_path = $main_dir.'/'.$entry;
                    if ($entry != "." && $entry != "..") {
                        chmod($absolute_path, 0755);
                        unlink($absolute_path);

                        //check if any folders exist, then delete files within
                        if (file_exists($absolute_path) && is_dir($absolute_path)) {
                            if ($child_handle = opendir($absolute_path)) {
                                while (false !== ($child_entry = readdir($child_handle))) {
                                    $child_absolute_path = $absolute_path.'/'.$child_entry;
                                    if ($child_entry != "." && $child_entry != "..") {
                                        unlink($child_absolute_path);
                                    }
                                }
                                closedir($child_handle);
                            }
                        }
                        rmdir($absolute_path);
                    }
                }
                closedir($handle);
            }
            rmdir($main_dir);
        }



    function Limittext($result,$lenght){
        $length = strlen($result)+1;
        $length = $length; ;
        if($length > $lenght){
            return iconv_substr($result, 0,$lenght,"UTF-8")."....";
        }else{
            return $result;
        }

    }



    function DateConvert($date){
        $datenew = date('Y-m-d H:i:s', strtotime($date. ' -1 hour , -420 minute '));
        //echo $datenew;
        $date_con = Carbon::createFromFormat("Y-m-d H:i:s",$datenew)->toDateTimeString();
        //echo $date_con;
        $date = Carbon::parse($date_con);
        //echo $date;
        $en = array("seconds","second","minutes","minute","from now", "ago","hours","hour","seconds","days","day","month","weeks","week","year");
        $th   = array("วินาที","วินาที","นาที","นาที","ที่ผ่านมา","ที่ผ่านมา","ชั่วโมง","ชั่วโมง","วินาที","วัน","วัน","เดือน","สัปดาห์","สัปดาห์","ปี");
        $datediff = $date->diffForHumans();
        // echo $date;
        return  str_replace($en, $th, $datediff);
        //return $datediff;

    }


    function DetailDatetime($date){
       $Date = Carbon::createFromFormat("Y-m-d H:i:s",$date)->toDateTimeString();
        $datecon = Carbon::parse($Date);
        $date_array = explode(" ",$datecon);
        $dateconvert = explode("-",$date_array[0]);
        $month = $dateconvert[1];

        $month_thai = $this->convert_month($month);

        return $dateconvert[2]." ".$month_thai." ".($dateconvert[0]+543)." ".$date_array[1];
    }



    function DateTHSub($date){
        $dateconvert = explode("-",$date);
        $month = $dateconvert[1];
        $month_thai = $this->convert_months($month);

        return $dateconvert[2]." ".$month_thai." ".($dateconvert[0]+543);
    }





    /**
     * Returns an encrypted & utf8-encoded
     */
    function encrypt($pure_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }

    /**
     * Returns decrypted original string
     */
    function decrypt($encrypted_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
        return $decrypted_string;
    }







    }
?>