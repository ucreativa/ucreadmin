<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista */

   //require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
   require_once(__CLS_PATH . "cls_area.php");

   class ctr_Area {

   	private $areadata;

       public function __construct()
	   {
			 $this->areadata=new cls_area();
	   }

	   public function get_areadata($id_area)
	   {
			 return $this->areadata->get_areadata($id_area);
	   }

       public function get_areas()
	   {
			 return $this->areadata->get_areas();
	   }

    }
	
?>