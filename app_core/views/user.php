﻿<?php
    ob_end_flush();
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_searchbox.php");
    require(__CTR_PATH . "ctr_user.php");
    	
	 //Declaramos el controlador de la vista actual el cual contiene las acciones a ejecutar
    $ctr_User=new ctr_User();
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

  <body>
  
	<div class="general_form_page">
		<div id="userpage">
		    <?php echo cls_HTML::html_form_tag("frm_user", "","","post"); ?>
		    
		    <fieldset class="groupbox"> <legend>USUARIOS</legend>
			    <div class="block_form">
				    <?php echo cls_HTML::html_label_tag("Nombre de Usuario:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_hidden("txt_id",""); ?>
				     <?php echo cls_HTML::html_input_hidden("txt_antusername",""); ?>
				    <?php echo cls_HTML::html_input_text("txt_user","txt_user","text",64,"",1,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Password:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_password("txt_pssw","txt_pssw","text",64,"",2,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Confirme el Password:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_password("txt_pssw","txt_pssw","text",64,"",3,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Cédula:"); ?>
				    <br />
		          <?php echo cls_HTML::html_input_text("txt_ident","txt_ident","text",9,"",4,"","onkeypress='return validarOnlyNum(event);'","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("E-mail:"); ?>
				    <br />
		          <?php echo cls_HTML::html_input_email("txt_email", "txt_email", "text", 128, "", 5, "", "","required"); ?>
		          <br /><br />
				 </div>
			    <div class="block_form">
				    <?php echo cls_HTML::html_label_tag("Descripción breve:"); ?>
				    <br />
				    <?php echo cls_HTML::html_textarea(4,30,"txt_info","txt_info","text","",7,"","",""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Grupo de acceso:"); ?>
				    <br />
				    <?php 		    
					    echo cls_HTML::html_select("cmb_groups", $ctr_User->usersgroups->get_users_groups(), "cmb_groups", "combo", 8, "", "");
					 ?>
				    <br /><br />
				 </div>
			 </fieldset> 
	 		 <div id="action_buttons_form">
			    <?php echo cls_HTML::html_input_button("button","btn_new","btn_new","button","Nuevo",9,"",""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_save","btn_save","button","Guardar",10,"",""); ?>
			    <?php echo cls_HTML::html_input_button("button","btn_cancel","btn_cancel","button","Cancelar",11,"",""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_search","btn_search","button","Buscar",12,"","onclick=\"$('#frm_user').attr('novalidate','novalidate');\""); ?>
			    <br /><br />
		   </div>
		    <?php echo cls_HTML::html_form_end(); ?>
		</div>
		
      <?php
	      //Eventos click de los botones de acción
	      
		   if(isset($_POST['btn_new'])){
		   	//$ctr_User->btn_add_click();
		   }
		    
		   if(isset($_POST['btn_save'])){
		   	$ctr_User->btn_save_click();
		   }
		   
		   if(isset($_POST['btn_cancel'])){
		   	//$ctr_User->btn_add_click();
		   }
		   
		   if(isset($_POST['btn_search'])){
		   	 $search=new cls_Searchbox();
		       echo $search->show_searchbox(__VWS_HOST_PATH . "users.php", "Búsqueda de Usuarios", "&nbsp;&nbsp;Digite el nombre del usuario:", "users.php", "frm_user");
		   }
		   
		   
		   /*Procedemos a llenar el formulario con los datos traídos del formulario
		    de búsqueda */
		    
		  	if(isset($_GET['edit']) && isset($_GET['id'])){
		  		
		  		if($_GET['edit']=="1"){
		  			$user_data=$ctr_User->get_userdata($_GET['id']);

		  			echo "<script>
		  			         $('#txt_id').attr('value','" . $user_data[0][0] . "');
		  			         $('#txt_user').attr('value','" . $user_data[0][1] . "');
		  			         $('#txt_email').attr('value','" . $user_data[0][3] . "');
		  			         $('#txt_ident').attr('value','" . $user_data[0][4] . "');
								$('#txt_info').attr('value','" . $user_data[0][5] . "');
								$('#cmb_groups').attr('value','" . $user_data[0][6] . "');
								$('#txt_antusername').attr('value','" . $user_data[0][1] . "');
		  			      </script>";	  
		  		}
		  		
		   }else{
		  			echo "<script>$('#txt_id').attr('value','_NEW');</script>";
		  	}  
ob_end_flush();
     ?>
    
	</div>
  </body>
 </html>
