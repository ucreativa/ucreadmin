﻿﻿<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once( __CLS_PATH . "cls_html.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>Acceso Denegado</title>
    <style type="text/css">
       
        #acces_denied
        {
          position:relative; 
          width: 180px; 
          height: 20px;
          margin:15em auto; 
          padding: 10px; 
          border: 1px solid #999999; 
          font-size: 14px;
          font-family: Century Gothic,Segoe UI,verdana,arial,helvetica,sans-serif;
          font-weight: bold;
          -moz-border-radius: 5px;
          -webkit-border-radius: 5px;
          border-radius: 5px;
          color: #555555;
        }
        
        .acces_den{
        	  margin-right:15px;
        	}

    </style>
</head>
<body >
        <div id="acces_denied">
          <?php echo cls_HTML::html_img_tag(__IMG_PATH . "alert_16.png", "alert", "acces_den", "alert","") ?><span>Acceso Denegado</span>
        </div>
</body>
</html>

