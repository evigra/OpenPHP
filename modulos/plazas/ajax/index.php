
<?php
	require_once("../../../nucleo/sesion.php");	
	$objeto				=new plazas();		
	
	$option         =array(
	    #"echo"          =>"ajax plazas",
    	"where"         =>array(),
    );	
	$option["where"][]  ="matricula='{$_GET["matricula"]}'";	
	$datas              =$objeto->__BROWSE($option);
	
	#$objeto->__PRINT_R($datas);

	echo json_encode($datas["data"]);
?>
