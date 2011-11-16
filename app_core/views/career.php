<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_searchbox.php");
    require(__CTR_PATH . "ctr_career.php");
    require(__CTR_PATH . "ctr_area.php");
    	
	 //Declaramos el controlador de la vista actual el cual contiene las acciones a ejecutar
    $ctr_Career=new ctr_Career();
    $ctr_Area=new ctr_Area();
?>

<html>
 <head>
	   <?php
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery-1.6.2.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery.betterTooltip.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
          echo cls_HTML::html_js_header(__JS_PATH . "ckeditor/ckeditor_basic.js");
	       echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
	       echo cls_HTML::html_css_header(__CSS_PATH . "tooltip/theme/style_tooltip.css","screen");
	   ?>
	 <title><? echo $array_global_settings['sys_name'] . " " . $array_global_settings['sys_version']; ?></title>
 </head>

  <body>

    <script>
      $(document).ready(function() {
		$('.text').betterTooltip({speed: 150, delay: 300});
      });
    </script>

	<div class="general_form_page">

	<!-- Elemento contenedor de mensajes de usuario -->
   <div id='msg_box_container'></div>
   
		<div id="userpage">
		    <?php echo cls_HTML::html_form_tag("frm_career", "","","post"); ?>
		    
		    <fieldset class="groupbox" ><legend>CARRERAS</legend>
			    <div class="block_form">							
			       <?php echo cls_HTML::html_input_hidden("txt_id",""); ?>
				    <br />
				     <?php echo cls_HTML::html_label_tag("Área:"); ?>
				    <br />
				    <?php  echo cls_HTML::html_select_db("cmb_area", $ctr_Area->get_areas(), "cmb_area", "combo", 8, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Nombre:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_name","txt_name","text",128,20,"","Nombre de la Carrera",4,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Descripción:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_description","txt_description","text",256,20,"","Descripción",6,"","","required"); ?>
				    <br /><br />
                <?php echo cls_HTML::html_label_tag("Estado:"); ?>
                <br />
				    <?php echo cls_HTML::html_select("cmb_status", array('A' => 'Activa', 'I' => 'Inactiva'), "cmb_status", "combo", 9, "", ""); ?>
				    <br /><br />
				 </div>
			    <div class="block_form">
				    <?php echo cls_HTML::html_label_tag("Texto:"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_textarea(8,30,"txt_info","txt_info","ckeditor","",11,20,"","",""); ?>
				 </div>
			 </fieldset> 
	 		 <div id="action_buttons_form">
			    <?php echo cls_HTML::html_input_button("submit","btn_new","btn_new","button","Nuevo",9,"","onclick=\"$('#frm_career').attr('novalidate','novalidate');\""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_save","btn_save","button","Guardar",10,"",""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_search","btn_search","button","Buscar",12,"","onclick=\"$('#frm_career').attr('novalidate','novalidate');\""); ?>
			    <br />
		   </div>
		    <?php echo cls_HTML::html_form_end(); ?>
		</div>
		   
      <?php
	      //Eventos click de los botones de acción
	      
		   if(isset($_POST['btn_new'])){
		   	$ctr_Career->btn_new_click();
		   }

		   if(isset($_POST['btn_save'])){
		   	$ctr_Career->btn_save_click();
		   }
		   
		   if(isset($_POST['btn_search'])){
		   	   $search=new cls_Searchbox();
		         echo $search->show_searchbox(__VWS_HOST_PATH . "career.php", "Búsqueda de Carreras", "&nbsp;&nbsp;Digite el nombre de la Carrera:", "new.php", "frm_career");
		   }
		   
		   
		   /*Procedemos a llenar el formulario con los datos traídos del formulario
		    de búsqueda */

		  	if(isset($_GET['edit']) && isset($_GET['id'])){
		  		
		  		if($_GET['edit']=="1"){
		  			$career_data=$ctr_Career->get_careerdata($_GET['id']);

		  			echo "<script>
		  			       $('#txt_id').attr('value','" . $career_data[0][0] . "');
		  			       $('#cmb_area').attr('value','" . $career_data[0][1] . "');
							 $('#txt_name').attr('value','" . $career_data[0][2] . "');
							 $('#txt_description').attr('value'," . json_encode($career_data[0][3]) . ");
							 $('#txt_info').attr('value'," . json_encode($career_data[0][4]) . ");
							 $('#cmb_status').attr('value','" . $career_data[0][5] . "');
		  			     </script>";
		  		}
		  		
		   }else{
		  			echo "<script>$('#txt_id').attr('value','_NEW');</script>";
		  	}  

     ?>
	</div>
  </body>
 </html>
