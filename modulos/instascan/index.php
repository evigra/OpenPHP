<?php
   	require_once("modelo.php");
	$objeto										=new instascan();
	
	$objeto->words["companyHome"]                  ="Médico cirujano generación 1990-1996, con especialidad en Urgencias Médico Quirúrgicas, doctorado en Dirección e Innovación de Instituciones de Salud, certificado por el Consejo Mexicano de Medicina de Urgencias";
	$objeto->words["companyMision"]                ="Ser el instrumento básico de la seguridad social, establecido como un servicio público de carácter nacional, para todos los trabajadores y trabajadoras y sus familias.";
	$objeto->words["companyVision"]                ="Por un México con más y mejor seguridad social.";
	$objeto->words["companyContact"]               ="<b>LLamanos Aqui </b><br>312 129 0333<br>314 352 0972<br><br><b>Escribenos Aqui</b>contacto@raul.com<br>";
	
		
	$objeto->words["system_module"]             =$objeto->__VIEW_SHOW();
	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);      

    #$option=array("header"=>"false");
	
	#$data										=$objeto->__VIEW_GALERY($option);		
	#$objeto->words["galery"]				    =$data["html"];

	$data=array(
		"https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js",
		"https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js",
		"https://rawgit.com/schmich/instascan-builds/master/instascan.min.js",
		"../" . $objeto->sys_var["module_path"] . "js/index"		
	);

	$objeto->words["html_head_js"]              =$objeto->__FILE_JS($data);								# ARCHIVOS JS DEL MODULO
	$objeto->words["html_head_css"]             =$objeto->__FILE_CSS();	
	$objeto->words["module_title"]              ="IMSS Colima :: Home";
	
    $objeto->words["html_head_description"]     ="ORGANO DE OPERACION ADMINISTRATIVA DESCONCENTRADA DEL IMSS EN COLIMA";
    $objeto->words["html_head_keywords"]        ="IMSS Colima, ";
    $objeto->words["html_head_title"]           ="IMSS Colima :: {$objeto->words["module_title"]}";
        
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);
?>
