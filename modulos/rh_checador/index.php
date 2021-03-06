<?php		
	$objeto											=new rh_checador();		
	
	#$objeto->__SESSION();

	
	# CARGANDO PLANTILLAS GENERALES
	$objeto->words["system_body"]               	=$objeto->__TEMPLATE($objeto->sys_html."system_body"); 		
	$objeto->words["system_module"]             	=$objeto->__TEMPLATE($objeto->sys_html."system_module");	
	
	# CARGANDO ARCHIVOS PARTICULARES		
	$objeto->words["html_head_js"]              	=$objeto->__FILE_JS();
	#$objeto->words["html_head_css"]             	=$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));
		
	$module_left		="";	
	$module_right		="";	
	$module_center		="";	
	
	$module_title									="";
	
	
    if($objeto->sys_private["section"]=="create")
	{
		#$objeto->BAJAR_CHECADAS();
		
		#BOTONES SECCION IZQUIERDA
		$module_left=array(
		    array("action"=>"Guardar"),
		    array("cancel"=>"Cancelar"),
		);
		#BOTONES SECCION DERECHA
		$module_right=array(
		    #array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
		
		$module_title								="Crear ";
    	$objeto->words["module_body"]               =$objeto->__VIEW_CREATE();	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	
    }	
    elseif($objeto->sys_private["section"]=="write")
	{
		#BOTONES SECCION IZQUIERDA
		$module_left=array(
		    array("action"=>"Guardar"),
		    array("cancel"=>"Cancelar"),
		);

		#if($objeto->__NIVEL_SESION("<=20")==true)	 // NIVEL ADMINISTRADOR 
		{
			$module_center=array(
				array(
					"action_aprovar"	=>"Descargar Checadas",
					"icon"				=>"ui-icon-arrowthickstop-1-s",
				),								
			);	    			
			$module_center=array(
				array(
					"bajar_checadas"	=>"Descargar Checadas",
					"icon"				=>"ui-icon-arrowthickstop-1-s",
				),								
			);	    			
			
		}
		#$objeto->__PRINT_R($objeto->request);	
		
		
		
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);		
		#CARGANDO VISTA PARTICULAR Y CAMPOS
    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE();	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
	
	    
    	$module_title								="Modificar ";
		
    }	
    elseif($objeto->sys_private["section"]=="show")
	{		
		#BOTONES SECCION IZQUIERDA
		$module_left=array(
		    array("action"=>"Guardar"),
		    array("cancel"=>"Cancelar"),
		);
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);		
		#CARGANDO VISTA PARTICULAR Y CAMPOS
		

		$option["template_title"]	                =$objeto->checadas->sys_module . "html/report_title";
		$option["template_body"]	                =$objeto->checadas->sys_module . "html/report_body";		
		$option["where"]							=array(
			"fecha='" . date("Y-m-d")."'",
			"ip='{$objeto->sys_fields["ip"]["value"]}'"
		);
		#$option["echo"]							="PRUEBA";
		
		$data										=$objeto->checadas->__VIEW_REPORT($option);
		
		$objeto->words["checadas"]					=$data["html"];
		
		
    	$objeto->words["module_body"]               =$objeto->__VIEW_SHOW($objeto->sys_module . "html/show");	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
    		    
    	$module_title								="Formato ";
		
		
		
    }	

	elseif($objeto->sys_private["section"]=="kanban")
	{
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
	
		#CARGANDO VISTA PARTICULAR Y CAMPOS
		$template_body								=$objeto->sys_module . "html/kanban";
	   	$data										=$objeto->__BROWSE();
    	$objeto->words["module_body"]               =$objeto->__VIEW_KANBAN($template_body,$data["data"]);	
    }    
    else
    {
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),		    
		);

		#CARGANDO VISTA PARTICULAR Y CAMPOS
		
				
		$data										= $objeto->__VIEW_REPORT($option);		
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de ";
    }
    

    
	$objeto->words["module_title"]              ="$module_title Checador";
	
	
	
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             =$objeto->__BUTTON($module_center);
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);
	
	$objeto->words["html_head_description"]	=	"EN LA EMPRESA SOLESGPS, CONTAMOS CON UN MODULO PARA ADMINISTRAR EL REGISTRO DE USUARIOS DE LA PLATAFORMA DE RASTREO.";
	$objeto->words["html_head_keywords"] 	=	"GPS, RASTREO, MANZANILLO, SATELITAL, CELULAR, VEHICULAR, VEHICULO, TRACTO, LOCALIZACION, COLIMA, SOLES, SATELITE, GEOCERCAS, STREET VIEW, MAPA";

	$objeto->words["html_head_title"]           ="IMSS	 :: {$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    

?>
