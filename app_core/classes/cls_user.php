<?php

   require_once( __CLS_PATH . "cls_database.php");

	class cls_User { 
	
	   var $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();	   
	   } 	
	 
	   public function get_Userdata($user_krb_name){ 
	   
			$result=$this->data_provide->sql_execute("SELECT tbl_users.user_id,
																	tbl_users.user_krb_name,
																	tbl_users.user_photo,
																	tbl_users.user_email,
																	tbl_users.user_ident,
																	tbl_users.user_info,
																	tbl_users.user_group_fk
																	FROM tbl_users
																	WHERE tbl_users.user_krb_name = '" . $user_krb_name . "'");
			                      		                          
			return $this->data_provide->sql_get_rows($result);
      } 
      
      public function insert_Userdata($userdata = array()){ 
	   
			$result=$this->data_provide->sql_execute("INSERT INTO tbl_users 
																   (user_krb_name,
																	 user_photo,
																	 user_email,
																	 user_ident,
																	 user_info,
																	 user_group_fk)
																	 VALUES ('" . $userdata[0] . "','" . $userdata[1] . "','" . $userdata[2] . "',
																	 " . $userdata[3] . ",'" . $userdata[4] . "'," . $userdata[5] . ")");
			                      		                          
      }    

	}
	
?>