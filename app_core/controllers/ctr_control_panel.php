﻿<?php

	 require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
     require_once(__CLS_PATH . "cls_remdatabase.php");
     require_once(__CLS_PATH . "cls_database.php");
    
    class ctr_ControlPanel {
    	
		 var $remote_connection;

       // Pasamos por parámetro al constructor la BD seleccionada (real(1) o prueba(2))
		 function __construct(){
		    $this->remote_connection=new cls_RDatabase($_SESSION['DB']);
		 }
  
    }

?> 