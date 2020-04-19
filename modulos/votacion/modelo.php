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
			),
			"ocupante"	    =>array(
			    "title"             => "Ocupante",
				"title_filter"		=> "Ocupante",
			    "type"              => "input",
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
			"adcripcion2"	    =>array(
			    "title"             => "Adscripcion",
			    "type"              => "input",
			),			

		);				
		##############################################################################	
		##  Metodos	
		##############################################################################
        

	}
?>
