 <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/security.php"); ?>
 <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php"); ?>
 <?php require_once(__CLS_PATH . "cls_html.php"); 
  
  $plugin_name="upload_files"; 
 
 ?>

<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin HTML Example 5.0.5
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://creativecommons.org/licenses/MIT/
 */
-->
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<title>jQuery File Upload</title>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css" id="theme">
<?php echo cls_HTML::html_css_header(__PLG_HOST_PATH . $plugin_name . "/jquery.fileupload-ui.css","screen"); ?>
<?php echo cls_HTML::html_css_header(__PLG_HOST_PATH . $plugin_name . "/base/style.css","screen"); ?>
<?php $uploadfile_path=__PLG_HOST_PATH . $plugin_name . "/base/upload.php";?>
</head>
<body>
<div id="fileupload">
	<!-- Elemento contenedor de mensajes de usuario -->
   <div id='msg_box_container'></div>

    <form id="frm_file" action="<?php echo $uploadfile_path . "?form=".$_GET['form']."&id=".$_GET['id'];?>" method="POST" enctype="multipart/form-data">

        <div class="fileupload-buttonbar">
            <label class="fileinput-button">
                <span>Agregar Archivos...</span>
                <input type="file" name="files[]" multiple>
            </label>
            <!--<button type="submit" class="start">Iniciar</button>
            <button type="reset" class="cancel">Cancelar</button>
            <button type="button" class="delete">Eliminar</button> -->
        </div>
    </form>
    <div class="fileupload-content">
        <table class="files"></table>
        <div class="fileupload-progressbar"></div>
    </div>
</div>
<!--$(document).ready(function() { $('table.start').css('display','none');}); -->
<script id="template-upload" type="text/x-jquery-tmpl">
    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
        <td class="preview"></td>
        <td class="name">${name}</td>
        <td class="size">${sizef}</td>
        {{if error}}
            <td class="error" colspan="2">Error:
                {{if error === 'maxFileSize'}}Archivo demasiado grande
                {{else error === 'minFileSize'}}Archivo demasiado pequeño
                {{else error === 'acceptFileTypes'}}Tipo de archivo no permitido
                {{else error === 'maxNumberOfFiles'}}Máximo número de archivos permitidos
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="progress"><div></div></td>
            <td class="start"><button onclick='showclose_form_datafile(this,1);'>Iniciar</button></td>
        {{/if}}
        <td class="cancel"><button>Cancelar</button></td>
    </tr>
</script>
<script id="template-download" type="text/x-jquery-tmpl">
    <tr class="template-download{{if error}} ui-state-error{{/if}}">
        {{if error}}
            <td></td>
            <td class="name">${name}</td>
            <td class="size">${sizef}</td>
            <td class="error" colspan="2">Error:
                {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                {{else error === 3}}File was only partially uploaded
                {{else error === 4}}No File was uploaded
                {{else error === 5}}Missing a temporary folder
                {{else error === 6}}Failed to write file to disk
                {{else error === 7}}File upload stopped by extension
                {{else error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                {{else error === 'emptyResult'}}Empty file upload result
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="preview">
                {{if thumbnail_url}}
                    <a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
                {{/if}}
            </td>
            <td class="name">
                <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
            </td>
            <td class="size">${sizef}</td>
            <td colspan="2"></td>
        {{/if}}
        <td class="delete">
            <button data-type="${delete_type}" data-url="${delete_url+'&id=<? echo $_GET['id'];?>&form=<? echo $_GET['form'];?>'}">Delete</button>
        </td>
    </tr>
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>

<script>

function showclose_form_datafile(element,flag){
 if(flag==1){
   $(element).bind('click', function (event) {
        $("#file_data_box").css("display","block");
        $("#inactive_base").css("display","block");
        $("#block_form_files").css("overflow","hidden");
        return false;
   });
 }else{
        $("#file_data_box").css("display","none");
        $("#inactive_base").css("display","none");
        $("#block_form_files").css("overflow","auto");
        return element;
 }
}

function insert_datafile(){
   var element=showclose_form_datafile(element,0);
   $(element).bind('click', function (event) {
           alert(element); 
        return true;
   });
}


</script>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/jquery.iframe-transport.js","screen"); ?>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/jquery.fileupload.js","screen"); ?>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/jquery.fileupload-ui.js","screen"); ?>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/base/application.js","screen"); ?>

    <div class="form_data_box" id="file_data_box">
          	<div id="userpage">
            <br /><br />
		    <?php echo cls_HTML::html_form_tag("frm_file", "","","post"); ?>
		    <fieldset class="groupbox" ><legend>DATOS DE ARCHIVO</legend>
			    <div class="block_form">
                    <?php echo cls_HTML::html_input_hidden("txt_id",""); ?>
				    <?php echo cls_HTML::html_label_tag("Key Words:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_keywords","txt_keywords","text",128,20,"","Keywords",8,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Estado:"); ?>
				    <?php echo cls_HTML::html_select("cmb_status", array('A' => 'Activa', 'I' => 'Inactiva'), "cmb_status", "combo", 9, "", ""); ?>
				    &nbsp;&nbsp;&nbsp;
				    <?php echo cls_HTML::html_label_tag("Mostrar abierta al inicio:"); ?>
				    <?php echo cls_HTML::html_select("cmb_showflag", array(0 => 'No', 1 => 'Sí'), "cmb_showflag", "combo", 10, "", ""); ?>
				    <br />
				</div>
			 </fieldset>
	 		 <div id="action_buttons_form">
			    <?php echo cls_HTML::html_input_button("button","btn_save","btn_save","button","Guardar",9,"","onclick=\"$('#frm_file').attr('novalidate','novalidate');$('#b1').click();insert_datafile();\""); ?>
			    <?php echo cls_HTML::html_input_button("button","btn_cancel","btn_cancel","button","Cancelar",12,"","onclick=\"$('#frm_file').attr('novalidate','novalidate');showclose_form_datafile(this,0);\""); ?>
			    <br />
		   </div>
		    <?php echo cls_HTML::html_form_end(); ?>
		</div>
    </div>
    <div id="inactive_base"></div>
</body>
</html>