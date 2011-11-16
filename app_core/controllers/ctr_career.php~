<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Usuarios (ADD,EDIT,DELETE,SEARCH) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once(__CLS_PATH . "cls_career.php");
     
   class ctr_Career {
   	
   	private $careerdata;
      
      public function __construct() 
	   {
		  $this->careerdata=new cls_Career();
	   }  

	   public function get_careerdata($id_career)
	   {
		  return $this->careerdata->get_careerdata($id_career);
	   }  
	     	  
   	//Si se presiona el botón Agregar Usuario 
	   function btn_save_click() 
	   {
	      $careerinfo=array();
	      $id_career=$_POST['txt_id'];

	      $careerinfo[0]=$_POST['txt_id'];
	      $careerinfo[1]=$_POST['cmb_area'];
		   $careerinfo[2]=$_POST['txt_name'];
		   $careerinfo[3]=$_POST['txt_description'];
         $careerinfo[4]=$_POST['txt_info'];
	      $careerinfo[5]=$_POST['cmb_status'];
	   	
	   	/*Si vamos a insertar un registro nuevo (_NEW) o actualizar en caso de que
	   	$_GET['id'] tenga un valor asignado desde el formulario de búsqueda*/   	
	   	if($id_career=="_NEW"){
		   	if(($this->careerdata->insert_careerdata($careerinfo)==1)){
		      	cls_Message::show_message("","success","success_insert");
		      }
		   }else{
		   	if($this->careerdata->update_careerdata($careerinfo,$id_career)){
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