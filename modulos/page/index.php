<?php	
	$objeto											=new page();


	$objeto->__SESSION();
	
	# TEMPLATES O PLANTILLAS ELEJIDAS PARA EL MODULO
	$objeto->words["system_body"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_body");	
	$objeto->words["system_module"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_module");
	
	# CARGA DE ARCHIVOS EXTERNOS JS, CSS
	$objeto->words["html_head_js"]	=	$objeto->__FILE_JS(array("../".$objeto->sys_module."js/index"));
	#$objeto->words["html_head_css"]	=	$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));
		
	$module_center	="";	
	$module_left	="";
    $module_right	="";
        
    $module_title	="";
	
    if($objeto->sys_section=="create")
	{
		# TITULO DEL MODULO
		$module_title                	=	"Crear ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
		$module_left=array(
			array("action"=>"Guardar"),
			array("cancel"=>"Cancelar"),
		);
		$module_right=array(
			#array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			array("kanban"=>"Kanban"),
			array("report"=>"Reporte"),
		);

		# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
		$objeto->words["module_body"]				=$objeto->__VIEW_CREATE($objeto->sys_module."html/create");	    	
		$objeto->words               				=$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	
    	#$objeto->words["permisos"]	            	=$objeto->menu_obj->grupos_html();
    	#$objeto->words["flotilla"]	            	=$objeto->device_obj->devices_user();
    }	
    elseif($objeto->sys_section=="write")
	{
		# TITULO DEL MODULO
		$module_title                	=	"Modificar ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
		$module_left=array(
			array("action"=>"Guardar"),
			array("cancel"=>"Cancelar"),
		);
		$module_right=array(
			#array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			array("kanban"=>"Kanban"),
			array("report"=>"Reporte"),
		);

		# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
		$objeto->words["module_body"]				=$objeto->__VIEW_WRITE($objeto->sys_module."html/write");	 
		$objeto->words               				=$objeto->__INPUT($objeto->words,$objeto->sys_fields);    
    	
    	#$objeto->words["permisos"]	            	=$objeto->menu_obj->grupos_html(@$objeto->sys_fields["usergroup_ids"]["values"]);
    	#$objeto->words["flotilla"]	            	=$objeto->device_obj->devices_user($objeto->sys_primary_id);
    	
    	#if(isset($objeto->sys_fields["files_id"]["value"]))    	
	    #	$objeto->words["img_files_id"]	            =$objeto->files_obj->__GET_FILE($objeto->sys_fields["files_id"]["value"]);
	    #else	$objeto->words["img_files_id"]="";	
	    
    	$module_title								="Modificar ";
    }	
	elseif($objeto->sys_section=="kanban")
	{
		# TITULO DEL MODULO
    	$module_title                	=	"Reporte Modular de ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
    	$module_right=array(
			array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			#array("kanban"=>"Kanban"),
			array("report"=>"Reporte"),
	    );

		# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
		$template_body								=	$objeto->sys_module."html/kanban";	
	   	$data										=$objeto->users();
    	$objeto->words["module_body"]               =$objeto->__VIEW_KANBAN($template_body,$data["data"]);	
    }        
	elseif($objeto->sys_section=="report")
	{
		# TITULO DEL MODULO
    	$module_title                	=	"Reporte de ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
    	$module_right=array(
			array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			array("kanban"=>"Kanban"),
			#array("report"=>"Reporte"),
	    );
	    
	    # CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA  
		$option     								=	array();
		$option["template_title"]					=	$objeto->sys_module."html/report_title";
		$option["template_body"]					=	$objeto->sys_module."html/report_body";
		
		$data										=$objeto->__VIEW_REPORT($option);
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de ";
    }
	else
	{
		# TITULO DEL MODULO
    	$module_title                	=	"Reporte de ";

		# PRECARGANDO LOS BOTONES PARA LA VISTA SELECCIONADA
    	$module_right=array(
			array("create"=>"Crear"),
			#array("write"=>"Modificar"),
			array("kanban"=>"Kanban"),
			#array("report"=>"Reporte"),
	    );
	    
	    # CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA  
		$option     								=	array();
		$option["template_title"]					=	$objeto->sys_module."html/report_title";
		$option["template_body"]					=	$objeto->sys_module."html/report_body";
		
		$data										=$objeto->__VIEW_REPORT($option);
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de ";
	    $objeto->html                               =$objeto->__VIEW_TEMPLATE("nosystem", $objeto->words);
	    $objeto->__VIEW($objeto->html);    
		exit();
    }    
    
	$objeto->words["module_title"]              ="$module_title Page";
	
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             ="";
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);
	
	$objeto->words["html_head_description"]	=	"EN LA EMPRESA SOLESGPS, CONTAMOS CON UN MODULO PARA ADMINISTRAR EL REGISTRO DE USUARIOS DE LA PLATAFORMA DE RASTREO.";
	$objeto->words["html_head_keywords"] 	=	"GPS, RASTREO, MANZANILLO, SATELITAL, CELULAR, VEHICULAR, VEHICULO, TRACTO, LOCALIZACION, COLIMA, SOLES, SATELITE, GEOCERCAS, STREET VIEW, MAPA";

	$objeto->words["html_head_title"]           ="SOLES GPS :: {$_SESSION["company"]["razonSocial"]} :: {$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
