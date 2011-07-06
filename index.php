<?php	
      require_once("global.php");  
	   require_once( __CLS_PATH . "cls_html.php");
	   require_once( __CLS_PATH . "cls_kerberos.php");
?>

<html>

  <head>
      <?php
          echo cls_HTML::html_js_header(__JS_PATH . "jquery-1.4.2.min.js");
          echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
      ?>

    <title>UCREAUTH v 1.0</title>
  </head>

  <body id="login_page">
  <div>
	    <?php

		    include_once(__VWS_PATH . "/login.php");
	    ?>
 </div>
  </body>

</html>
