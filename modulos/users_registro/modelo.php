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
            $this->sys_fields["files_id"]["agua"]=1;


			parent::__CONSTRUCT($option);
		}
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
    		## GUARDAR USUARIO
    		if(count($datas)>2)
    		{
			    $datas["company_id"]    	=1;
			    $datas["status"]    	    =1;
			    $datas["sesion_start"]    	="../votacion/";
			    if(isset($datas["password"]) AND $datas["password"]!="")
				    $datas["password"]		=md5($datas["password"]);
				else
					unset($datas["password"]);    

                if($datas["celular"]!="")
                {	
                    $vars["telefono"]   =$datas["celular"];                    
	                $vars["mensaje"]	="Muchas gracias <b>VIZCAINO GRANADOS EDUARDO</b> por apoyarnos. 
	                
Con tu voto, el equipo SolesGPS tambien podra ayudar para hacer valer tu eleccion sindical SNTSS.
	                ";
	                $this->__WA($vars);
	            }
		        return parent::__SAVE($datas,$option);
	        }
		}
	}
?>
