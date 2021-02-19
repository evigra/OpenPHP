<?php
		$this->sys_fields_l18n	=array(
			"id"	    		=>"FOLIO",
			"name"	    		=>"Nombre",
			"email"	    		=>"Mail",
			"password"			=>"Password",
			"hashedPassword"	=>"Password",
			"files_id"	    	=>"Imagen",
			"img_files_id"	    =>"Imagen",
			"sesion_start"	    =>"Menu inicio",
			"company_id"	    =>"Compañia",
			"salt"	    		=>"",
		);				

		$this->sys_view_l18n	=array(
			"action"    		=>"Guardar",
			"cancel"	    	=>"Cancelar",
			"create"	   		=>"Crear",
			"kanban"			=>"Kanban",
			"report"			=>"Reporte",
			"module_title"    	=>"Administracion de Reclamacion",
		);
		$this->sys_view_l18n["html_head_title"]="IMSS";
		if(@$_SESSION["company"] and @$_SESSION["company"]["razonSocial"])
			$this->sys_view_l18n["html_head_title"].=" :: {$_SESSION["company"]["razonSocial"]} :: {$this->sys_view_l18n["module_title"]}";			

	if($this->__NIVEL_SESION("==40")==true)	 // NIVEL USUARIO DELEGACION
	{	
		if($this->sys_private["section"]=="section_calculo")			$this->sys_view_l18n["module_title"]="Reclamaciones por Recibir";
		elseif($this->sys_private["section"]=="section_recibido")		$this->sys_view_l18n["module_title"]="Reclamaciones Recibidas";
		elseif($this->sys_private["section"]=="section_procedente")		$this->sys_view_l18n["module_title"]="Reclamaciones Procedentes";
		elseif($this->sys_private["section"]=="section_rechazo")		$this->sys_view_l18n["module_title"]="Devolucion de Reclamaciones";
		elseif($this->sys_private["section"]=="section_improcedente")	$this->sys_view_l18n["module_title"]="Reclamaciones Improcedentes";		
	}				
	elseif($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION
	{	
		if($this->sys_private["section"]=="section_pendiente")			$this->sys_view_l18n["module_title"]="Solicitudes de Reclamaciones por Recibir";
		elseif($this->sys_private["section"]=="section_recibido")		$this->sys_view_l18n["module_title"]="Solicitudes de Reclamaciones Recibidas";
		elseif($this->sys_private["section"]=="section_calculo")		$this->sys_view_l18n["module_title"]="Reclamaciones Realizadas";
		elseif($this->sys_private["section"]=="section_rechazo")		$this->sys_view_l18n["module_title"]="Devolucion de Solicitudes";
		elseif($this->sys_private["section"]=="section_improcedente")	$this->sys_view_l18n["module_title"]="Solicitudes Improcedentes";		
	}				
	elseif($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO
	{	
		if($this->sys_private["section"]=="section_pendiente")			$this->sys_view_l18n["module_title"]="Solicitudes de Reclamaciones por Enviar";
		elseif($this->sys_private["section"]=="section_recibido")		$this->sys_view_l18n["module_title"]="Solicitudes de Reclamaciones Enviadas";
		elseif($this->sys_private["section"]=="section_calculo")		$this->sys_view_l18n["module_title"]="Reclamaciones Realizadas";
		elseif($this->sys_private["section"]=="section_rechazo")		$this->sys_view_l18n["module_title"]="Devolucion de Solicitudes de Reclamaciones";
		elseif($this->sys_private["section"]=="section_improcedente")	$this->sys_view_l18n["module_title"]="Solicitudes de Reclamaciones Improcedentes";		
	}						
			
?>
