<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Usuarios (ADD,EDIT,DELETE,SEARCH) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once( __CLS_PATH . "cls_section.php"); 
     
   class ctr_Section {
   	
   	private $sectiondata;
      
      public function __construct()
	   {
			 $this->sectiondata=new cls_Section(); 
	   }  
	     	  
   	//Si se presiona el botón Agregar Usuario 
	   function btn_save_click() 
	   {
	   	         
	      $sectioninfo=array();
	      $sectioninfo[0]=$_POST['txt_user'];
	      $id_section=$_POST['txt_id'];    
	      
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
	   	
	   	/*Si vamos a insertar un registro nuevo (_NEW) o actualizar en caso de que
	   	$_GET['id'] tenga un valor asignado desde el formulario de búsqueda*/   	
	   	if($id_section=="_NEW"){
	   		
		   	if(($this->sectiondata->insert_sectiondata($userinfo)==1)){  
		      	cls_Message::show_message("","success","success_insert");
		      }
		   }else{
		   	if($this->sectiondata->update_sectiondata($userinfo,$id_user)){  
		      	cls_Message::show_message("","success","success_update");
		      }
		   }
	   }
	   
	   function btn_delete_click() {

	   }
   }
	
?>