<?PHP

	require_once 'class.connect.php';
	require_once 'class.config.php';
	require_once 'class.defind.php';


class Query  {



    var $defind_get  = "";
    var	$host= "";
    var	$user= "";
    var	$pass= "";
    var	$database= "";
    var $url = "";


    public function __construct(){
        $defind = new defind();
        $this->defind_get = $defind->set_defind();
        $this->host = $this->defind_get["Host"];
        $this->user = $this->defind_get["User"];
        $this->pass = $this->defind_get["Pass"];
        $this->database = $this->defind_get["DBname"];
        $this->url = $this->defind_get["URL"];
    }


    function CustomQuery($sql){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        echo $sql;
        //exit();
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        $query=mysqli_query($connect->database_connect,$sql)or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }



    function select_data($set_table_name){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name)or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;
		}

	function select_data_group_by($set_table_name,$field){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		//echo "SELECT * FROM ".$set_table_name." GROUP BY ".$field."ORDER BY ".$field." ASC"  ;
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." GROUP BY ".$field." ORDER BY ".$field." ASC"  )or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			$result[] = $record;
		}
		return $result;
	}







    function select_data_group_by_cout($set_table_name,$field){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT *  FROM ".$set_table_name." GROUP BY ".$field;
        $query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." GROUP BY ".$field)or die(mysqli_error());
        $count = mysqli_num_rows($query);
        return $count;
    }


    function select_data_and_group_by($set_table_name,$field1,$value1,$field){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT * FROM ".$set_table_name." GROUP BY ".$field;
        $query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$field1."=".$value1." GROUP BY ".$field)or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }



	function select_data_distic($set_table_name,$filed){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        $query=mysqli_query($connect->database_connect,"SELECT DISTINCT  ".$filed." FROM ".$set_table_name)or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }
    
    
    	function select_data_orderby($set_table_name,$fild,$value){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." ORDER BY ".$fild."  ".$value."  ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			$result[] = $record;
		}
		return $result;
	}
    
    
    function select_data_con_search_multi($set_table_name,$filed,$value,$field1,$field2,$search){
        $connect = new ConnectMysql();
        $search = "'%".$search."%'";
        //echo "SELECT * FROM ".$set_table_name." WHERE ".$field1." LIKE ".$search." OR ".$field2." LIKE ".$search." AND ".$filed." = ".$value;
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        $query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$field1." LIKE ".$search." OR ".$field2." LIKE ".$search." AND ".$filed." = ".$value)or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }

        
        function check_code($code){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");

		$query=mysqli_query($connect->database_connect,"SELECT * FROM loan_user WHERE user_code = $code ")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		return $count;
        }        
                
        function select_data_cont_count($set_table_name,$id_filed,$id){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE $id_filed=$id")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		return $count;
		}




	function select_data_cont_count_and($set_table_name,$id_filed,$id,$id_filed2,$id2){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		//echo "SELECT * FROM ".$set_table_name." WHERE $id_filed=$id AND $id_filed2=$id2   ";
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE $id_filed=$id AND $id_filed2=$id2   ")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		return $count;
	}




	function select_user(){
			$connect = new ConnectMysql();
			$connect->connect($this->host,$this->user,$this->pass,$this->database);
			mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM loan_user  lo "
                        . "JOIN loan_type lt ON lt.type_id = lo.user_type ")or die(mysqli_error()); 
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;
        }


		function select_user_con($code){
			$connect = new ConnectMysql();
			$connect->connect($this->host,$this->user,$this->pass,$this->database);
			mysqli_query($connect->database_connect,"SET NAMES UTF8");
			$query=mysqli_query($connect->database_connect,"SELECT * FROM loan_user  lo 
				JOIN loan_type lt ON lt.type_id = lo.user_type 
				WHERE user_code = ".$code."  ")or die(mysqli_error());
			$result = array();
			while ($record = mysqli_fetch_array($query)) {
				$result[] = $record;
			}
			return $result;
		}



		function select_employee(){
			$connect = new ConnectMysql();
			$connect->connect($this->host,$this->user,$this->pass,$this->database);
			mysqli_query($connect->database_connect,"SET NAMES UTF8");
			$query=mysqli_query($connect->database_connect,"SELECT * FROM  loan_employee_user  emp 
				JOIN loan_employee_type empt ON empt.emp_type_id = emp.emp_type
			    JOIN loan_type lt ON lt.type_id = emp.emp_user_type ")or die(mysqli_error());
			$result = array();
			while ($record = mysqli_fetch_array($query)) {
				$result[] = $record;
			}
			return $result;
		}
                
                
         function select_employee_type($value){
			 $connect = new ConnectMysql();
			 $connect->connect($this->host,$this->user,$this->pass,$this->database);
			 mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM employee cs "
                        . "JOIN employee_type ct ON cs.employee_type = ct.type_id "
                        . "JOIN employee_prefix cp ON cs.employee_prefix = cp.prefix_eng "
                        . "WHERE cs.employee_type = $value  ")or die(mysqli_error()); 
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;
		}


	function select_employee_con($type_filed,$input){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM  loan_employee_user  emp 
				JOIN loan_employee_type empt ON empt.emp_type_id = emp.emp_type
			    JOIN loan_type lt ON lt.type_id = emp.emp_user_type 
			    WHERE ".$type_filed." = $input ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			$result[] = $record;
		}
		return $result;
	}

	function select_permise_list($input){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM loan_permise lp
							JOIN loan_data ld ON ld.data_code = lp.permise_lone_code
							WHERE permise_lone_code = ".$input." ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			$result[] = $record;
		}
		return $result;
	}
		
	function select_data_con($set_table_name,$filed,$value){
		$connect = new ConnectMysql();
		//echo "SELECT * FROM ".$set_table_name." WHERE ".$filed."=".$value." ";
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query = mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$filed."='".$value."' ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;
		}



    function select_data_con_order_by($set_table_name,$filed,$value,$oder,$by){
        $connect = new ConnectMysql();
        //echo "SELECT * FROM ".$set_table_name." WHERE ".$filed."='".$value."' ORDER BY $oder  $by";
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        $query = mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$filed."='".$value."' ORDER BY  $oder  $by")or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }



    function select_data_con_limit($set_table_name,$filed,$value,$limit){
        $connect = new ConnectMysql();
        //echo "SELECT * FROM ".$set_table_name." WHERE ".$filed."=".$value."limit ".$limit;
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        $query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$filed."=".$value."limit ".$limit)or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }


	function select_data_con_and($set_table_name,$filed1,$value1,$filed2,$value2){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		//echo "SELECT * FROM ".$set_table_name." WHERE ".$filed1."=".$value1." AND ".$filed2."=".$value2."  ";
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$filed1."=".$value1." AND ".$filed2."=".$value2."  ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			$result[] = $record;
		}
		return $result;
	}




    function select_data_con_and_pagi($set_table_name,$filed1,$value1,$number1,$number2){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT * FROM ".$set_table_name." WHERE ".$filed1."=".$value1." AND ".$filed2."=".$value2."  ";
        $query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$filed1."=".$value1."  LIMIT $number1 , $number2  ")or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }



	function select_data_limit($set_table_name,$Start,$End){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,'SELECT * FROM '.$set_table_name.' LIMIT '.$Start.','.$End.' ')or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;

	}
	
	function select_data_limit_data_like_type($set_table_name,$thai_name,$eng_name,$search,$Start,$End){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$thai_name." LIKE  '%$search%' OR ".$eng_name." LIKE  '%$search%'  LIMIT ".$Start.",".$End." ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;

	}
	


	function select_data_like($set_table_name,$likefield,$value){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$likefield." LIKE  '%$value%'  ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;
		}
		
	function select_data_like_form($set_table_name,$likefield,$likefieldeng,$value){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$likefield." LIKE  '%$value%' OR ".$likefieldeng." LIKE  '%$value%'  ")or die(mysqli_error());
		$result = array();
		while ($record = mysqli_fetch_array($query)) {
			 $result[] = $record;
		}
		return $result;
		}
		
	function select_data_like_count($set_table_name,$likefield,$value){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$query=mysqli_query($connect->database_connect,"SELECT * FROM ".$set_table_name." WHERE ".$likefield." LIKE  '%$value%'  ")or die(mysqli_error());
		$result = mysqli_num_rows($query);
		return $result;
		}
	
	function insertarray ($nametable,$insert_input,$insert_value){


		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");

			$input = implode(",",$insert_input);
			$value = implode(",",$insert_value);
			mysqli_query($connect->database_connect,"INSERT INTO $nametable ($input) VALUES ($value)")or die(mysqli_error());
			//echo "INSERT INTO $nametable ($input) VALUES ($value)";
			return mysqli_insert_id($connect->database_connect);

			}
			
	function insertarraynoname ( $nametable,$insert_value){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
			$value = implode(",",$insert_value);
			mysqli_query($connect->database_connect,"INSERT INTO $nametable   VALUES ($value)" )or die(mysqli_error());
			
		}
			
			
	function delete($name_table,$id_attribute,$id_input){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
			mysqli_query($connect->database_connect,"DELETE FROM ".$name_table." WHERE  ".$id_attribute."=".$id_input." ")or die(mysqli_error());
			}
	

	
	function update_data ($nametable,$data,$value,$filed,$id){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$sql[]="UPDATE $nametable SET ";
		for($i = 0 ; sizeof($data) > $i ; $i++){
		$sql[]=$data[$i].'='.$value[$i];
		
		if($i==((sizeof($data)-1))){
		}else{
		$sql[]=',';	
		}
		} 
		$sql[]=" WHERE $filed=$id ";
		$show =  join($sql);
		//echo $show;
		mysqli_query($connect->database_connect,$show)or die(mysqli_error());
		
	
	}



	function update_data_con ($nametable,$data,$value,$filed,$id,$filed2,$id2){
		$connect = new ConnectMysql();
		$connect->connect($this->host,$this->user,$this->pass,$this->database);
		mysqli_query($connect->database_connect,"SET NAMES UTF8");
		$sql[]="UPDATE $nametable SET ";
		for($i = 0 ; sizeof($data) > $i ; $i++){
			$sql[]=$data[$i].'='.$value[$i];

			if($i==((sizeof($data)-1))){
			}else{
				$sql[]=',';
			}
		}
		$sql[]=" WHERE $filed=$id AND $filed2=$id2  ";
		$show =  join($sql);
		//echo $show;
		mysqli_query($connect->database_connect,$show)or die(mysqli_error());


	}
	
	
	function month_thai($month){
		
		if($month == 1){
		 $month="มกราคม";
		}if($month == 2){
		$month="กุมภาพันธ์";
		}if($month == 3){
		$month="มีนาคม";
		}if($month == 4){
		$month="เมษายน";
		}if($month == 5){
		$month="พฤษภาคม";
		}if($month == 6){
		$month="มิถุนายน";
		}if($month == 7){
		$month="กรกฎาคม";
		}if($month == 8){
		$month="สิงหาคม";
		}if($month == 9){
		$month="กันยายน";
		}if($month == 10){
		$month="ตุลาคม";
		}if($month == 11){
		$month="พฤศจิกายน";
		}if($month == 12){
		$month="ธันวาคม";
		}
		return $month;

		}
		
		function loginadmin($username,$password){
			$connect = new ConnectMysql();
			$connect->connect($this->host,$this->user,$this->pass,$this->database);
			mysqli_query($connect->database_connect,"SET NAMES UTF8");
			//echo "SELECT * FROM pra_admin WHERE admin_username='$username' AND admin_password='$password'   ";
		      $sql =mysqli_query($connect->database_connect,"SELECT * FROM pra_admin WHERE admin_username='$username' AND admin_password='$password'   ")or die(mysqli_error());
		       $count = mysqli_num_rows($sql);
			   if($count ==1){
				   while($row=mysqli_fetch_array($sql)){
				   $_SESSION['username'] = $row['admin_username'];
				   $_SESSION['password'] = $row['admin_password'];
				   echo "0";
				   }
			  }else{
				  echo "1";
				  }

	
	}
    
    
    	function login($username,$password){
			$connect = new ConnectMysql();
			$connect->connect($this->host,$this->user,$this->pass,$this->database);
			mysqli_query($connect->database_connect,"SET NAMES UTF8");

			$sql =mysqli_query($connect->database_connect,"SELECT * FROM menu_user WHERE user_email='$username' AND user_pass='$password'   ")or die(mysqli_error());
			$count = mysqli_num_rows($sql);
			$data = array();
			if($count ==1){
				while($row=mysqli_fetch_array($sql)){

					$data = array("user" => $row['user_email'],"pass"=>$row['user_pass'],"status"=>"1");

				}
			}else{

					$data = array("user" => "null","pass"=>"null","status"=>"0");


			}

			return $data;
		}


		function ListCategory($lang){
            $connect = new ConnectMysql();
            $connect->connect($this->host,$this->user,$this->pass,$this->database);
            mysqli_query($connect->database_connect,"SET NAMES UTF8");
            //echo "SELECT * FROM banbua_facility_name bf JOIN banbua_facility_name_id bfn ON bf.f_cat_name_id = bfn.f_cat_name_id_f WHERE bfn.f_cat_lang_id = '$lang'  ";
            $query =mysqli_query($connect->database_connect,"SELECT * FROM banbua_facility_name bf JOIN banbua_facility_name_id bfn ON bf.f_cat_id = bfn.f_cat_name_id_f WHERE bfn.f_cat_lang_id = '$lang'  ")or die(mysqli_error());
            $result = array();
            while ($record = mysqli_fetch_array($query)) {
                $result[] = $record;
            }
            return $result;
        }

    function ListCategoryCon($lang,$value){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT * FROM banbua_facility_name bf JOIN banbua_facility_name_id bfn ON bf.f_cat_id = bfn.f_cat_name_id_f WHERE  f_cat_id	IN($value) AND  bfn.f_cat_lang_id = '$lang'  ";
        $query =mysqli_query($connect->database_connect,"SELECT * FROM banbua_facility_name bf JOIN banbua_facility_name_id bfn ON bf.f_cat_id = bfn.f_cat_name_id_f WHERE  f_cat_id	IN($value) AND  bfn.f_cat_lang_id = '$lang'  ")or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }




    function ListCategoryplace($lang){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT * FROM banbua_pcat_name pn JOIN banbua_pcat_name_id pni ON pn.pcat_id = pni.pcat_name_id_cat WHERE bfn.pcat_lang_id = '$lang'  ";
        $query =mysqli_query($connect->database_connect,"SELECT * FROM banbua_pcat_name pn JOIN banbua_pcat_name_id pni ON pn.pcat_id = pni.pcat_name_id_cat WHERE pni.pcat_lang_id = '$lang'  ")or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }

    function ListCategoryplaceCon($lang,$value){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT * FROM banbua_facility_name bf JOIN banbua_facility_name_id bfn ON bf.f_cat_id = bfn.f_cat_name_id_f WHERE  f_cat_id	IN($value) AND  bfn.f_cat_lang_id = '$lang'  ";
        $query =mysqli_query($connect->database_connect,"SELECT * FROM banbua_pcat_name pn JOIN banbua_pcat_name_id pni ON pn.pcat_id = pni.pcat_name_id_cat WHERE  	pcat_id	IN($value) AND  pni.pcat_lang_id = '$lang'  ")or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;
    }



    function SearchCat($lang,$value){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT * FROM banbua_place bp JOIN banbua_pcat_name_id bpc ON bp.place_cat_id = bpc.pcat_name_id_cat WHERE bp.place_cat_id IN ($value) AND bpc.pcat_lang_id = '$lang'";
    	$query=mysqli_query($connect->database_connect,"SELECT * FROM banbua_place bp JOIN banbua_pcat_name_id bpc ON bp.place_cat_id = bpc.pcat_name_id_cat WHERE bp.place_cat_id IN ($value) AND bpc.pcat_lang_id = '$lang' AND bp.place_lang_id = '$lang' ")or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;

    }



    function Searchplace($lang,$value){
        $connect = new ConnectMysql();
        $connect->connect($this->host,$this->user,$this->pass,$this->database);
        mysqli_query($connect->database_connect,"SET NAMES UTF8");
        //echo "SELECT * FROM banbua_place bp JOIN banbua_pcat_name_id bpc ON bp.place_cat_id = bpc.pcat_name_id_cat WHERE bp.place_cat_id IN ($value) AND bpc.pcat_lang_id = '$lang'";
        $query=mysqli_query($connect->database_connect,"SELECT * FROM banbua_place bp JOIN banbua_pcat_name_id bpc ON bp.place_cat_id = bpc.pcat_name_id_cat WHERE bp.place_name LIKE '%$value%' AND bpc.pcat_lang_id = '$lang' AND bp.place_lang_id = '$lang' ")or die(mysqli_error());
        $result = array();
        while ($record = mysqli_fetch_array($query)) {
            $result[] = $record;
        }
        return $result;

    }




    
    
}

?>
	

