<?php
	Class  OraSql
	{
		public $conn;
		
		function OraSql()
		{
                    $this->conn = oci_connect('IDIME', 'I1D9I9M2E', 'IDIME');//conexion a DB PRODUCCION
//                    $this->conn = oci_connect('IDIME', 'I1D9I9M2E', 'PRUEBAS');//conexion a DB PRUEBAS
                    

			if (!$this->conn) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}			
			return $this;
		}
		
		function OrConsul($Consul){
			$SqlCon = oci_parse($this->conn,$Consul);
			oci_execute($SqlCon);
			$i=0;
			$reg = array();
			while(($row=  \oci_fetch_assoc($SqlCon)) != false)
			{
				$reg[$i]=$row;
				$i++;
			}
			return $reg;
			oci_free_statement($SqlCon); 
		}
		
		function OrUpdate($Consul)
		{
			$SqlCon = oci_parse($this->conn,$Consul);
			$objExecute = oci_execute($SqlCon);
			if($objExecute)  
			{  
				oci_commit($this->conn); //*** Commit Transaction ***//  
				return true;
			}  
			else  
			{  
				return false;
			}  
			oci_free_statement($SqlCon);   			
		}
                
	}
?>