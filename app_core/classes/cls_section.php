﻿<?php

   require_once( __CLS_PATH . "cls_database.php");
   require_once( __CLS_PATH . "cls_remdatabase.php");

	class cls_Section { 
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_RDatabase();
	   } 	
	 
	   public function get_sectiondata($id_section){    
	   
			$result=$this->data_provide->sql_execute("SELECT tbl_sections.section_id,
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
																   (section_key,
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
																	 VALUES ('" . $sectiondata[1] . "','" . $sectiondata[2] . "','" . $sectiondata[3] . "',
																				'" . $sectiondata[4] . "','" . $sectiondata[5] . "','" . $sectiondata[6] . "',
																	         '" . $sectiondata[7] . "','" . $sectiondata[8] . "','" . $sectiondata[9] . "',
																	         '" . $sectiondata[10] . "','" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "')");
			if($result){
				$success=true;
			}
			
			 return $success;		                      		                          
      }
      
      public function update_sectiondata($sectiondata = array(),$id_section){ 
	   
	      $success=false; 
			$result=$this->data_provide->sql_execute("UPDATE tbl_sections 
																   SET section_key = '" . $sectiondata[1] . "',
																	section_name = '" . $sectiondata[2] . "',
																	section_title = '" . $sectiondata[3] . "',
																	section_subtitle = '" . $sectiondata[4] . "',
																	section_description = '" . $sectiondata[5] . "',
																	section_text = '" . $sectiondata[6] . "',
                                                   section_showflag = '" . $sectiondata[7] . "',
                                                   section_urlblog = '" . $sectiondata[8] . "',
                                                   section_keywords = '" . $sectiondata[9] . "',
                                                   section_status = '" . $sectiondata[10] . "',
                                                   section_modified = '" . date('Y-m-d H:i:s') . "'
																	WHERE tbl_sections.section_id = " . $id_section);
			if($result){
				$success=true;
			}
			
	      return $success;                      		                          
      }     

	}
	
?>