<?php	
	$objeto											=new users_apoyamos();

    $option=array("header"=>"false");
	$data										=$objeto->__VIEW_KANBAN($option);		
	$objeto->words["system_module"]				=$data["html"];

	$data_js=array(	    
	    "../sitio_web/js/jquery.flipping_gallery",
	    "../" . $objeto->sys_var["module_path"] . "js/index"
	);
    
	$objeto->words["html_head_js"]              =$objeto->__FILE_JS($data_js);								# ARCHIVOS JS DEL MODULO
	$objeto->words["html_head_css"]             =$objeto->__FILE_CSS();

	$objeto->words["html_head_description"]	=	"Todos formamos parte de nuestra del proyecto, y apoyamos a RML en el SNTSS Colima";
	$objeto->words["html_head_keywords"] 	=	"SNTSS, IMSS";

	$objeto->words["html_head_title"]           ="{$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);    
?>
