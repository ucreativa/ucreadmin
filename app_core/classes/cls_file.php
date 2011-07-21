﻿<?php

   require_once( __CLS_PATH . "cls_database.php");
   require_once( __CLS_PATH . "cls_remdatabase.php");

	class cls_File { 
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_RDatabase();
	   } 	
	 
	   public function get_filedata($id_file){    
	   
			$result=$this->data_provide->sql_execute("SELECT tbl_files.file_id,
																	tbl_files.generic_id,
																	tbl_files.file_key,
																	tbl_files.file_name,
																	tbl_files.file_description,
																	tbl_files.file_author,
																	tbl_files.file_date,
																	tbl_files.file_type,
																	tbl_files.file_first,
																	tbl_files.file_status
																	FROM tbl_files
																	WHERE tbl_files.file_id = " . $id_file);
			                      		                          
			return $this->data_provide->sql_get_rows($result);
      } 
      
      public function insert_filedata($filedata = array()){ 
      
	      $success=false; 
			$result=$this->data_provide->sql_execute("INSERT INTO tbl_files 
																   (generic_id,
																	 file_key,
																	 file_name,
																	 file_description,
																	 file_author,
																	 file_date,
																	 file_type,
																	 file_first,
																	 file_status
                                                    file_created,
                                                    file_modified)
																	 VALUES (" . $filedata[1] . ",'" . $filedata[2] . "','" . $filedata[3] . "',
																				'" . $filedata[4] . "','" . $filedata[5] . "','" . $filedata[6] . "',
																	         '" . $filedata[7] . "','" . $filedata[8] . "','" . $filedata[9] . "',
																	         '" . date('d-m-Y') . "','" . date('d-m-Y') . "')");
			if($result){
				$success=true;
			}
			
			 return $success;		                      		                          
      }
      
      public function update_filedata($filedata = array(),$id_file){ 
	   
	      $success=false; 
			$result=$this->data_provide->sql_execute("UPDATE tbl_sections 
																   SET generic_id = " . $filedata[1] . ",
																	file_key = '" . $filedata[2] . "',
																	file_name = '" . $filedata[3] . "',
																	file_description = '" . $filedata[4] . "',
																	file_author = '" . $filedata[5] . "',
																	file_date = '" . $filedata[6] . "',
                                                   file_type = '" . $filedata[7] . "',
                                                   file_first = '" . $filedata[8] . "',
                                                   file_status = '" . $filedata[9] . "',
                                                   file_modified = '" . date('Y-m-d H:i:s') . "'
																	WHERE tbl_files.files_id = " . $id_data);
			if($result){
				$success=true;
			}
			
	      return $success;                      		                          
      }     

	}
	
?>