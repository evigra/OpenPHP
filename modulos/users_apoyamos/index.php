<?php	
	$objeto											=new users_apoyamos();
	
	# TEMPLATES O PLANTILLAS ELEJIDAS PARA EL MODULO
	$objeto->words["system_body"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_body");	
	$objeto->words["system_module"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_module");
	
	# CARGA DE ARCHIVOS EXTERNOS JS, CSS
	$objeto->words["html_head_js"]	=	$objeto->__FILE_JS();
	#$objeto->words["html_head_css"]	=	$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));
		
	$module_center	="";	
	$module_left	="";
    $module_right	="";
        
    $module_title	="";

	
	# TITULO DEL MODULO
	$module_title                	=	"Crear ";


	# CARGANDO VISTA Y CARGANDO CAMPOS A LA VISTA
	$option										=array();
	$data										=$objeto->__VIEW_KANBAN($option);		
	$objeto->words["module_body"]				=$data["html"];
    	    
    
	$objeto->words["module_title"]              ="$module_title Usuarios";
	
	$objeto->words["module_left"]               ="";
	$objeto->words["module_center"]             ="";
	$objeto->words["module_right"]              ="";
	
	$objeto->words["html_head_description"]	=	"Todos formamos parte de nuestra del proyecto, y apoyamos a RML en el SNTSS Colima";
	$objeto->words["html_head_keywords"] 	=	"SNTSS, IMSS";

	$objeto->words["html_head_title"]           ="{$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
