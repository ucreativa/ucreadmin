﻿<?php

   require_once( __CLS_PATH . "cls_remdatabase.php");

	class cls_Event {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_RDatabase($_SESSION['DB']);
	   } 	
	 
	   public function get_eventdata($id_event){

			$result=$this->data_provide->sql_execute("SELECT tbl_events.event_id,
															tbl_events.event_title,
															tbl_events.event_description,
															tbl_events.event_url,
															tbl_events.event_status
															FROM tbl_events
															WHERE tbl_events.event_id = " . $id_event);

			return $this->data_provide->sql_get_rows($result);
      } 
      
      public function insert_eventdata($eventdata = array()){
      
	      $success=false; 
			$result=$this->data_provide->sql_execute("INSERT INTO tbl_events
														   (event_title,
															event_description,
                                             event_url,
                                             event_status,
                                             event_created,
                                             event_modified)
															VALUES ('" . $eventdata[1] . "','" . $eventdata[2] . "','" . $eventdata[3] . "',
																	'" . $eventdata[4] . "','" . date('Y-m-d') . "','" . date('Y-m-d') . "')");
			if($result){
				$success=true;
			}
			
			 return $success;
      }
      
      public function update_eventdata($eventdata = array(),$id_event){
	   
	      $success=false;
			$result=$this->data_provide->sql_execute("UPDATE tbl_events
															      SET event_title = '" . $eventdata[1] . "',
																	event_description = '" . $eventdata[2] . "',
																	event_url = '" . $eventdata[3] . "',
		                                             event_status = '" . $eventdata[4] . "',
		                                             event_modified = '" . date('Y-m-d') . "'
																	WHERE tbl_events.event_id = " . $id_event);
			if($result){
				$success=true;
			}
			
	      return $success;                      		                          
      }     

	}
	
?>