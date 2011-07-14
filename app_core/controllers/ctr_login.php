﻿<?php 

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Login (LOGIN, LOGOUT) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php"); 
   require_once( __CLS_PATH . "cls_login.php");
   
   class ctr_Login {
   	
      private $login_acc;  
   
	   public function __construct()
	   {
			 $this->login_acc=new cls_Login(); 
	   }  	
   	  
	   //Si se presiona el boton ENTRAR en el login
	   function btn_login_click() { 
	   	           
		      $username=$_POST['txt_user'];
		      $password=$_POST['txt_pssw'];
		       
		      $this->login_acc->login($username, $password);
		      
		      //Si nos autentificamos correctamente
				if($this->login_acc->conn_status)
				{  
				    session_name("UCREADMIN");
				 	 session_start();
				 	 $_SESSION['AUTH']="YES";
				 	 $_SESSION['IDUSER']=$this->login_acc->get_user_id(); 
				 	 	 
				 	 header("Location:" . __VWS_HOST_PATH . "control_panel.php");
				}else{
					 cls_Message::show_message("","warning","fail_auth");
				}	
	   }
	   
	   //Si se presiona el boton SALIR (logout)
	   function btn_logout_click() {
	   	
		   if (isset($_POST['btn_logout'])){
		       $this->login_acc->logout();
		   }

	   }
   }
	 
?>