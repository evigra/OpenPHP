<?php	
	$objeto											=new rh_calculo();		
	$objeto->__SESSION();
	#$objeto->__PRINT_R($_SESSION);
	
	# CARGANDO PLANTILLAS GENERALES
	$objeto->words["system_body"]               	=$objeto->__TEMPLATE($objeto->sys_html."system_body"); 		
	$objeto->words["system_module"]             	=$objeto->__TEMPLATE($objeto->sys_html."system_module");	
	$objeto->words["module_body"]					="";


	
	# CARGANDO ARCHIVOS PARTICULARES		
	$objeto->words["html_head_js"]              	=$objeto->__FILE_JS();
	#$objeto->words["html_head_css"]             	=$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));

	#/*
	if(@$objeto->sys_private["id"]>0)
	{		
    	$qr_path="http://172.24.21.184/OpenPHP/rh_calculo/&sys_action=print_pdf&sys_section_rh_calculo=impresion_status&sys_action_rh_calculo=&sys_id_rh_calculo=".$objeto->sys_private["id"];
    	//$qr_path="http://localhost/OpenPHP/rh_calculo/&sys_action=print_pdf&sys_section_rh_calculo=impresion_status&sys_action_rh_calculo=&sys_id_rh_calculo=".$objeto->sys_private["id"];
    	//$qr_path="../rh_calculo/&sys_action=print_pdf&sys_section_rh_calculo=impresion_status&sys_action_rh_calculo=&sys_id_rh_calculo=".$objeto->sys_private["id"];    	    	    	    	
    	$objeto->words["qr_calculo"]	=$objeto->__QR($qr_path);
	}
	#*/	
	$module_left		="";	
	$module_right		="";	
	$module_center		="";	
	
	$module_title									="";
	
	if($objeto->sys_private["section"]=="create")
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
    elseif($objeto->sys_private["section"]=="impresion_sindicato")
	{
		$objeto->sys_fields["trabajador_nombre"]["type"]	="value";
		$objeto->sys_fields["trabajador_clave"]["type"]		="value";
		$objeto->sys_fields["elaboro"]["type"]				="value";
		$objeto->sys_fields["m_elaboro"]["type"]			="value";

	
		$template=$objeto->sys_var["module_path"]."html/".$objeto->sys_private["section"];
    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE($template);	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
    }	
    elseif($objeto->sys_private["section"]=="impresion_status")
	{
		$template=$objeto->sys_var["module_path"]."html/".$objeto->sys_private["section"];
    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE($template);	
    	$objeto->words                  =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
    }	

    elseif($objeto->sys_private["section"]=="write")
	{
		#BOTONES SECCION IZQUIERDA
		$module_left=array(
		    array("action"=>"Guardar"),
		    array("cancel"=>"Cancelar"),
		);

		if($objeto->__NIVEL_SESION("<=20")==true)	 // NIVEL ADMINISTRADOR 
		{
			$module_center=array(
				array("action_aprovar"=>"Aprovar"),
				array("action_cancelar"=>"Cancelar"),
			);	    			
		}		
		if($objeto->__NIVEL_SESION("<=20")==true AND $objeto->sys_fields["estatus"]["value"]=="APROVADO")	 // NIVEL ADMINISTRADOR 
		{
			$module_center[]=array("action_incumplir"=>"Incumplido");			
		}		
		
		
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

		#$objeto->__PRINT_R($objeto->words["html_head_js"]);	

    		    							
		
		#$objeto->__GENERAR_PDF();

		
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
    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE();	
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
    elseif($objeto->sys_private["section"]=="report_especifico")
    {
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);

		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_ESPECIFICO();		
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte Especifico de ";
    }    
    elseif($objeto->sys_private["section"]=="report_general")
    {
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);

		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_GENERAL();		
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte General de ";
    }
    elseif($objeto->sys_private["section"]=="report_pendiente")
    {
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);

		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_PENDIENTE();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }
    elseif($objeto->sys_private["section"]=="report_aprovados")
    {
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);

		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_APROVADO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte Aprovados de ";
    }
    elseif($objeto->sys_private["section"]=="report_cancelados")
    {
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);

		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_CANCELADOS();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Cancelados de ";
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
		#$option["template_title"]	                = $objeto->sys_module . "html/report_estatus_title";
		#$option["template_body"]	                = $objeto->sys_module . "html/report_estatus_body";
		
				
		$data										= $objeto->__REPORTE();		
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de ";
    }
    

    if($objeto->__NIVEL_SESION("<=20")==true)	 // NIVEL ADMINISTRADOR 
    {
    	$module_right_admin=array(
		    array("report_pendiente"=>"","icon"=>"ui-icon-help"),
		    array("report_cancelados"=>"","icon"=>"ui-icon-closethick"),
		    array("report_aprovados"=>"","icon"=>"ui-icon-check"),
		);	    
		$module_right=array_merge($module_right, $module_right_admin);		
	/*	
	}
    if($objeto->__NIVEL_SESION("<=10")==true)   // NIVEL SUPER ADMINISTRADOR
    {
		*/
    	$module_right_admin=array(
		    array("report_especifico"=>"R Esp."),
		    array("report_general"=>"R Gral."),
		);	    
		$module_right=array_merge($module_right, $module_right_admin);		
	}

    
	$objeto->words["module_title"]              ="$module_title Calculo";
	
	
	
	$objeto->words["biometrico"]             =$objeto->__BUTTON(array(array("ver_biometrico"=>"Ver Biometrico")));
	
	
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             =$objeto->__BUTTON($module_center);
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);
	
	$objeto->words["html_head_description"]	=	"EN LA EMPRESA SOLESGPS, CONTAMOS CON UN MODULO PARA ADMINISTRAR EL REGISTRO DE USUARIOS DE LA PLATAFORMA DE RASTREO.";
	$objeto->words["html_head_keywords"] 	=	"GPS, RASTREO, MANZANILLO, SATELITAL, CELULAR, VEHICULAR, VEHICULO, TRACTO, LOCALIZACION, COLIMA, SOLES, SATELITE, GEOCERCAS, STREET VIEW, MAPA";

	$objeto->words["html_head_title"]           ="IMSS	 :: {$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
