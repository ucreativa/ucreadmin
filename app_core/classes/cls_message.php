﻿<?php
    require_once(__CLS_PATH . "cls_html.php");
    
    class cls_Message {

        function __construct(){
        }

        public function show_message($text,$type,$reason){

           echo "<div id='msg_box_container'></div>";

           if($type!='msg_box_user'){
        	     $message_box="<div class='msg_box' id='" . $type . "'><span>" . cls_Message::messages($reason,$text) . "</span></div>";
        	  }else{
				  $message_box="<div class='msg_box_user' id='" . $type . "'>
				                  <span>" . cls_Message::messages($reason,$text) . "</span>
				                  <div class='separator'></div>"
				                 .  cls_HTML::html_input_button("button","btn_accept","btn_accept","button","OK",1,"onclick=\"location.href='index.php'\"","") . 
				                "</div>";
				                
				  echo "<script>$('#inactive_base').css('display','block');$('#inactive_base').css('z-index','99');</script>";     	  
        	  }

           //Message Box Animation with JQUERY
           /*<div class='msg_box_container'></div> es el contenedor principal de los mensajes.
            Este elemento es añadido a las páginas que necesita mostrar mensajes al usuario*/     	  
        	  echo "<script>
        	          $('#msg_box_container').html(" . json_encode($message_box) . ");
        	          $('.msg_box').fadeOut(0);$('.msg_box').fadeIn(500);$('.msg_box').fadeOut(8000);
        	        </script>";
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
           	 case "fail_auth":
           	   $message="El Usuario o Password suministrados son incorrectos";
           	 break;
           	 case "expired_session":
           	   $message="Su sesión ha expirado, por favor vuelva a ingresar sus datos de autentificación.";
           	 break;
           	 case "":
           	   $message=$text;
           	 break;
           } 
           return $message;       
        }

    }

?>