<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_searchbox.php");
    require(__CTR_PATH . "ctr_section.php");
    	
	 //Declaramos el controlador de la vista actual el cual contiene las acciones a ejecutar
    $ctr_Tag=new ctr_Section();
?>

<html>
 <head>
	   <?php
	       echo cls_HTML::html_js_header("//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
          echo cls_HTML::html_js_header(__JS_PATH . "ckeditor/ckeditor_basic.js");
	       echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
	   ?>
	 <title>UCREADMIN v1.0</title>   
 </head>

  <body>
  
	<div class="general_form_page">
		<div id="userpage">
		    <?php echo cls_HTML::html_form_tag("frm_user", "","","post"); ?>
		    
		    <fieldset class="groupbox"> <legend>Secciones</legend>
			    <div class="block_form">							
			       <?php echo cls_HTML::html_input_hidden("txt_id",""); ?>
				    <?php echo cls_HTML::html_label_tag("Tag:"); ?>
				    <br />
				    <?php //echo cls_HTML::html_select("cmb_tags", $ctr_Tag->tags->get_Tags(), "cmb_groups", "combo", 1, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Clave:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_key","txt_key","text",2,"",2,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Nombre:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_name","txt_name","text",32,"",3,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Título:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_title","txt_title","text",128,"",4,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Subtítulo:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_subtitle","txt_subtitle","text",128,"",5,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Descripción:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_description","txt_description","text",256,"",6,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Mostrar abierta al inicio:"); ?>
				    <br />
				    <?php echo cls_HTML::html_select("cmb_showflag", array(0 => 'No', 1 => 'Sí'), "cmb_showflag", "combo", 7, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("URL blog:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_urlblog","txt_urlblog","text",128,"",8,"","","required"); ?>
				    <br /><br />
				 </div>
			    <div class="block_form">
				    <?php echo cls_HTML::html_label_tag("Key Words:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_keywords","txt_keywords","text",128,"",10,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Estado:"); ?>
				    <br />
				    <?php echo cls_HTML::html_select("cmb_status", array('A' => 'Activa', 'I' => 'Inactiva'), "cmb_status", "combo", 11, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Texto:"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_textarea(4,30,"txt_info","txt_info","ckeditor","",11,"","",""); ?>
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

     ?>
    
	</div>
  </body>
 </html>
