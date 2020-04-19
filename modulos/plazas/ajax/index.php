
<?php
	require_once("../../../nucleo/sesion.php");	
	$objeto				=new plazas();		
	
	$option             =array(
    	"where"         =>array()
    );	
	$option["where"][]  ="matricula='{$_GET["matricula"]}'";
	
	$datas              =$objeto->__BROWSE();
	
	#$objeto->__PRINT_R($datas);

	echo json_encode($datas["data"]);
?>
