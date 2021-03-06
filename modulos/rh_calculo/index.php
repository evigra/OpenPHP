<?php	
	$objeto											=new rh_calculo();		

	$objeto->__SESSION();
	
	# CARGANDO PLANTILLAS GENERALES
	$objeto->words["system_body"]               	=$objeto->__TEMPLATE($objeto->sys_html."system_body"); 		
	$objeto->words["system_module"]             	=$objeto->__TEMPLATE($objeto->sys_html."system_module");	
	$objeto->words["module_body"]					="";

	
	# CARGANDO ARCHIVOS PARTICULARES		
	$objeto->words["html_head_js"]              	=$objeto->__FILE_JS();
	$objeto->words["module_title"]					="";
	#$objeto->words["html_head_css"]             	=$objeto->__FILE_CSS(array("../sitio_web/css/basicItems"));

	$module_left		="";	
	$module_right		="";	
	$module_center		=array();	
	
	$module_title									="";

	#BOTONES SECCION DERECHA
	$module_right=array(
	    array("create"=>"Crear"),
	    array("report"=>"Reporte"),
	);


	#/*
	if(@$objeto->sys_private["id"]>0)
	{		
		if($_SERVER["SCRIPT_NAME"]=="/produccion/index.php")
			$carpeta="produccion";
		else	
			$carpeta="OpenPHP";
		
	
    	$qr_path=array(
    		"text"=>"http://172.24.21.184/$carpeta/rh_calculo/&sys_action=print_pdf&sys_section_rh_calculo=impresion_status&sys_action_rh_calculo=&sys_id_rh_calculo=".$objeto->sys_private["id"],
    		"height"=>250
    	);	
    	$objeto->words["qr"]	=$objeto->__QR($qr_path);
    	$objeto->words["url_calculo"]	=$qr_path;
	}
	#*/	
	
	
	
	if($objeto->sys_private["section"]=="create")
	{
		#BOTONES SECCION IZQUIERDA
		$module_left=array(
		    array("action"=>"Guardar"),
		    array("cancel"=>"Cancelar"),
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

		$objeto->words["sys_title"]               ="SOLICITUD DE RECLAMACION";	
	
		$template=$objeto->sys_var["module_path"]."html/".$objeto->sys_private["section"];
    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE($template);	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
    }	
    elseif($objeto->sys_private["section"]=="impresion_status")
	{
		#$objeto->sys_fields["trabajador_nombre"]["type"]	="value";
		$objeto->words["sys_title"]               ="SOLICITUD DE RECLAMACION";	
		
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
		if($objeto->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
		{	
			$template=$objeto->sys_var["module_path"]."html/create";
		
			if($objeto->sys_private["action"]=="print_pdf")
			{					
				$objeto->words["sys_title"]         ="SOLICITUD DE RECLAMACION";	
				$_SESSION["pdf"]["formato"]			="sitio_web/html/PDF_FORMATO_SNTSS";
				$template=$objeto->sys_var["module_path"]."html/impresion_sindicato";
			}				
	    	$objeto->words["module_body"]           =$objeto->__VIEW_WRITE($template);	
		}				
		if($objeto->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
		{						
			$objeto->__GENERAR_PDF();
						
			$template								=$objeto->sys_var["module_path"]."html/write";					
	    	$objeto->words["module_body"]           =$objeto->__VIEW_WRITE($template);				
		}
		
		#CARGANDO VISTA PARTICULAR Y CAMPOS
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
		
    	$module_title								="Modificar ";
    }	
    elseif($objeto->sys_private["section"]=="show")
	{
		#CARGANDO VISTA PARTICULAR Y CAMPOS
    	#$objeto->words["module_body"]               =$objeto->__VIEW_WRITE();	    	
    		    
    	$module_title								="Formato ";
    	    	
    	
		$objeto->words["sys_title"]               ="SOLICITUD DE RECLAMACION";	
		#$objeto->words["sys_subtitle"]            ="Reimpresion";	
		$_SESSION["pdf"]["formato"]		="sitio_web/html/PDF_FORMATO_SNTSS_IMSS";
		$template=$objeto->sys_var["module_path"]."html/impresion_status";
		
		
		
		$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
		$objeto->words["module_body"]               =$objeto->__VIEW_WRITE($template);	
    }	

    ###################################################
    
    elseif($objeto->sys_private["section"]=="section_pendiente")
    {    		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_PENDIENTE();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }
    elseif($objeto->sys_private["section"]=="section_recibido")
    {    
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_RECIBIDO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }  
    elseif($objeto->sys_private["section"]=="section_calculo")
    {
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_CALCULO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }      
    elseif($objeto->sys_private["section"]=="section_rechazo")
    {
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_RECHAZO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }         
    elseif($objeto->sys_private["section"]=="section_procedente")
    {
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_PROCEDENTE();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }      
    elseif($objeto->sys_private["section"]=="section_improcedente")
    {
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_IMPROCEDENTE();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }      

    elseif($objeto->sys_private["section"]=="section_enviar")
    {
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_ENVIAR();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }
    elseif($objeto->sys_private["section"]=="section_enviado")
    {
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_ENVIADO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }

    ######################################################
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
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_CANCELADOS();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Cancelados de ";
    }    
    else
    {
    	#CARGANDO VISTA PARTICULAR Y CAMPOS							
		$data										= $objeto->__REPORTE();		
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de ";
    }
    ###########################################################################################################
	if($objeto->__NIVEL_SESION("==0")==true)	 // EDUARDO VIZCAINO
	{
		if(!($objeto->sys_private["section"]=="create" OR $objeto->sys_private["section"]=="write"))
		{
			$module_center[]=array("section_pendiente"		=>"Por enviar a la adscripcion",	"icon"=>"ui-icon-arrowthick-1-n", "text"=>"false");
			$module_center[]=array("section_recibido"		=>"Recibido en adscripcion",		"icon"=>"ui-icon-arrowthickstop-1-s", "text"=>"false");
			$module_center[]=array("section_calculo"		=>"Calculo Procedente",				"icon"=>"ui-icon-check" , "text"=>"false");
			$module_center[]=array("section_rechazo"		=>"Devolucion de calculo",			"icon"=>"ui-icon-arrowreturnthick-1-w", "text"=>"false" );
			$module_center[]=array("section_improcedente"	=>"Calculo Improcedente",			"icon"=>"ui-icon-closethick", "text"=>"false" , );
		}
	}				

	if($objeto->__NIVEL_SESION("==40")==true)	 // NIVEL USUAIRO DELEGACION 
	{
		$module_center[]=array("section_calculo"		=>"Por Recibir",	"icon"=>"ui-icon-arrowthick-1-s");
		$module_center[]=array("section_recibido"		=>"Recibido",		"icon"=>"ui-icon-arrowthickstop-1-s");
		
		$module_center[]=array("section_procedente"		=>"Calculo Procedente",		"icon"=>"ui-icon-check" , "text"=>"false");
		$module_center[]=array("section_rechazo"		=>"Devolucion de calculo",	"icon"=>"ui-icon-arrowreturnthick-1-w", "text"=>"false" );
		$module_center[]=array("section_improcedente"	=>"Calculo Improcedente",	"icon"=>"ui-icon-closethick", "text"=>"false" , );		
	}				
	if($objeto->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION
	{
		if(!($objeto->sys_private["section"]=="create" OR $objeto->sys_private["section"]=="write"))
		{
			$module_center[]=array("section_pendiente"		=>"Por Recibir",			"icon"=>"ui-icon-arrowthick-1-s");
			$module_center[]=array("section_recibido"		=>"Recibido",				"icon"=>"ui-icon-arrowthickstop-1-s");
			$module_center[]=array("section_calculo"		=>"Calculo Procedente",		"icon"=>"ui-icon-check" , "text"=>"false");
			$module_center[]=array("autorizacion"			=>"Autorizacion",			"icon"=>"ui-icon-key", "text"=>"false");
			$module_center[]=array("section_rechazo"		=>"Devolucion de calculo",	"icon"=>"ui-icon-arrowreturnthick-1-w", "text"=>"false" );
			$module_center[]=array("section_improcedente"	=>"Calculo Improcedente",	"icon"=>"ui-icon-closethick", "text"=>"false" , );
		}
	}				
	if($objeto->__NIVEL_SESION("==60")==true)	 // NIVEL USUAIRO SINDICATO 
	{

		$module_center[]=array("section_pendiente"		=>"Por Enviar","icon"=>"ui-icon-arrowthick-1-n");
		$module_center[]=array("section_recibido"		=>"Enviado","icon"=>"ui-icon-arrowthickstop-1-n");
		$module_center[]=array("section_calculo"		=>"Calculo Procedente",	"icon"=>"ui-icon-check" , "text"=>"false");
		$module_center[]=array("section_rechazo"		=>"Devolucion",			"icon"=>"ui-icon-arrowreturnthick-1-w", "text"=>"false" );
		$module_center[]=array("section_improcedente"	=>"Calculo Improcedente","icon"=>"ui-icon-closethick", "text"=>"false" , );
		
	}				
    
    ###########################################################################################################
	#$objeto->words["module_title"]              ="$module_title Calculo Manual";
	
	
	
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
