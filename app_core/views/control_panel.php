<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/security.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_user.php");
    require_once(__CTR_PATH . "ctr_login.php");
    require_once(__CTR_PATH . "ctr_control_panel.php");
    
    //Tipo de BD seleccionada
    $db=2;
    if(isset($_GET['db'])){
    	$db=$_GET['db'];
    }
    
    $_SESSION['DB']=$db;

    //Declaramos el controlador de la vista actual el cual contiene las acciones a ejecutar
    $ctr_Login=new ctr_Login();
    // Pasamos por parámetro al constructor la BD seleccionada (real(1) o prueba(2))
    $ctr_CP=new ctr_ControlPanel(); 
?>

<html>

  <head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <?php
          echo cls_HTML::html_js_header(__JS_PATH . "jquery-1.6.2.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery.betterTooltip.js");
          echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
          echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "tooltip/theme/style_tooltip.css","screen");
      ?>
    <title><? echo $array_global_settings['sys_name'] . " " . $array_global_settings['sys_version']; ?></title>
  </head>

  <body id="cp_page">

    <script>
      $(document).ready(function() {
		$( "#form_base" ).draggable();
      });
    </script>
    
      <div id="app_info" style="">
      <?php      
		   $userdata=new cls_User();
		   $row=$userdata->get_userdata($_SESSION['IDUSER']);  				  		   
		?>
      <span><? echo cls_HTML::html_img_tag(__IMG_PATH . "hand.png", "img_app", "img_app", "UC-CMS", "") 
                    . $array_global_settings['sys_name'] . " " . $array_global_settings['sys_version']; ?> - SISTEMA DE ADMINISTRACIÓN DE CONTENIDO</span>
      <? echo "<br/><span>Bienvenid@ <b>" . $row[0][1] . "</b></span>"; ?>
      </div>

		<div id="control_panel">

             <div id="services_icons">
    	        <?php echo cls_HTML::html_form_tag("frm_logout", "" ,"","post");	 ?>
    		     <?php //echo cls_HTML::html_input_button("submit","btn_logout","btn_logout","button","Salir",0,"",""); ?>
    			  <?php echo cls_HTML::html_form_end(); ?>
             </div>
			 <div id="cp_icons_panel">
			     <?php echo cls_HTML::html_img_link(__IMG_PATH . "secciones.png" , "#", "_self" ,"Secciones", "icon_1", "cp_icons", "sections","", "onclick=\"open_form('section.php',850,490);\""); ?>
			     <?php echo cls_HTML::html_img_link(__IMG_PATH . "noticias.png" , "#", "_self" ,"Noticias", "icon_2", "cp_icons", "news","", "onclick=\"open_form('new.php',870,490);\""); ?>
              <?php echo cls_HTML::html_img_link(__IMG_PATH . "carreras.png" , "#", "_self" ,"Carreras", "icon_3", "cp_icons", "carreras","", "onclick=\"open_form('career.php',830,490);\""); ?>
              <?php echo cls_HTML::html_img_link(__IMG_PATH . "eventos.png" , "#", "_self" ,"Eventos", "icon_4", "cp_icons", "eventos","", "onclick=\"open_form('event.php',790,460);\""); ?>
			     <div style="opacity:0.5;">
			     <?php echo cls_HTML::html_img_link(__IMG_PATH . "enlaces.png" , "#", "_self" ,"Links", "icon_5", "cp_icons", "links","", "onclick=\"open_form('link.php',680,410);\""); ?>
			     <?php echo cls_HTML::html_img_link(__IMG_PATH . "etiquetas.png" , "#", "_self" ,"Tags", "icon_6", "cp_icons", "tags","", "onclick=\"open_form('tag.php',680,410);\""); ?>
              <?php echo cls_HTML::html_img_link(__IMG_PATH . "usuarios.png" , "#", "_self" ,"Usuarios", "icon_7", "cp_icons", "users","", "onclick=\"open_form('user.php',730,410);\""); ?>
			     <?php echo cls_HTML::html_img_link(__IMG_PATH . "grupos.png" , "#", "_self" ,"Grupos de Usuarios", "icon_8", "cp_icons", "group_users","", "onclick=\"open_form('groups.php',680,410);\""); ?>
			     </div>
		    </div>
     </div>
 
	     <div id="form_base">
	       <?php echo cls_HTML::html_img_link(__IMG_PATH . "close.png" , "#", "_self" ,"Cerrar", "button_close", "button_action", "cerrar", "", "onclick=\"close_form();\""); ?>
	       <iframe id="form_container" src=""></iframe>
	     </div>
	     
	  <div id="db_selector">
        <?php 
              
            if($db==1){
            	echo "<script>
            	       $(document).ready(function(){
			            	$('#btn_ucreasite').css('background','#42AA4E');
			            	$('#btn_ucreasite').css('color','#FCFCFC');
			             });
			           </script>";
            }else{
      	     echo "<script>
      	          $(document).ready(function(){
	            	  $('#btn_ucreasite_test').css('background','#42AA4E');
	            	  $('#btn_ucreasite_test').css('color','#FCFCFC');
	            	 });
	               </script>";
            } 
            echo "<span>Conectar con BD:</span>";
            echo cls_HTML::html_link_tag("Sitio de Prueba", "btn_ucreasite_test", "ext_button", "?username=".$row[0][1]."&db=2", "", "Conectar con Sitio de prueba", "");
            echo cls_HTML::html_link_tag("Sitio Web", "btn_ucreasite", "ext_button", "?username=".$row[0][1]."&db=1", "", "Conectar con Sitio de la Universidad", "");
            echo "<span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>";
            echo "<span>Ver: </span>";
            echo cls_HTML::html_link_tag("ucreativa.com", "web_real", "ext_button", "http://www.ucreativa.com/ucreasite/", "_blank", "Sitio de la Universidad", "");
            echo cls_HTML::html_link_tag("ucreasite_test", "web_test", "ext_button", "http://www.ucreativa.com/ucreasite_test/", "_blank", "Sitio de Prueba", "");
           
        ?>
     </div>
	     
    <div id="inactive_base"></div>
    
  </body>

</html>

 <?php
      //Eventos click de los botones de acción

	   if(isset($_POST['btn_logout'])){
	   	$ctr_Login->btn_logout_click();
	   }
 ?>