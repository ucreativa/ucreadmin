<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/security.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_user.php");
    require_once(__CLS_PATH . "cls_service.php");
?>

<html>

  <head>
      <?php
          echo cls_HTML::html_js_header("//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
          echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
      ?>
    <title>UCREAUTH v1.0</title>   
  </head>

  <body id="cp_page">
  
   <div>
		<div id="control_panel">
			 <?php 
		        $userdata=new cls_User();
		   	  $row=$userdata->get_userdata($_SESSION['USERNAME'],"-1");
		   				  		   
				  echo "<span>Bienvenid@ <b>" . $row[0][1] . "</b></span>";
		    ?>
			 <div id="services_icons">	  
				 <?php
				     //Obtenemos los servicios habilitados para el usuario
				 	  $services=new cls_Service();

   			     $row=$services->get_services_by_username($row[0][1]);
				  		     
				     if($row){
						  foreach($row as $value){ 	  	    
						  	    //Parámetros de: html_img_link($src, $href, $target, $title $id, $class, $alt, $event)
						  	    echo cls_HTML::html_img_link(__RSC_IMG_HOST_PATH . $value[2] , $value[4], "_self" ,$value[3], $value[1], "img_link", "", $value[1], "");
						  }
					  }
				 ?>
			 </div>
			 <div id="cp_icons_panel">
			     <?php echo cls_HTML::html_img_link(__IMG_PATH . "usuarios_32.png" , "#", "_self" ,"Usuarios", "icon_1", "cp_icons", "new_user","", "onclick=\"open_form('users.php',680,410);\""); ?>	  			
		    </div>
     </div>
     
	     <div id="form_base">
	       <?php echo cls_HTML::html_img_link(__IMG_PATH . "exit.png" , "#", "_self" ,"Cerrar", "button_close", "button_action", "cerrar", "", "onclick=\"close_form();\""); ?>
	       <iframe id="form_container" src=""></iframe>
	     </div>
	     
    <div id="inactive_base"></div>
    
  </body>

</html>
