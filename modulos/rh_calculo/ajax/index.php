<?php
	require_once("../../../nucleo/sesion.php");	
	$option				=array();	
	$option["name"]		="rh_c";	
	
	$objeto				=new rh_calculo($option);	
	
	$option["actions"]	="false";
	$option["where"]	=array(
		"trabajador_clave='{$_GET["matricula"]}'",
		"left(registro,7)=left('{$_GET["fecha"]}',7)",
	);
				
	$data										= $objeto->__REPORTE($option);
	
	echo $data["html"];
?>
