﻿<?php
  $myhost="http://localhost";
  $myproject="ucreauth";
  $mysite=$myhost . "/" . $myproject;
  
  define('__ROOT__', $_SERVER["DOCUMENT_ROOT"]);
  define('__SITE_PATH', $mysite);
  
  define('__CLS_PATH', __ROOT__ . "/" . $myproject . "/app_core/classes/");
  define('__MOD_PATH', __ROOT__ . "/" . $myproject . "/app_core/modules/");
  define('__VWS_PATH', __ROOT__ . "/" . $myproject . "/app_core/views/");
  define('__VWS_HOST_PATH', $mysite . "/app_core/views/");
  define('__CTR_PATH', __ROOT__ . "/" . $myproject . "/app_core/controllers/");
  define('__CTR_HOST_PATH', $mysite . "/app_core/controllers/");  
  
  define('__RSC_HOST_PATH', $mysite . "/app_core/resources/");
  define('__RSC_PHO_HOST_PATH', $mysite . "/app_core/resources/photos/");
  define('__RSC_DOC_HOST_PATH', $mysite . "/app_core/resources/documents/");
  define('__RSC_IMG_HOST_PATH', $mysite . "/app_core/resources/images/");
   
  define('__CONN_PATH', __ROOT__ . "/" . $myproject . "/app_conn/");

  define('__JS_PATH', $mysite . "/app_design/js/");
  define('__CSS_PATH', $mysite . "/app_design/css/");
  define('__IMG_PATH', $mysite . "/app_design/img/");
  
  require_once(__CLS_PATH . "cls_message.php");
?>