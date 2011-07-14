﻿<?php

   require_once( __CLS_PATH . "cls_database.php");

	class cls_Section { 
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();	   
	   } 	
	 
	   public function get_sectiondata($id_section){    
	   
			$result=$this->data_provide->sql_execute("SELECT tbl_sections.section_id,
																	tbl_sections.tag_fk,
																	tbl_sections.section_key,
																	tbl_sections.section_name,
																	tbl_sections.section_title,
																	tbl_sections.section_subtitle,
																	tbl_sections.section_description,
																	tbl_sections.section_text,
																	tbl_sections.section_showflag,
																	tbl_sections.section_urlblog,
																	tbl_sections.section_keywords,
																	tbl_sections.section_status
																	FROM tbl_sections
																	WHERE tbl_sections.section_id = " . $id_section);
			                      		                          
			return $this->data_provide->sql_get_rows($result);
      } 
      
      public function insert_sectiondata($sectiondata = array()){ 
      
	      $success=false; 
			$result=$this->data_provide->sql_execute("INSERT INTO tbl_sections 
																   (tag_fk,
																	 section_key,
																	 section_name,
																	 section_title,
																	 section_subtitle,
																	 section_description,
																	 section_text,
                                                    section_showflag,
                                                    section_urlblog,
                                                    section_keywords,
                                                    section_status,
                                                    section_created,
                                                    section_modified)
																	 VALUES ('" . $userdata[0] . "','" . $userdata[1] . "','" . $userdata[2] . "',
																				'" . $userdata[3] . "','" . $userdata[4] . "','" . $userdata[5] . "',
																	         '" . $userdata[6] . "','" . $userdata[7] . "','" . $userdata[8] . "',
																	         '" . $userdata[9] . "','" . $userdata[10] . "'," . $userdata[11] . ",
																	         " . $userdata[12] . ")");
			if($result){
				$success=true;
			}
			
			 return $success;		                      		                          
      }
      
      public function update_sectiondata($userdata = array(),$id_section){ 
	   
	      $success=false; 
			$result=$this->data_provide->sql_execute("UPDATE tbl_sections 
																   SET tag_fk = '" . $userdata[0] . "',
																   section_key = '" . $userdata[1] . "',
																	section_name = '" . $userdata[2] . "',
																	section_title = '" . $userdata[3] . "',
																	section_subtitle = '" . $userdata[4] . "',
																	section_description = '" . $userdata[5] . "',
																	section_text = '" . $userdata[6] . "',
                                                   section_showflag = '" . $userdata[7] . "',
                                                   section_urlblog = '" . $userdata[8] . "',
                                                   section_keywords = '" . $userdata[9] . "',
                                                   section_status = '" . $userdata[10] . "',
                                                   section_modified = " . $userdata[12] . "
																	WHERE tbl_sections.section_id = " . $id_section);
			if($result){
				$success=true;
			}
			
	      return $success;                      		                          
      }     

	}
	
?>