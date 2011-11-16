<?php

    require_once( __CLS_PATH . "cls_database.php");

	class cls_User { 
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();	   
	   } 	
	 
	   public function get_userdata($id_user){ 

			$result=$this->data_provide->sql_execute("SELECT tbl_users.user_id,
																	tbl_users.user_name,
																	tbl_users.user_password,
																	tbl_users.user_group_fk,
																	tbl_users.user_info,
																	tbl_users.user_status
																	FROM tbl_users
																	WHERE tbl_users.user_id = " . $id_user );
			                      		                          
			return $this->data_provide->sql_get_rows($result);
      } 
      
      public function insert_userdata($userdata = array()){ 
      
	      $success=false; 
			$result=$this->data_provide->sql_execute("INSERT INTO tbl_users 
																   (user_name,
																	 user_password,
																	 user_group_fk,
																	 user_info,
																	 user_status)
																	 VALUES ('" . $userdata[0] . "','" . $userdata[1] . "','" . $userdata[2] . "',
																	 " . $userdata[3] . ",'" . $userdata[4] . "'," . $userdata[5] . ")");
			if($result){
				$success=true;
			}
			
			 return $success;
			                      		                          
      }
      
      public function update_userdata($userdata = array(),$id_user){ 
	   
	      $success=false; 
			$result=$this->data_provide->sql_execute("UPDATE tbl_users 
																   SET user_name = '" . $userdata[0] . "',
																	user_password = '" . $userdata[1] . "',
																	user_group_fk = '" . $userdata[2] .  "',
																	user_info = '" . $userdata[3] . "',
																	user_status = '" . $userdata[4] . "',
																	user_group_fk = " . $userdata[5] . "
																	WHERE tbl_users.user_id = " . $id_user);
			if($result){
				$success=true;
			}
			
	      return $success;
			                      		                          
      }     

	}
	
?>