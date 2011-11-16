<?php

   require_once( __CLS_PATH . "cls_remdatabase.php");

	class cls_Career {
	
	   private $data_provide;
	 	  
	   public function __construct(){
			$this->data_provide=new cls_RDatabase($_SESSION['DB']);
	   } 	
	 
	   public function get_careerdata($id_career){

			$result=$this->data_provide->sql_execute("SELECT tbl_careers.career_id,
															tbl_careers.area_fk,
															tbl_careers.career_name,
															tbl_careers.career_description,
															tbl_careers.career_text,
															tbl_careers.career_status
															FROM tbl_careers
															WHERE tbl_careers.career_id = " . $id_career);

			return $this->data_provide->sql_get_rows($result);
      } 
      
      public function insert_careerdata($careerdata = array()){
      
	      $success=false; 
			$result=$this->data_provide->sql_execute("INSERT INTO tbl_careers
														   (area_fk,
															 career_name,
															 career_description,
															 career_text,
                                              career_status,
                                              career_created,
                                              career_modified)
															 VALUES ('" . $careerdata[1] . "','" . $careerdata[2] . "','" . $careerdata[3] . "',
																	  '" . $careerdata[4] . "','" . $careerdata[5] . "','" 
																	  . date('Y-m-d') . "','" . date('Y-m-d') . "')");
			if($result){
				$success=true;
			}
			
			 return $success;
      }
      
      public function update_careerdata($careerdata = array(),$id_career){
	   
	      $success=false;
			$result=$this->data_provide->sql_execute("UPDATE tbl_careers
															      SET area_fk = '" . $careerdata[1] . "',
																	career_name = '" . $careerdata[2] . "',
																	career_description = '" . $careerdata[3] . "',
												               career_text = '" . $careerdata[4] . "',
		                                             career_status = '" . $careerdata[5] . "',
		                                             career_modified = '" . date('Y-m-d') . "'
																	WHERE tbl_careers.career_id = " . $id_career);
			if($result){
				$success=true;
			}
			
	      return $success;                      		                          
      }     

	}
	
?>