<?php
require_once 'class.connect.php';
require_once 'class.config.php';
require_once 'class.query.php';
require_once 'class.defind.php';


$connect = new ConnectMysql();
$connect->connect($host, $user, $pass,$database);

class langeuage {

    var $defind_get  = "";
    var	$host= "";
    var	$user= "";
    var	$pass= "";
    var	$database= "";


    public function __construct(){
        $defind = new defind();
        $this->defind_get = $defind->set_defind();
        $this->host = $this->defind_get["Host"];
        $this->user = $this->defind_get["User"];
        $this->pass = $this->defind_get["Pass"];
        $this->database = $this->defind_get["DBname"];
    }


    public function set_language_menu(){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);

      $config = new config();
     $url = $config->url_get();
      //echo $url[0] ;
      mysqli_query($connect->database_connect,"SET NAMES UTF8");
      if($url[0] != ""){
      $sql=mysqli_query($connect->database_connect,"SELECT * FROM pra_language l JOIN pra_menu pm ON pm.menu_lang_id = l.lang_id WHERE l.lang_en = '$url[0]'  ")or die(mysqli_error());
      }else{
      $sql=mysqli_query($connect->database_connect,"SELECT * FROM pra_language l JOIN pra_menu pm ON pm.menu_lang_id = l.lang_id WHERE l.lang_en = 'th'  ")or die(mysqli_error());
                header('Location:'.$config->url_main().'th/หน้าหลัก');
      }
      $result = array();
		while ($record = mysqli_fetch_array($sql)) {
			 $result[] = $record;
		}
		return $result;
    }
    
    
}
//put your code here

