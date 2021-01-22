<?php	
	$objeto											=new rh_calculo();		
	#if($objeto->__NIVEL_SESION("<=60")==true)	 // NIVEL USUARIO EJEMPLO
	
	#if($objeto->__NIVEL_SESION("==0")==true)	 // NIVEL DIOS
	#if($objeto->__NIVEL_SESION("==10")==true)	 // NIVEL Super Admin
	#if($objeto->__NIVEL_SESION("==20")==true)	 // NIVEL Admin
	#if($objeto->__NIVEL_SESION("==30")==true)	 // NIVEL Admin
	
	#phpinfo();
	
	$objeto->__SESSION();
	
	#$objeto->__PRINT_R($_SERVER["SCRIPT_NAME"]);
		
	
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
		if($_SERVER["SCRIPT_NAME"]=="/OpenPHP/index.php")
			$carpeta="OpenPHP";
		else	
			$carpeta="produccion";
		
	
    	$qr_path=array(
    		"text"=>"http://172.24.21.184/$carpeta/rh_calculo/&sys_action=print_pdf&sys_section_rh_calculo=impresion_status&sys_action_rh_calculo=&sys_id_rh_calculo=".$objeto->sys_private["id"],
    		"height"=>250
    	);	
    	//$qr_path="http://localhost/OpenPHP/rh_calculo/&sys_action=print_pdf&sys_section_rh_calculo=impresion_status&sys_action_rh_calculo=&sys_id_rh_calculo=".$objeto->sys_private["id"];
    	//$qr_path="../rh_calculo/&sys_action=print_pdf&sys_section_rh_calculo=impresion_status&sys_action_rh_calculo=&sys_id_rh_calculo=".$objeto->sys_private["id"];    	    	    	    	
    	$objeto->words["qr_calculo"]	=$objeto->__QR($qr_path);
    	$objeto->words["url_calculo"]	=$qr_path;
	}
	#*/	
	$module_left		="";	
	$module_right		="";	
	$module_center		=array();	
	
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
		    array("create"=>"Crear"),
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
		#$objeto->sys_fields["trabajador_nombre"]["type"]	="value";
		
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
	    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE($template);	
		}
				
		if($objeto->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
		{			
			$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
			$option["actions"]["check"]		="$"."row[\"f_p_recibio\"] == ''";	
			
			$template=$objeto->sys_var["module_path"]."html/write";
	    	$objeto->words["module_body"]               =$objeto->__VIEW_WRITE($template);	
			
		}

		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);		
		#CARGANDO VISTA PARTICULAR Y CAMPOS
    	#$objeto->words["module_body"]               =$objeto->__VIEW_WRITE();	
    	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);
		
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
    ###################################################
    
    elseif($objeto->sys_private["section"]=="section_pendiente")
    {    
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_PENDIENTE();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }
    elseif($objeto->sys_private["section"]=="section_recibido")
    {    
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_RECIBIDO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }  
    elseif($objeto->sys_private["section"]=="section_calculo")
    {
    
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_CALCULO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }      
    elseif($objeto->sys_private["section"]=="section_rechazo")
    {
    
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_RECHAZO();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }      

    elseif($objeto->sys_private["section"]=="section_enviar")
    {
    
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
		
		#CARGANDO VISTA PARTICULAR Y CAMPOS			
		$data										= $objeto->__REPORT_ENVIAR();
		$objeto->words["module_body"]				=$data["html"];
		$module_title								="Reporte de Pendientes de ";
    }
    elseif($objeto->sys_private["section"]=="section_enviado")
    {
    
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
		    array("report"=>"Reporte"),
		);
		
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
		#BOTONES SECCION DERECHA
		$module_right=array(
		    array("create"=>"Crear"),
		    #array("write"=>"Modificar"),
		    #array("kanban"=>"Kanban"),
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
    ###########################################################################################################
    
    
	if($objeto->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION
	{
		/*
			$module_center=array(
				array("action_aprovar"=>"Aprovar"),
				array("action_cancelar"=>"Cancelar"),
			);	 		
		*/
		if(!($objeto->sys_private["section"]=="create" OR $objeto->sys_private["section"]=="write"))
		{
			$module_center[]=array("section_pendiente"		=>"Por Recibir",			"icon"=>"ui-icon-arrowthick-1-s");
			$module_center[]=array("section_recibido"		=>"Recibido",				"icon"=>"ui-icon-arrowthickstop-1-s");
			$module_center[]=array("section_calculo"		=>"Calculo Procedente",		"icon"=>"ui-icon-check" , "text"=>"false");
			$module_center[]=array("section_rechazo"		=>"Devolucion de calculo",	"icon"=>"ui-icon-arrowreturnthick-1-w", "text"=>"false" );
			$module_center[]=array("section_improceedente"	=>"Calculo Improcedente",	"icon"=>"ui-icon-closethick", "text"=>"false" , );
			
			
			

			/*
			$module_center[]=array("report_pendiente"	=>"Por Recibir",	"icon"=>"ui-icon-arrowthick-1-s");
			$module_center[]=array("report_recibido"	=>"Recibido",		"icon"=>"ui-icon-arrowthickstop-1-s");
			$module_center[]=array("report_calculo"		=>"Calculo",		"icon"=>"ui-icon-check");
			$module_center[]=array("report_rechazo"		=>"Calculo",		"icon"=>"ui-icon-closethick");
			*/
		}
		
		
		
		#$module_center[]=array("report_enviar"		=>"Por Enviar",		"icon"=>"ui-icon-arrowthick-1-n");
		#$module_center[]=array("report_enviado"		=>"Enviado",		"icon"=>"ui-icon-arrowthickstop-1-n");
	}				
	if($objeto->__NIVEL_SESION("==60")==true)	 // NIVEL USUAIRO SINDICATO 
	{
		/*
			$module_center=array(
				array("action_aprovar"=>"Aprovar"),
				array("action_cancelar"=>"Cancelar"),
			);	 		
		*/
		$module_center[]=array("section_pendiente"	=>"Por Enviar","icon"=>"ui-icon-arrowthick-1-n");
		$module_center[]=array("section_recibido"	=>"Enviado","icon"=>"ui-icon-arrowthickstop-1-n");

		$module_center[]=array("section_calculo"		=>"Calculo Procedente",	"icon"=>"ui-icon-check" , "text"=>"false");
		$module_center[]=array("section_rechazo"		=>"Devolucion",			"icon"=>"ui-icon-arrowreturnthick-1-w", "text"=>"false" );
		$module_center[]=array("section_improceedente"	=>"Calculo Improcedente","icon"=>"ui-icon-closethick", "text"=>"false" , );
		
	}				
    
    ###########################################################################################################
	/*
    if($objeto->__NIVEL_SESION("<=20")==true)	 // NIVEL ADMINISTRADOR 
    {
    	$module_right_admin=array(
		    array("report_pendiente"=>"","icon"=>"ui-icon-help"),
		    array("report_cancelados"=>"","icon"=>"ui-icon-closethick"),
		    array("report_aprovados"=>"","icon"=>"ui-icon-check"),
		);	    
		$module_right=array_merge($module_right, $module_right_admin);		
	
	}
    if($objeto->__NIVEL_SESION("<=10")==true)   // NIVEL SUPER ADMINISTRADOR
    {
	
    	$module_right_admin=array(
		    array("report_especifico"=>"R Esp."),
		    array("report_general"=>"R Gral."),
		);	    
		$module_right=array_merge($module_right, $module_right_admin);		
	}

    */
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
