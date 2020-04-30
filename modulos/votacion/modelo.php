<?php
	class votacion extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu=array();
		var $sys_fields		=array( 
			"plaza_id"	    =>array(
			    "title"             => "plaza",
				"title_filter"		=> "Matricula",
			    "type"              => "primary key",
			    "import"            => "10",			  
			),
			"files_id"	    =>array(
			    "title"             => "Imagen",
			    "type"              => "file",
			    "relation"          => "many2one",
			    "class_name"       	=> "files",
			    "class_field_o"    	=> "files_id",
			    "class_field_m"    	=> "id",	
			    #"agua"    	        => "1",
			    "facebook"    	    => "1",
			    	
			    
			),
			"matricula_titular"	    =>array(
			    "title"             => "Matricula Titular",
				"title_filter"		=> "Matricula Titular",
			    "type"              => "input",
			),
			"nombre_titular"	    =>array(
			    "title"             => "Nombre Titular",
				"title_filter"		=> "Nombre Titular",
			    "type"              => "input",
			),
			"matricula"	    =>array(
			    "title"             => "Matricula",
			    "title_filter"		=> "Matricula",
			    "type"              => "input",
  			    "style"             => array(			    	
					"color"			=>array("red"=>"1==1"),
					"font-size"		=>array("25px"=>"1==1"),					
			    ),			    			    

			),
			"ocupante"	    =>array(
			    "title"             => "Ocupante",
				"title_filter"		=> "Ocupante",
			    "type"              => "input",
	    	    "attr"            	=> array(					
			    	"readonly"		=>"readonly"
			    ),			    			    
  			    "style"             => array(			    	
					"color"			=>array("red"=>"1==1"),
					"font-size"		=>array("25px"=>"1==1"),					
			    ),			    			    

			),			
			"categoria"	    =>array(
			    "title"             => "Categoria",
				"title_filter"		=> "Categoria",
			    "type"              => "input",
			),			
			"jornada"	    =>array(
			    "title"             => "Jornada",
			    "type"              => "input",
			),			
			"horario"	    =>array(
			    "title"             => "Horario",
			    "type"              => "input",
			),			
			"ar2"	    =>array(
			    "title"             => "Departamento",
			    "type"              => "input",
			),			
			"adscripcion2"	    =>array(
			    "title"             => "Jefatura",
			    "type"              => "input",
			),			
			"ads_progra"	    =>array(
			    "title"             => "Adscripcion",
			    "type"              => "input",
			),			

		);				
		##############################################################################	
		##  Metodos	
		##############################################################################
		
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
    	    /*
            $uploads_dir 			= 'modulos/files/file';

            $path					="modulos/files/file/lalo.png";            
            $this->sys_fields["files_id"]["obj"]->thumbs($path);
            */
            return parent::__SAVE($datas);
        }

	}
?>
