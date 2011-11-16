﻿<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Usuarios (ADD,EDIT,DELETE,SEARCH) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once( __CLS_PATH . "cls_user.php");
   require_once( __CLS_PATH . "cls_usergroup.php");  
     
   class ctr_User {
   	
   	private $userdata;
      var $usersgroups;  
      
      public function __construct()
	   {
			 $this->userdata=new cls_User(); 
          $this->usersgroups=new cls_Usergroup();
	   }  
	   
	   public function get_userdata($id_user)
	   {
			 return $this->userdata->get_userdata("",$id_user);
	   }  
	   
   	  
   	//Si se presiona el botón Agregar Usuario 
	   function btn_save_click() 
	   {
	   	         
	      $userinfo=array();
	      $userinfo[0]=$_POST['txt_user'];
	      $id_user=$_POST['txt_id'];    
	      
	      if($_POST['txt_photo']==''){
	      	$_POST['txt_photo']="default.jpg";
	      }
	      
	      $userinfo[0]=$_POST['txt_user'];
	      $userinfo[1]=$_POST['txt_photo'];
	      $userinfo[2]=$_POST['txt_email'];
	      $userinfo[3]=$_POST['txt_ident'];
	      $userinfo[4]=$_POST['txt_info'];
	      $userinfo[5]=$_POST['cmb_groups']; 	
	      $userinfo[6]=$_POST['txt_pssw'];
	      $userinfo[7]=$_POST['txt_antusername'];
	   	
	   	/*Si vamos a insertar un registro nuevo (_NEW) o actualizar en caso de que
	   	$_GET['id'] tenga un valor asignado desde el formulario de búsqueda*/   	
	   	if($id_user=="_NEW"){
	   		
		   	if(($this->userdata->insert_userdata($userinfo)==1) && ($this->kadmin->krb5_add_user($userinfo[0],$userinfo[6])==1)){  
		      	cls_Message::show_message("","success","success_insert");
		      }
		   }else{
		   	if(($this->userdata->update_userdata($userinfo,$id_user)) && ($this->kadmin->krb5_edit_user($userinfo[7],$userinfo[0],$userinfo[6]))){  
		      	cls_Message::show_message("","success","success_update");
		      }
		   }
	   }
	   
	   function btn_delete_click() {

	   }
   }
	
?>