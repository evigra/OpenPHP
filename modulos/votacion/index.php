<?php	
	$objeto											=new votacion();
	$objeto->__SESSION();
	
	$objeto->__PRINT_R($_SESION);
	
	
	# CARGANDO PLANTILLAS GENERALES
	$objeto->words["system_body"]               	=$objeto->__TEMPLATE($objeto->sys_html."system_body"); 		
	$objeto->words["system_module"]             	=$objeto->__TEMPLATE($objeto->sys_html."system_module");	
	
	# CARGANDO ARCHIVOS PARTICULARES		
	$objeto->words["html_head_js"]              	=$objeto->__FILE_JS();
	$objeto->words["html_head_css"]             	=$objeto->__FILE_CSS();
		
	$module_left		="";	
	$module_right		="";	
	$module_center		="";
	
	$module_title									="";
	
    if($objeto->sys_private["section"]=="write")
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
    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE();	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
    		    
    	$module_title								="Modificar ";
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
    	$option										=array();
		$data										=$objeto->__VIEW_KANBAN($option);		
		$objeto->words["module_body"]				=$data["html"];
    }    
    elseif($objeto->sys_private["section"]=="report")
    {
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    #array("report"=>"Reporte"),
		);

		$module_center=array(
		    array("import"=>"Importar"),
		);    

		#CARGANDO VISTA PARTICULAR Y CAMPOS
		$option=array();
		$data										= $objeto->__VIEW_REPORT($option);		
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de ";
    
    }
    else
    {
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
    
	$objeto->words["module_title"]              ="$module_title Voto";
	
	
	
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             =$objeto->__BUTTON($module_center);
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);
	
	$objeto->words["html_head_description"]	=	"Registra tu voto con una foto, para poder defender tus derechos";
	$objeto->words["html_head_keywords"] 	=	"SNTSS, IMSS";

	$objeto->words["html_head_title"]           ="{$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
