<?PHP   error_reporting( error_reporting() & ~E_NOTICE );

global $mainfolder;
global  $folder;

$host='localhost';
$user='root';
$pass='';
$database='non';
//$url = "http://localhost/banbua/";
//$url_main = "http://localhost/banbua/";
$url = "http://localhost/Banbua/";
$url_main = "http://localhost/Banbua/";


        class config{




            public function url() {
                $url = "http://localhost/banbua/";
                return $url;
            }

            public function url_main() {
                $url = "http://localhost/banbua/";
                return $url;
            }

            public function url_set() {
                $url = "http://localhost/banbua/";
                //return $url;
            }


            public function url_get(){
                $url = isset($_GET["url"]) ? $_GET["url"]:NULL;
                $url = rtrim($url,"/");
                $url = explode("/",$url);
                // print_r($url);
                return $url;
            }

            public function url_get_curent(){
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $url = rtrim($actual_link,"/");
                $url = explode("/",$url);
                //$url[2] = "Lao";
                // print_r($url);
                //echo $url;
                return $url;
            }

            public function change_lan($lang){
                $url = rtrim($_SERVER['HTTP_HOST'].$_SERVER[REQUEST_URI],"/");
                $url = explode("/",$url);
                $url[1] = $lang;
                //print_r($url);
                $url = implode("/",$url);
                //echo $url;
                return "http://".$url;
            }

        }
?>
