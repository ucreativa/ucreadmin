﻿<?php

   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once( __CONN_PATH . "app_remconnection.php");

	class cls_RDatabase { 
	   
	   var $conn_RCdata; //Conexión remota a la bd del sitio a administrar
	   var $core_conn;
	   var $conn_status;
	   
	   public function __construct(){
			$this->conn_RCdata=new app_RConnection("localhost","bd_ucreasite","5432","postgres","123");
			$this->is_connect();
	   } 
	   
	   public function db_connect() {
		    try{	 	   
				 	$this->core_conn=pg_pconnect($this->conn_RCdata->get_strconn());	 
			 }catch(Exception $e){
				   cls_Message::show_message($e->getMessage(),"error",""); 
			 }
			 
			 return $this->core_conn;
 	   }
	   
	   public function is_connect(){
	   	try{	
	   		
				if (!$this->db_connect()) {
					$this->conn_status=false;
					exit;
				} else { 
					$this->conn_status=true; 
				}
				
	   	}catch(Exception $e){
	   		cls_Message::show_message($e->getMessage(),"error","");
	   	}
	   	
	      return $this->conn_status;
	   }	
	 
	   //Método para ejecutar una sentencia sql 
	   public function sql_execute($sql){ 
		   try{	
				$result=pg_query($this->db_connect(),$sql);
			}catch(Exception $e){
		   		cls_Message::show_message($e->getMessage(),"error","");
		   }
		   return $result;
	   } 
	   
	   //Método para obtener los resultados de una sentencia sql en un array
	   public function sql_get_rows($result){ 
	      try{	
	         $array=array();
	         $i=0;
			   while($row=pg_fetch_row($result)){
			   	$array[$i]=$row;
			   	$i++;
			   }
		   }catch(Exception $e){
		   		cls_Message::show_message($e->getMessage(),"error","");
		   }
		  return $array;   
	   } 
	   
	}
	
?>