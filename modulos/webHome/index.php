<?php
   	require_once("modelo.php");
	$objeto										=new webHome();
	
	$objeto->words["companyHome"]                  ="Aun en las circunstancias adversas hay que tener esperanza y fe. FE en lo que somos capaces de hacer y ESPERANZA en que llegado el momento lo haremos sin titubear";
	$objeto->words["companyMision"]                ="Ser el instrumento básico de la seguridad social, establecido como un servicio público de carácter nacional, para todos los trabajadores y trabajadoras y sus familias.";
	$objeto->words["companyVision"]                ="Por un México con más y mejor seguridad social.";
	$objeto->words["companyContact"]               ="<b>LLamanos Aqui </b><br>312 129 0333<br>314 352 0972<br><br><b>Escribenos Aqui</b>contacto@raul.com<br>";
	
	
	

	
	$objeto->words["system_module"]             =$objeto->__VIEW_SHOW();
	$objeto->words                              =$objeto->__INPUT($objeto->words,$objeto->sys_fields);      

    #$option=array("header"=>"false");
	
	#$data										=$objeto->__VIEW_GALERY($option);		
	#$objeto->words["galery"]				    =$data["html"];


	$objeto->words["html_head_js"]              =$objeto->__FILE_JS();								# ARCHIVOS JS DEL MODULO
	$objeto->words["html_head_css"]             =$objeto->__FILE_CSS();	
	$objeto->words["module_title"]              ="WebHome";
	
    $objeto->words["html_head_description"] =   "Raul Martinez Llereas :: Aun en las circunstancias adversas hay que tener esperanza y fe. FE en lo que somos capaces de hacer y ESPERANZA en que llegado el momento lo haremos sin titubear";
    $objeto->words["html_head_keywords"]    =   "SNTSS, IMSS, raul martinez llerenas";
    $objeto->words["html_head_title"]           ="SNTSS XXV :: {$objeto->words["module_title"]}";
    
    $objeto->html                               =$objeto->__VIEW_TEMPLATE("system", $objeto->words);
    $objeto->__VIEW($objeto->html);
?>
