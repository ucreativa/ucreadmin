﻿<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Usuarios (ADD,EDIT,DELETE,SEARCH) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once(__CLS_PATH . "cls_event.php");
     
   class ctr_Event {
   	
   	private $eventdata;
      
      public function __construct()
	   {
		  $this->eventdata=new cls_Event();
	   }  

	   public function get_eventdata($id_event)
	   {
		  return $this->eventdata->get_eventdata($id_event);
	   }  
	     	  
   	//Si se presiona el botón Agregar Usuario 
	   function btn_save_click() 
	   {
	      $eventinfo=array();
	      $id_event=$_POST['txt_id'];

	      $eventinfo[0]=$_POST['txt_id'];
	      $eventinfo[1]=$_POST['txt_title'];
		   $eventinfo[2]=$_POST['txt_description'];
         $eventinfo[3]=$_POST['txt_url'];
	      $eventinfo[4]=$_POST['cmb_status'];
	   	
	   	/*Si vamos a insertar un registro nuevo (_NEW) o actualizar en caso de que
	   	$_GET['id'] tenga un valor asignado desde el formulario de búsqueda*/   	
	   	if($id_event=="_NEW"){
		   	if(($this->eventdata->insert_eventdata($eventinfo)==1)){
		      	cls_Message::show_message("","success","success_insert");
		      }
		   }else{
		   	if($this->eventdata->update_eventdata($eventinfo,$id_event)){
		      	 cls_Message::show_message("","success","success_update");
		      	 //Limpiamos las variables para inicializar la página con _NEW
		      	 unset($_GET['id']);
                unset($_GET['edit']);
		      }
		   }
	   }
	   
	   function btn_new_click() {
   	     //Limpiamos las variables para inicializar la página con _NEW
      	 unset($_GET['id']);
          unset($_GET['edit']);
	   }
	   
	   function btn_delete_click() {

	   }
   }
	
?>