﻿﻿<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreauth/global.php");

    class cls_Message {
    	  
        function __construct(){
        }
        
        public function show_message($text,$type){
        	  echo "<div class='msg_box' id='" . $type . "'><span>" . $text . "</span></div>";
        }

    }

?>﻿