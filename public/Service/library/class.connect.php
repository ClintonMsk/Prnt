<?PHP

	class ConnectMysql {
		
			var  $host ,$username,$password,$databasename;
			public $database_connect;
			
			public function connect($set_host,$set_username,$set_password,$set_databasename)
			{
					$this->host = $set_host;
					$this->username = $set_username; 
					$this->password = $set_password;
					$this->databasename = $set_databasename;
					
				$this->database_connect = mysqli_connect($this->host,$this->username,$this->password,$this->databasename);

				
				
			}
			
	
			public function close()
			{
				return mysqli_close($this->database_connect);
			}
			
		}
	
?>
