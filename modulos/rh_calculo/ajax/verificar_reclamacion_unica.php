<?php
	require_once("../../../nucleo/sesion.php");	
	$option				=array();	
	$option["name"]		="rh_c";	



	
	$objeto				=new rh_calculo($option);	
	#$objeto->sys_private["section"]=="section_filtro";
	#$objeto->sys_private["action"]=="section_filtro";
	

	$option["header"]	=false;
	$option["actions"]	=false;
	$option["where"]	=array(
		"trabajador_clave='{$_GET["matricula"]}'",
		"left(registro,7)=left('{$_GET["fecha"]}',7)",
	);

    $option["template_title"]	=$objeto->sys_var["module_path"]."html/report_filtrado/report_title";
    $option["template_body"]	=$objeto->sys_var["module_path"]."html/report_filtrado/report_body";			
					
	$data										= $objeto->__REPORTE($option);
	
	echo $data["html"];
?>
