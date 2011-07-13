<?php

	 require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once( __CLS_PATH . "cls_database.php");
    
    class cls_Login {
    	
		 var $auth_pg;
		 var $conn_status;
		 var $username;
       private $data_provide;
		 
		 function __construct(){
         $this->auth_pg=new cls_Database();
			$this->data_provide=new cls_Database();
		 }
		 	 
		 function get_username(){
		 	return $this->username;
		 }
		 
		 public function login($user, $pssw){
 
         //Verifica la conexion con postgre
		 	if($this->auth_pg->is_connect() && cls_Login::autenticate($user, $pssw)){
		 		$this->conn_status=true;
		 		$this->username=$user;	
		   }else{
		   	$this->conn_status=false;
		   }
		 } 
		 
		 public function autenticate($user, $pssw){
	      
	      $success=false;
	      
			$result=$this->data_provide->sql_execute("SELECT tbl_users.user_id
																	FROM tbl_users
																	WHERE tbl_users.user_name = '" . $user . "'
																	AND tbl_users.user_password = '" . md5($pssw) . "'
																	AND tbl_users.user_status = 'A'");
			
			return $this->data_provide->sql_get_rows($result);

         if($result){
            $success=true;
         } 			
			                      		                          
			return $success;
		 } 
		 
		 public function logout(){ 
            session_name("UCREADMIN");
            session_destroy();
            unset($this->auth_pg);
		   	$this->conn_status=false;
		   	header("Location:" . $mysite);
		 }  
    }

	
?>