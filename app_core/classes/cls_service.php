﻿﻿<?php

   require_once( __CLS_PATH . "cls_database.php");

	class cls_Service { 
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();	   
	   } 	
	 
	   public function get_services_by_username($user_krb_name){ 
	   
			$result=$this->data_provide->sql_execute("SELECT tbl_services.service_id,
																	tbl_services.service_name,
																	tbl_services.service_icon,
																	tbl_services.service_info,
																	tbl_services.service_url,
																	tbl_users_services.user_service_username
																	FROM tbl_services,tbl_users_services,tbl_users
																	WHERE tbl_services.service_id = tbl_users_services.service_fk
																	AND tbl_users.user_id = tbl_users_services.user_fk
									                        AND tbl_users.user_krb_name = '" . $user_krb_name . "'");
			                      		                          
			return $this->data_provide->sql_get_rows($result);
      }  
      
      public function get_services(){ 
	   
			$result=$this->data_provide->sql_execute("SELECT tbl_services.service_id,
																	tbl_services.service_name,
																	tbl_services.service_icon,
																	tbl_services.service_info,
																	tbl_services.service_url,
																	tbl_users_services.user_service_username
																	FROM tbl_services");
			                      		                          
			return $this->data_provide->sql_get_rows($result);
      }  

	}

?>