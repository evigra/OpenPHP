<?php
	class rh_reclamacion extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu=array();
		var $sys_fields		=array( 
			"id"	    =>array(
			    "title"             => "id",
			    "type"              => "primary key",			  
			),
			/*
			"company_id"	    =>array(
			    "title"             => "Empresa",
			    "titleShow"         => "no",			    
			    "description"       => "Responsable del dispositivo",
			    "type"              => "autocomplete",
			    "procedure"       	=> "__AUTOCOMPLETE",
			    "relation"          => "many2one",
			    "recursive"         => "2",
			    "class_name"       	=> "company",
			    "class_field_l"    	=> "nombre",				# Label
			    "class_field_o"    	=> "company_id",
			    "class_field_m"    	=> "id",			    
			),
			*/			
			"plaza_id"	    =>array(
			    "title"             => "plaza",
				"title_filter"		=> "Matricula",
			    "type"              => "input",
			    "import"            => "10",			  
			),
            
			"files_biometrico"	    =>array(
			    "title"             => "Biometrico",
			    "type"              => "file",
			    "relation"          => "many2one",
			    "class_name"       	=> "files",
			    "class_field_o"    	=> "files_biometrico",
			    "class_field_m"    	=> "id",	
			),
			"files_tarjeton"	    =>array(
			    "title"             => "Tarjeton",
			    "type"              => "file",
			    "relation"          => "many2one",
			    "class_name"       	=> "files",
			    "class_field_o"    	=> "files_tarjeton",
			    "class_field_m"    	=> "id",	
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

			"fecha_queja"	    =>array(
			    "title"             => "Fecha",
			    "type"              => "date",
			),			
			"tipo_queja"	    =>array(
			    "title"             => "Tipo",
			    "type"              => "select",
			    "source"            => array(
    			    " "=>"Selecciona una opcion",
                    "32"=>"32 Falta",
                    "33"=>"33 Falta",
                    "txt"=>"Txt Falta",			    			    
			    ),
			),			
			"descripcion_queja"	    =>array(
			    "title"             => "Descripcion",
			    "type"              => "input",
			),			


		);				
		##############################################################################	
		##  Metodos	
		##############################################################################
		
   		public function __SAVE($datas=NULL,$option=NULL)
    	{
    	    #$option=array("echo");
            #$this->__PRINT_R($datas);
            
            
            
            return parent::__SAVE($datas);	
        }
   		public function __REPORT($option=NULL)
    	{
    	    $option["select"]=array();
    	    
			#if($this->__NIVEL_SESION(">=20")==true)	 // NIVEL ADMINISTRADOR 			
			{	
			    $option["select"][]                     ="v.ads_progra";
			    $option["select"][]                     ="v.todos";								
			    $option["select"][]                     ="v.votos";
			    $option["select"][]                     ="v.faltantes";
			    $option["from"]                        ="
			    (
                    SELECT
                    p.ads_progra as ads_progra, 
                    count(p.ads_progra) as todos, 
                    count(v.ads_progra) as votos,   
                    count(p.ads_progra) - count(v.ads_progra) as faltantes 
                    FROM plazas p LEFT JOIN votacion v ON v.matricula=p.matricula  
                    WHERE 1=1 and !(p.ads_progra ='' OR p.ads_progra ='#N/D')  
                    GROUP BY p.ads_progra 
                    HAVING todos>5
                    ORDER BY count(p.ads_progra) DESC                    
                ) v    
			    ";		 
			}		
			return $this->__VIEW_REPORT($option);
		}				
   		public function __VIEW_REPORT($option=NULL)
    	{
			return parent::__VIEW_REPORT($option);
		}				


	}
?>
