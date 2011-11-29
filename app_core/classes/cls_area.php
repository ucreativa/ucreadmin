<?php

   require_once(__CLS_PATH . "cls_remdatabase.php");

	class cls_Area {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_RDatabase($_SESSION['DB']);
	   }

	   public function get_areadata($id_area){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_areas.new_id AS id,
                                              				      tbl_areas.area_name AS name,
                                              					  tbl_areas.area_description AS description,
                                              					  tbl_areas.area_status AS status
                                              					  FROM tbl_areas
                                              					  WHERE tbl_areas.area_status = 'A'
                                                                  AND tbl_areas.area_id = ".$id_area);

			return $this->data_provide->sql_get_fetchassoc($result);
       }

       public function get_areas(){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_areas.area_id AS id,
                                              				      tbl_areas.area_name AS name,
                                              					  tbl_areas.area_description AS description,
                                              					  tbl_areas.area_status AS status
                                              					  FROM tbl_areas");

			return $this->data_provide->sql_get_rows($result);
       }

	}
	
?>