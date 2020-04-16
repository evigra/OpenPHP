<?php
	class plazas extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu=array();
        /*
		var $sys_import			=array(
			"type"		=>"replace",
			"fields"	=>"|",
			"enclosed"	=>"\"",
			"lines"		=>"\\n",
			"ignore"	=>"1",
		);
		*/		
		var $sys_fields		=array( 
			"matricula"	    =>array(
			    "title"             => "Matricula",
				"title_filter"		=> "Matricula",
			    "type"              => "primary key",
			    "import"            => "10",			  
			),
			"nombre"	    =>array(
			    "title"             => "Nombre",
				"title_filter"		=> "Trabajador",
			    "type"              => "input",
			),
			"puesto_id"	    =>array(
			    "title"             => "Puesto ID",
			    "type"              => "input",
			),
			"puesto"	    =>array(
			    "title"             => "Puesto",
				"title_filter"		=> "Puesto",
			    "type"              => "input",
			),			
		);				
		##############################################################################	
		##  Metodos	
		##############################################################################     
		public function __CONSTRUCT()
		{
		    #$this->__PRINT_R($_FILES);
		    #$this->__PRINT_R($this);
			parent::__CONSTRUCT();			
		}
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
    		#$this->__PRINT_R($datas);
    		#$option=array("echo"=>"SAVE");
    	    return parent::__SAVE($datas,$option);
		}				
	}
?>
