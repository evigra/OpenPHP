<?php
	$objeto										=new menu_sub();
	$objeto->__SESSION();
	
	# TEMPLATES O PLANTILLAS ELEJIDAS PARA EL MODULO
	$objeto->words["system_body"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_body");	
	$objeto->words["system_module"]	=	$objeto->__TEMPLATE($objeto->sys_html."system_module");
	
	# CARGA DE ARCHIVOS EXTERNOS JS, CSS
	$objeto->words["html_head_js"]	=	$objeto->__FILE_JS();
		
	$module_left	="";
	$module_center	="";	
    $module_right	="";
        
    $module_title	="";
	
    if($objeto->sys_private["section"]=="create")
	{

    }	
	else
	{
        $comando_sql        ="
            select 
            	m.id AS id_m, 
                m.*
            from 
                users u JOIN 
                user_group ug ON u.id=ug.user_id JOIN
                perfil g ON g.id=ug.perfil JOIN
                permiso p ON p.usergroup_id=ug.perfil AND p.s=1 JOIN
                menu m ON m.id=p.menu_id 
            WHERE  1=1
                AND ug.perfil!=0
                AND u.id='{$_SESSION["user"]["id"]}'
                AND parent='$sys_menu'
                AND m.type='submenu'
            GROUP BY  m.id        
        ";	


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
    	$option										=array();
		$data										=$objeto->__VIEW_KANBAN($option);		
		$objeto->words["module_body"]				=$data["html"];
    }        

    $module_left=array(
        array("action"=>"Guardar"),
        array("cancel"=>"Cancelar"),
    );
    $module_right=array(
        array("create"=>"Crear"),
        #array("write"=>"Modificar"),
        array("report"=>"Reporte"),
    );

	$objeto->words["module_title"]              ="Menu";
	$objeto->words["module_left"]               =$objeto->__BUTTON($module_left);
	$objeto->words["module_center"]             ="";
	$objeto->words["module_right"]              =$objeto->__BUTTON($module_right);;
	
	$objeto->words["html_head_description"]	=	"EN LA EMPRESA SOLESGPS, CONTAMOS CON UN MODULO PARA ADMINISTRAR EL REGISTRO DE MENUS.";
	$objeto->words["html_head_keywords"] 	=	"GPS, RASTREO, MANZANILLO, SATELITAL, CELULAR, VEHICULAR, VEHICULO, TRACTO, LOCALIZACION, COLIMA, SOLES, SATELITE, GEOCERCAS, STREET VIEW, MAPA";
	$objeto->words["html_head_title"]           ="SOLES GPS :: {$_SESSION["company"]["razonSocial"]} :: {$objeto->words["module_title"]}";
		
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);
    
?>
