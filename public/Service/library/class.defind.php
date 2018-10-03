<?php
     class defind{

   var  $host_set='127.0.0.1';
    var  $user_set='root';
    var	$pass_set='';
    var	$database_set='Non';
    var $setUrl = 'http://localhost:8000/';


      /*   var  $host_set='localhost';
         var  $user_set='banbua';
         var	$pass_set='zq!Pu945';
         var	$database_set='banbua';*/

    function set_host(){
        return $this->host_set;
    }

    function set_user(){
        return $this->host_set;
    }

    function set_pass(){
        return $this->host_set;
    }

    function set_dbname(){
        return $this->host_set;
    }

    function set_url(){
        return $this->setUrl;
    }


    function set_defind(){
        $defind_array = array();
        $defind_array = array("Host"=>$this->host_set,"User"=>$this->user_set,"Pass"=>$this->pass_set,"DBname"=>$this->database_set,"URL"=>$this->setUrl);
        return $defind_array;
    }


}