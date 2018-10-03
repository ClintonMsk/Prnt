<?php
    class utility{
        
        function generate_code(){
             $text = "";
             $char = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		foreach (array_rand($char, 5) as $k) $text.= $char[$k];
                
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

        function convert_month ($month){

            if($month == "January"){
                $month="01";
            }if($month == "February"){
                $month="02";
            }if($month == "March"){
                $month="03";
            }if($month == "April"){
                $month="04";
            }if($month == "May"){
                $month="05";
            }if($month == "June"){
                $month="06";
            }if($month == "July"){
                $month="07";
            }if($month == "August"){
                $month="08";
            }if($month == "September"){
                $month="09";
            }if($month == "October"){
                $month="10";
            }if($month == "November"){
                $month="11";
            }if($month == "December"){
                $month="12";
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


        function setMenu($input,$value){
            if($value == ""){
                $value = 0;
            }else{
                $value--;
            }

            echo $input[$value];
        }








      /*  function remove_all($dir) {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (filetype($dir."/".$object) == "dir")
                            remove($dir."/".$object);
                        else unlink   ($dir."/".$object);
                    }
                }
                reset($objects);
                rmdir($dir);
                return 1;
            }


        }*/



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
                rmdir($main_dir);
            }else{

            }

        }



        function decode_login($input){
            return md5("clinton".md5("encode".(md5("admin".$input))));
        }









       /* function remove_all($dirname) {
            if (is_dir($dirname))
                $dir_handle = opendir($dirname);
            if (!$dir_handle)
                return false;
            while($file = readdir($dir_handle)) {
                if ($file != "." && $file != "..") {
                    if (!is_dir($dirname."/".$file))
                        unlink($dirname."/".$file);
                    else
                        remove_all($dirname.'/'.$file);
                }
            }
            closedir($dir_handle);
            rmdir($dirname);
            return true;
        }*/













    }
?>