<?php
	class users_registro extends users
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu=array();
		var $sys_table		="users";
		##############################################################################	
		##  Metodos	
		##############################################################################
		public function __CONSTRUCT($option=null)
		{	
		    
			parent::__CONSTRUCT($option);
			$this->sys_fields_l18n["email"]="Matricula";
		}
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
    		## GUARDAR USUARIO
    		if(count($datas)>2)
    		{
			    $datas["company_id"]    	=$_SESSION["company"]["id"];
			    if(isset($datas["password"]) AND $datas["password"]!="")
				    $datas["password"]		=md5($datas["password"]);
				else
					unset($datas["password"]);    
			    /*
			    $files_id					=$this->obj_files_id->__SAVE();    	    
			    if(!is_null($files_id))		$datas["files_id"]			=$files_id;    	    
				*/
			    return parent::__SAVE($datas,$option);
		    }
		}

	}
?>
