<?php

    class manageurl {
        
         public function url_get(){
            $url = isset($_GET["url"]) ? $_GET["url"]:NULL;    
            $url = rtrim($url,"/");
            $url = explode("/",$url);
           // print_r($url); 
            return $url;
        }
        
    }


?>
