﻿<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");

    class cls_Message {
    	  
        function __construct(){
        }
        
        public function show_message($text,$type,$reason){
        	  echo "<div class='msg_box' id='" . $type . "'><span>" . cls_Message::messages($reason,$text) . "</span></div>";
           //Message Box Animation with JQUERY         	  
        	  echo "<script>$('.msg_box').fadeOut(0);$('.msg_box').fadeIn(500);$('.msg_box').fadeOut(18000);</script>";
        }
        
        public function messages($reason,$text){
        	  $message="";
        	  
           switch($reason){
           	 case "success_insert":
           	   $message="La información ha sido ingresada correctamente";
           	 break;
           	 case "success_update":
           	   $message="La información ha sido actualizada correctamente";
           	 break;
           	 case "success_delete":
           	   $message="La información ha sido eliminada correctamente";
           	 break;
           	 case "warning":
           	   $message="La información ha sido ingresada correctamente";
           	 break;
           	 case "":
           	   $message=$text;
           	 break;
           } 
           return $message;       
        }

    }

?>﻿