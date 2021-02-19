<?php
	require_once("../../../nucleo/sesion.php");	
	$option				=array();	
	$objeto				=new rh_calculo($option);	
	
	$template=$objeto->sys_var["module_path"]."html/autorizacion";			
	$objeto->words["module_body"]  =$objeto->__TEMPLATE("$template");
	
	
	
	
	
	

	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);	
	
	echo $objeto->__REPLACE($objeto->words["module_body"],$objeto->words);
?>
