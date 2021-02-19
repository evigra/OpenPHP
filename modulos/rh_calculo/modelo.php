<?php
	class rh_calculo extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu			=array();
		var $sys_enviroments	="DEVELOPER";
		var $sys_fields		=array( 
			"id"	    =>array(
			    "title"             => "Folio",
			    "type"              => "primary key",
			),
			"folio"	    =>array(
			    "title"             => "Folio",
			    "title_filter"      => "Folio",
			    "type"              => "input",
			),

			"estatus"	    =>array(
			    "title"             => "Estatus",
			    "type"              => "hidden",
			),			
			"f_estatus"	    =>array(
			    "title"             => "Actualizado",
			    "type"              => "input",
			),			
			"d_estatus"	    =>array(
			    "title"             => "Descripcion Estatus",
			    "type"              => "input",
			),						
			"firma_adscripcion"	    =>array(
			    "title"             => "Firma Elaboro",
			    "type"              => "input",
			),						

			
			"trabajador_nombre"	    =>array(
			    "title"             => "Trabajador",
				"title_filter"      => "Nombre",
			    "type"              => "input",
			    "attr"             => array(		
					"required",					
			    ),				

			    /*
			    "attr"             => array(
			    	"readonly"=>"readonly"
			    ),
			    */			    			    
  			    "style"             => array(			    	
					"color"=>array("red"=>"1==1"),
					"font-size"=>array("25px"=>"1==1"),					
			    ),			    			    
				
			),		
			"trabajador_clave"	    =>array(
			    "title"             => "Matricula",
				"title_filter"      => "Matricula",
			    "type"              => "input",
			    "attr"             => array(		
					"required",					
			    ),				
  			    "style"             => array(			    	
					"color"=>array("red"=>"1==1"),
					"font-size"=>array("25px"=>"1==1"),					
			    ),			    			    
			    
			),
			"trabajador_horario"	    =>array(
			    "title"             => "Horario",
			    "type"              => "input",
			    /*
  			    "attr"             => array(
			    	"readonly"=>"readonly"
			    ),	
			    */		    			    
			),			
			"trabajador_horario_1"	    =>array(
			    "title"             => "Horario",
			    "type"              => "input",
  			    "attr"             => array(
			    	"readonly"=>"readonly"
			    ),			    			    
			),
			"trabajador_puesto"	    =>array(
			    "title"             => "Puesto",
			    "type"              => "input",
			    /*
			    "attr"             => array(
			    	"readonly"=>"readonly"
			    ),			    	
			    */		    			    
			),
			"trabajador_puesto_1"	    =>array(
			    "title"             => "Puesto",
			    "type"              => "input",
			    "attr"             => array(
			    	"readonly"=>"readonly"
			    ),			    			    			    
			),			
			"trabajador_puesto_id"	    =>array(
			    "title"             => "Puesto",
			    "type"              => "hidden",
			),			
			"trabajador_puesto_id_1"	    =>array(
			    "title"             => "Puesto",
			    "type"              => "hidden",
			    "attr"             => array(
			    	"readonly"=>"readonly"
			    ),			    			    			    
			),				
			"trabajador_departamento"	    =>array(
			    "title"             => "Departamento",
			    "type"              => "input",
			),			
			"trabajador_dependencia"	    =>array(
			    "title"             => "Dependencia",
			    "type"              => "hidden",
			),				
			"trabajador_departamento_id"	    =>array(
			    "title"             => "DepartamentoID",
			    "type"              => "hidden",
			),			
			"sueldo"	    =>array(
			    "title"             => "Sueldo",
			    "type"              => "hidden",
			),
			"sueldo_1"	    =>array(
			    "title"             => "Sueldo",
			    "type"              => "hidden",
			),			
			"trabajador_plaza"	    =>array(
			    "title"             => "Plaza",
			    "type"              => "input",
			),			
			"trabajador_plaza_1"	   =>array(
			    "title"             => "Plaza",
			    "type"              => "input",
			),			
			"turno"	    =>array(
			    "title"             => "turno",
			    "type"              => "input",
			),		
			"turno_1"	    =>array(
			    "title"             => "turno",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"2",
			    ),				

			),				
			"b2"	    =>array(
			    "title"             => "b2",			    
			    "type"              => "hidden",
			),
			"b2_1"	    =>array(
			    "title"             => "b2",			    
			    "type"              => "hidden",
			),				
			"b3"	    =>array(
			    "title"             => "b3",			    
			    "type"              => "hidden",
			),			
			"b3_1"	    =>array(
			    "title"             => "b3",			    
			    "type"              => "hidden",
			),
			"b4"	    =>array(
			    "title"             => "b4",			    
			    "type"              => "hidden",
			),			
			"b4_1"	    =>array(
			    "title"             => "b4",			    
			    "type"              => "hidden",
			),
			"b5"	    =>array(
			    "title"             => "b5",			    
			    "type"              => "hidden",
			),		
			"b5_1"	    =>array(
			    "title"             => "b5",			    
			    "type"              => "hidden",
			),
			"b6"	    =>array(
			    "title"             => "b6",			    
			    "type"              => "hidden",
			),		
			"b6_1"	    =>array(
			    "title"             => "b6",			    
			    "type"              => "hidden",
			),			
			"b7"	    =>array(
			    "title"             => "b7",			    
			    "type"              => "hidden",
			),			
			"b7_1"	    =>array(
			    "title"             => "b7",			    
			    "type"              => "hidden",
			),			
			
			"b8"	    =>array(
			    "title"             => "b8",			    
			    "type"              => "hidden",
				"value"             => "",
			),			
			"b8_1"	    =>array(
			    "title"             => "b8",			    
			    "type"              => "hidden",
				"value"             => "",
			),	
			"b9"	    =>array(
			    "title"             => "b9",			    
			    "type"              => "hidden",
			),	
			"b9_1"	    =>array(
			    "title"             => "b9",			    
			    "type"              => "hidden",
			),	

			"che_plaza"	    =>array(
			    "title"             => "Plaza Diferente",
			    "type"              => "checkbox",
				
			),
			"che_pago"	    =>array(
			    "title"             => "Pago",
			    "type"              => "checkbox",
			    "attr"             => array(							
					"tabindex"		=>"3",
			    ),				
				
			),
			"d_pago"	    =>array(
			    "title"             => "Pago",
			    "showTitle"         => "no",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"4",
			    ),				
				
			),
			"che_descuento"	    =>array(
			    "title"             => "Descuento",
			    "type"              => "checkbox",
			    "attr"             => array(							
					"tabindex"		=>"5",
			    ),								
			),
			"d_descuento"	    =>array(
			    "title"             => "Descuento",
			    "showTitle"         => "no",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"6",
			    ),				
				
			),
			"che_reintegro"	    =>array(
			    "title"             => "Reintegro",
			    "showTitle"         => "si",
			    "type"              => "checkbox",
			    "attr"             => array(							
					"tabindex"		=>"7",
			    ),				
				
			),
			"d_reintegro"	    =>array(
			    "title"             => "Reintegro",
			    "showTitle"         => "no",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"8",
			    ),				
				
			),
			"che_exclusion"	    =>array(
			    "title"             => "Exclusion",
			    "type"              => "checkbox",
			    "attr"             => array(							
					"tabindex"		=>"9",
			    ),				
				
			),
			"d_exclusion"	    =>array(
			    "title"             => "Exclusion",
			    "showTitle"         => "no",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"10",
			    ),				
				
			),
			"che_ajuste"	    =>array(
			    "title"             => "Ajuste",
			    "showTitle"         => "si",
			    "type"              => "checkbox",
			    "attr"             => array(							
					"tabindex"		=>"11",
			    ),				
				
			),
			"d_ajuste"	    =>array(
			    "title"             => "Ajuste",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"12",
			    ),				
				
			),			
			"incidencia"	    =>array(
			    "title"             => "Incidencia",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"13",
			    ),				
				
			),				
			"proceso"	    =>array(
			    "title"             => "Proceso",
			    "type"              => "input",
			    "attr"             => array(							
					"tabindex"		=>"14",
			    ),				
				
			),				
			"del"	    =>array(
			    "title"             => "Del",
			    "type"              => "date",
			    "attr"             => array(							
					"tabindex"		=>"15",
			    ),				
				
			),
			"al"	    =>array(
			    "title"             => "Al",
			    "type"              => "date",
			    "attr"             => array(							
					"tabindex"		=>"16",
			    ),				
				
			),
			"motivo"	    =>array(
			    "title"             => "Motivo",
			    "type"              => "textarea",
			    "attr"             => array(
			    	"style"=>"height:100px;",
					"tabindex"		=>"17",
			    ),				
			),			
			"registro"	    =>array(
			    "title"             => "Fecha de reclamacion",
			    "type"              => "date",
			    "attr"				=>array(
			    	"placeholder"=>"AAAA-MM-DD",
			    	"required",								    
			    ),

			),			
			"elaboro"	    =>array(
			    "title"             => "Elaboro",
			    "showTitle"         => "no",
			    "type"              => "input",
		    
			),				
			"m_elaboro"	    =>array(
			    "title"             => "M. Elaboro",
			    "titleShow"         => "no",
			    "type"              => "input",
			),	
			"f_elaboro"	    =>array(
			    "title"             => "Elaborado",
			    "type"              => "date",
			),
			"p_recibio"	    =>array(
			    "title"             => "Recibio",
			    "showTitle"         => "no",
			    "type"              => "input",
		    
			),				
			"m_p_recibio"	    =>array(
			    "title"             => "Recibio",
			    "titleShow"         => "no",
			    "type"              => "input",
			),	
			"f_p_recibio"	    =>array(
			    "title"             => "Recibido en adscripcion",
			    "type"              => "date",
			),
			
	


			"d_recibio"	    =>array(
			    "title"             => "Recibio Del",
			    "showTitle"         => "no",
			    "type"              => "input",
		    
			),				
			"m_d_recibio"	    =>array(
			    "title"             => "Recibio Del",
			    "titleShow"         => "no",
			    "type"              => "input",
			),	
			"f_d_recibio"	    =>array(
			    "title"             => "Recibido en delegacion",
			    "type"              => "date",
			),

						
			"autorizo"	    =>array(
			    "title"             => "Autorizo",
			    "type"              => "input",
			),				
			"m_autorizo"	    =>array(
			    "title"             => "Autorizo",
			    "type"              => "input",
			),	
			"f_autorizo"	    =>array(
			    "title"             => "Autorizo",
			    "type"              => "input",
			),	
						
						
			"cptos_fijos"	    =>array(
			    "title"             => "CF",
			    "type"              => "input",
			),	
			"cpto_1vez"	    =>array(
			    "title"             => "C1V",
			    "type"              => "input",
			),				
			"hist_acum"	    =>array(
			    "title"             => "HA",
			    "type"              => "input",
			),							
			"conceptos_ids"	    =>array(
			    "title"             => "Horario",
			    "type"              => "form",
			    "relation"          => "many2one",
			    "relation"          => "one2many",			    			    
			    
			    "class_name"       	=> "rh_calculo_cptos1vez",			    
				"class_report" 		=> "kanban",			    
			    "class_field_o"    	=> "id",
			    "class_field_m"    	=> "calculo_id",				
			),
			
			"fijos_ids"	    =>array(
			    "title"             => "Horario",
			    "showTitle"         => "si",
			    "type"              => "form",
			    "relation"          => "many2one",
			    "relation"          => "one2many",			    
			    "class_name"       	=> "rh_calculo_cptosfijos",			    
				"class_report" 		=> "kanban",			    
			    "class_field_o"    	=> "id",
			    "class_field_m"    	=> "calculo_id",				
			),			
			#/*
			"historicos_ids"	    =>array(
			    "title"             => "Horario",
			    "showTitle"         => "si",
			    "type"              => "form",
			    "relation"          => "one2many",			    
			    "class_name"       	=> "rh_calculo_cptoshistoricos",			    
				"class_report" 		=> "kanban",			    
			    "class_field_o"    	=> "id",
			    "class_field_m"    	=> "calculo_id",				
			),						
			#*/
			
			"company_id"	    =>array(
			    "title"             => "Compania",
			    "type"              => "input",
			    "relation"          => "many2one",
			    "class_name"       	=> "company",
			    "class_field_o"    	=> "company_id",
			    "class_field_m"    	=> "id",
			),						
			"reclamacion"	    =>array(
			    "title"             => "Descripcion",
			    "type"              => "input",
			    "attr"             => array(		
					"required",					
			    ),				    
			),			
			"f_calculo"	    =>array(
			    "title"             => "Calculo Procesado",
			    "type"              => "input",
			),					
			"calculo"	    =>array(
			    "title"             => "Calculo",
			    "type"              => "input",
			),					
			"m_calculo"	    =>array(
			    "title"             => "Calculo",
			    "type"              => "input",
			),					
			
			"m_oficial_asignado"	    =>array(
			    "title"             => "M. Oficial",
			    "type"              => "input",
			),		
						
			"autoriza_ads"	    =>array(
			    "title"             => "Autoriza",
			    "type"              => "input",
			),		
			"m_autoriza_ads"	    =>array(
			    "title"             => "Matricula",
			    "type"              => "input",
			),		
			"f_autoriza_ads"	    =>array(
			    "title"             => "Autoriza",
			    "type"              => "input",
			),		
			"observacion_ads"	    =>array(
			    "title"             => "Observaciones",
			    "type"              => "input",
			),		
			"devuelve"	    =>array(
			    "title"             => "Devuelve",
			    "type"              => "input",
			),				
			"f_devuelve"	    =>array(
			    "title"             => "Devuelve",
			    "type"              => "input",
			),				
			"m_devuelve"	    =>array(
			    "title"             => "Devuelve",
			    "type"              => "input",
			),				
			"m_devuelve"	    =>array(
			    "title"             => "Devuelve",
			    "type"              => "input",
			),	
			"che_014"	    =>array(
			    "title"             => "014 Infecto No Medico",
			    "type"              => "checkbox",				
			),
			"che_023"	    =>array(
			    "title"             => "023 Infecto Medico",
			    "type"              => "checkbox",				
			),
			"che_085"	    =>array(
			    "title"             => "085 Nota de merito",
			    "type"              => "checkbox",				
			),
			"che_086"	    =>array(
			    "title"             => "086 Guardia Covid",
			    "type"              => "checkbox",				
			),			
		);				
		##############################################################################	
		##  Metodos	
		##############################################################################
        /*
		public function __CONSTRUCT()
		{	
			parent::__CONSTRUCT();		
			#$this->__PRINT_R($_SESSION);
			
		}
		*/
		#/*
   		public function __OBTENER_QUINCENA($fecha)
    	{
			$nroAnio 	= date("Y", strtotime($fecha));
			$nroDia 	= date("j", strtotime($fecha));
			$nroMes 	= date("n", strtotime($fecha));			
			if($nroDia<16)	$quincena	= 1;
			else			$quincena	= 2;			

			$quincena	=($nroMes * 2) - 2 + $quincena; 	
			
		   	return $nroAnio . str_pad($quincena, 3, "0", STR_PAD_LEFT);
		}			
   		public function __SAVE($datas=NULL,$option=NULL)
    	{    		    		
		    if(!isset($_SESSION["company"]["id"]))     $_SESSION["company"]["id"]=1;    		    		   
		    $datas["company_id"]    	=@$_SESSION["company"]["id"];    	    	
    	    $datas["f_estatus"]		=$_SESSION["var"]["datetime"];	



			if(isset($datas["trabajador_nombre"]))	$datas["trabajador_nombre"]		=strtoupper($datas["trabajador_nombre"]);
			if(isset($datas["reclamacion"]))		$datas["reclamacion"]			=strtoupper($datas["reclamacion"]);


			if($this->sys_private["section"]=="create")    		
			{				
				if(isset($datas["registro"]))		$datas["incidencia"]		=$this->__OBTENER_QUINCENA($datas["registro"]);		
			
				$option_folio["variable"]		="RHRE";
				$option_folio["subvariable"]	=date("Y");
				$option_folio["tipo"]			="RH";
				$option_folio["subtipo"]		="Reclamaciones";
			
				$datas["folio"]			=$this->__FOLIOS($option_folio);
							
				$datas["estatus"]		="Reclamacion Solicitada";
				$datas["d_estatus"]		="Entregaste documentacion para solicitar una reclamacion con tu representante sindicato";		
				#$datas["registro"]		=$this->sys_date;
				
				$datas["elaboro"]		=$_SESSION["user"]["name"];
				$datas["m_elaboro"]		=$_SESSION["user"]["email"];				
				$datas["f_elaboro"]		=$_SESSION["var"]["datetime"];
				
				/*				
				$datas_mail=array(
					"title"		=>"Sistema IMSS",
					"to"		=>"evigra@gmail.com",
					"html"		=>"Reclamaciones",
					
				);
				#$this->send_mail($datas_mail);
				$this->send_mail($datas_mail);
				*/

				/*
				$data_wa["number"]		="5213121340216";
				$data_wa["number"]		="5213141182618";
				$data_wa["text"]		="PRUEBA DE MENSAJE";

				$this->__WA($data_wa);				
				*/
			}			
			#$datas["cptos_fijos"]		=count($datas["fijos_ids"]);		
			#$datas["cpto_1vez"]			=count($datas["conceptos_ids"]);		
			#$datas["hist_acum"]			=count($datas["historicos_ids"]);		
						
			#$option["echo"]=$datas["total"];
			

			##########################33    		
    	    $save	= parent::__SAVE($datas,$option);

    	    
			if($this->sys_private["section"]=="create")    		
			{				
				$_SESSION["pdf"]["formato"]		="sitio_web/html/PDF_FORMATO_SNTSS";						
				$option_print=array(
					"id"		=>"$save",
					"section"	=>"impresion_sindicato",
					"module"	=>$this->sys_object,
				);			
				$this->PDF_PRINT($option_print);
			}
    	    
    	    return $save;
		}
		#*/		
   		public function __GENERAR_PDF()
    	{
			$_SESSION["pdf"]	=array();	
			
			$_SESSION["pdf"]["title"]				="INSTITUTO MEXICANO DEL SEGURO SOCIAL";
			$_SESSION["pdf"]["subject"]				="";
			$_SESSION["pdf"]["save_name"]			="";
			$_SESSION["pdf"]["PDF_MARGIN_TOP"]		=10;
			
			$_SESSION["pdf"]["template"]			=$this->__FORMATO($this->sys_private["id"]);
		}		
   		public function __FORMATO($option)
    	{
			$template="";	
			$datos										=$this->__BROWSE($option);
			
			if(@$datos["data"])							$datos=$datos["data"];			

						
			foreach($datos as $dato)
			{
				$conceptos_ids_options=array(					
					"where"=>array(
						"calculo_id={$dato["id"]}"
					)
				);
				if($dato["che_pago"]==1) 		$dato["che_pago"]="X";
				else							$dato["che_pago"]="";
				if($dato["che_descuento"]==1) 	$dato["che_descuento"]="X";
				else							$dato["che_descuento"]="";
				if($dato["che_reintegro"]==1) 	$dato["che_reintegro"]="X";
				else							$dato["che_reintegro"]="";
				if($dato["che_exclusion"]==1) 	$dato["che_exclusion"]="X";
				else							$dato["che_exclusion"]="";
				if($dato["che_ajuste"]==1) 		$dato["che_ajuste"]="X";
				else							$dato["che_ajuste"]="";

				$words									=$dato;				
				$hoja2=0;
				if(is_array($words) AND count($words)>0)
				{	
					$template								.=$this->__TEMPLATE("sitio_web/html/PDF_FORMATO_qr");
					
					$words									=array_merge(array("sys_modulo" => $this->__TEMPLATE($this->sys_var["module_path"]. "html/PDF_FORMATO")),$words);
					
					$words["sys_title"]						="COORDINACION DE GESTION DE RECURSOS HUMANOS";		
					$words["sys_subtitle"]					="DEPARTAMENTO DELEGACIONAL DE PERSONAL";		
					
					$words["qr"]							=$this->words["qr"];

			
				
					#if(@$dato["trabajador_departamento_id"])
					#	$words["lugar"]						=$this->lugar(substr($dato["trabajador_departamento_id"],0,6));		
					$words["fecha"]							=$this->sys_date;		
					
					#####################################
					
					
					
					
					
					$datas_conceptos=$this->sys_fields["conceptos_ids"]["obj"]->__BROWSE($conceptos_ids_options);		
					
					if($datas_conceptos["total"]>0)
					{						
						$a=0;
						foreach($datas_conceptos["data"] as $data_conceptos)
						{
							$a++;	
							if(!isset($words["CP1V_matricula$a"]))
							{
								if($a==2 AND $hoja2==0)	
								{	
									$hoja2=1;
									$template					.="<br><br>".$this->__TEMPLATE($this->sys_var["module_path"]. "html/PDF_FORMATO2");						
								}	
								$words["CP1V_matricula$a"]	=$datos[0]["trabajador_clave"];
								$words["CP1V_con$a"]			=$data_conceptos["con"];
								$words["CP1V_imp$a"]			=$data_conceptos["imp"];
								$words["CP1V_uni$a"]			=$data_conceptos["uni"];
								$words["CP1V_dia$a"]			=$data_conceptos["dia"];
								$words["CP1V_jor$a"]			=$data_conceptos["jor"];
								$words["CP1V_fac$a"]			=$data_conceptos["fac"];
								$words["CP1V_bas$a"]			=$data_conceptos["bas"];
								$words["CP1V_mar$a"]			=$data_conceptos["mar"];
								$words["CP1V_des$a"]			=$data_conceptos["des"];
								$words["CP1V_cif$a"]			=$data_conceptos["cif"];								
								$words["CP1V_ini$a"]			=$data_conceptos["ini"];								
								$words["CP1V_fin$a"]			=$data_conceptos["fin"];								
							}
						}
					}				
					
					#####################################
					$datas_fijos=$this->sys_fields["fijos_ids"]["obj"]->__BROWSE($conceptos_ids_options);		
					#$datas_fijos=@$this->fijos_ids_obj->__BROWSE($conceptos_ids_options);					
					if($datas_fijos["total"]>0)
					{								
						$a=0;
						foreach($datas_fijos["data"] as $data_conceptos)
						{
							$a++;	
							if(!isset($words["CPF1_matricula$a"]))
							{								
								if($a==2 AND $hoja2==0)	
								{	
									$hoja2=1;
									$template					.="<br><br>".$this->__TEMPLATE($this->sys_var["module_path"]. "html/PDF_FORMATO2");						
								}	
								$words["CPF1_matricula$a"]		=$datos[0]["trabajador_clave"];
								$words["CPF1_con$a"]			=@$data_conceptos["con"];
								$words["CPF1_imp$a"]			=@$data_conceptos["imp"];
								$words["CPF1_uni$a"]			=@$data_conceptos["uni"];																																
								$words["CPF1_cif$a"]			=@$data_conceptos["cif"];								
								$words["CPF1_ini$a"]			=@$data_conceptos["ini"];								
								$words["CPF1_fin$a"]			=@$data_conceptos["fin"];								
								$words["CPF1_noc$a"]			=@$data_conceptos["noc"];								
								$words["CPF1_des$a"]			=@$data_conceptos["des"];								
							}

						}
					}						
					#/*
					#####################################
					#$datas_fijos=@$this->historicos_ids_obj->__BROWSE($conceptos_ids_options);					
					$datas_fijos=$this->sys_fields["historicos_ids"]["obj"]->__BROWSE($conceptos_ids_options);		
					if($datas_fijos["total"]>0)
					{								
						$a=0;
						foreach($datas_fijos["data"] as $data_conceptos)
						{
							$a++;	
							if(!isset($words["H1_matricula$a"]))
							{								
								if($a==2 AND $hoja2==0)	
								{	
									$hoja2=1;
									$template					.="<br><br>".$this->__TEMPLATE($this->sys_var["module_path"]. "html/PDF_FORMATO2");						
								}	
								$words["H1_matricula$a"]		=$datos[0]["trabajador_clave"];
								$words["H1_con$a"]				=@$data_conceptos["con"];
								$words["H1_imp_s$a"]			=@$data_conceptos["imp_s"];
								$words["H1_imp_r$a"]			=@$data_conceptos["imp_r"];
								$words["H1_uni_s$a"]			=@$data_conceptos["uni_s"];			
								$words["H1_uni_r$a"]			=@$data_conceptos["uni_r"];			
								$words["H1_des$a"]				=@$data_conceptos["des"];								
								$words["H1_dic$a"]				=@$data_conceptos["dic"];								
								$words["H1_deb$a"]				=@$data_conceptos["deb"];								
								$words["H1_mes$a"]				=@$data_conceptos["mes"];								
							}
						}
					}						
					#*/
					for($a=1; $a<7;$a++)
					{	
						if(!isset($words["CPF1_matricula$a"]))
						{
							$words["CPF1_matricula$a"]	="";
							$words["CPF1_con$a"]		="";
							$words["CPF1_imp$a"]		="";
							$words["CPF1_uni$a"]		="";
							$words["CPF1_cif$a"]		="";
							$words["CPF1_ini$a"]		="";
							$words["CPF1_fin$a"]		="";						
							$words["CPF1_noc$a"]		="";						
							$words["CPF1_des$a"]		="";						
							
						}						
						if(!isset($words["H1_matricula$a"]))
						{
							$words["H1_matricula$a"]		="";
							$words["H1_con$a"]				="";
							$words["H1_imp_s$a"]			="";
							$words["H1_imp_r$a"]			="";
							$words["H1_uni_s$a"]			="";
							$words["H1_uni_r$a"]			="";
							$words["H1_des$a"]				="";
							$words["H1_dic$a"]				="";
							$words["H1_deb$a"]				="";
							$words["H1_mes$a"]				="";
							
						}							
						if(!isset($words["CP1V_matricula$a"]))
						{
							$words["CP1V_matricula$a"]	="";
							$words["CP1V_con$a"]		="";
							$words["CP1V_imp$a"]		="";
							$words["CP1V_uni$a"]		="";
							$words["CP1V_dia$a"]		="";
							$words["CP1V_jor$a"]		="";
							$words["CP1V_fac$a"]		="";
							$words["CP1V_bas$a"]		="";
							$words["CP1V_mar$a"]		="";
							$words["CP1V_cif$a"]		="";
							$words["CP1V_des$a"]		="";
							$words["CP1V_ini$a"]		="";
							$words["CP1V_fin$a"]		="";							
						}						
						
					}	
				
					$template								=$this->__REPLACE($template,$words);
					
					#$this->__PRINT_R($datas_conceptos);	
					
					
					/*
					if($datos[0]["concepto_2"]>0)
					{			
						$template							.=$this->__TEMPLATE($this->sys_module . "html/PDF_FORMATO2");						
						$words["matricula3_2"]				=$datos[0]["trabajador_clave"];
						
						$template							=$this->__REPLACE($template,$words);				
					}
					*/
				}	
			}	

			return                  					$template;
		}	
		############################################################################################################
   		public function __RECIBIR_DELEGACION()
    	{
			if(isset($this->request["rh_calculo"]))
			{
				foreach($this->request["rh_calculo"] as $id)
				{
					$data=$this->__BROWSE($id);	
					if(isset($data["data"][0]) AND $data["data"][0]["f_d_recibio"]=="")
					{											
						$data_recibido					=array();

						$data_recibido["f_estatus"]			=$_SESSION["var"]["datetime"];
						$data_recibido["estatus"]			="Recibida por la delegacion";
						$data_recibido["d_estatus"]			="La delegacion recibio la solicitud de reclamacion por parte de tu adscripcion";		
						
						$data_recibido["d_recibio"]			=$_SESSION["user"]["name"];
						$data_recibido["m_d_recibio"]		=$_SESSION["user"]["email"];				
						$data_recibido["f_d_recibio"]		=$_SESSION["var"]["datetime"];
						
						$this->__SAVE($data_recibido);				
					}
				}			
			}    	
		}	
		############################################################################################################
   		public function __CALCULO_PROCESADO()
    	{
			if(isset($this->request["rh_calculo"]))
			{
				foreach($this->request["rh_calculo"] as $id)
				{
					$data=$this->__BROWSE($id);	
					if(isset($data["data"][0]) AND $data["data"][0]["f_calculo"]=="" AND $data["data"][0]["f_p_recibio"]!="")
					{											
						$data_recibido					=array();

						$data_recibido["f_estatus"]			=$_SESSION["var"]["datetime"];
						$data_recibido["estatus"]			="Reclamacion Generada";	
						$data_recibido["d_estatus"]			="El Departamento de personal de tu adscripcion, genero la documentacion para enviar la solicitu de reclamacion a la delegacion";	
						
						
						$data_recibido["calculo"]			=$_SESSION["user"]["name"];
						$data_recibido["m_calculo"]			=$_SESSION["user"]["email"];				
						$data_recibido["f_calculo"]			=$_SESSION["var"]["datetime"];
												
						$this->__SAVE($data_recibido);				
					}
				}			
			}    	
		}
   		public function __CALCULO_RECIBIDO()
    	{
			if(isset($this->request["rh_calculo"]))
			{
				foreach($this->request["rh_calculo"] as $id)
				{
					$data=$this->__BROWSE($id);	
					if(isset($data["data"][0]) AND $data["data"][0]["f_calculo"]=="" AND $data["data"][0]["f_d_recibio"]!="")
					{											
						$data_recibido					=array();

						$data_recibido["f_estatus"]			=$_SESSION["var"]["datetime"];
						$data_recibido["estatus"]			="Reclamacion Recibida";	
						$data_recibido["d_estatus"]			="La delegacion del estado, recibio la documentacion de tu solicitud de reclamacion";	
						
						$data_recibido["f_calculo"]			=$_SESSION["var"]["datetime"];
						
						$this->__SAVE($data_recibido);				
					}
				}			
			}    	
		}
		
   		public function __CALCULO_IMPROCEDENTE()
    	{
			if(isset($this->request["rh_calculo"]))
			{
				foreach($this->request["rh_calculo"] as $id)
				{
					$data=$this->__BROWSE($id);	
					if(isset($data["data"][0]) AND $data["data"][0]["f_calculo"]=="")
					{											
						$data_recibido					=array();

						$data_recibido["f_estatus"]			=$_SESSION["var"]["datetime"];
						$data_recibido["estatus"]			="Improcedente por Adscripcion";
												
						if($data["data"][0]["d_calculo"]=="")
							$data_recibido["d_estatus"]		="Esta solicitud es improcedente, porque no hay evidencia para sustentar la solicitud.";
																							
						$this->__SAVE($data_recibido);				
					}
				}			
			}    	
		}	
   		public function __CALCULO_PROCEDENTE()
    	{
			if(isset($this->request["rh_calculo"]))
			{
				foreach($this->request["rh_calculo"] as $id)
				{
					$data=$this->__BROWSE($id);	
					if(isset($data["data"][0]) AND $data["data"][0]["f_d_recibio"]!="")
					{											
						$data_recibido					=array();

						$data_recibido["f_estatus"]			=$_SESSION["var"]["datetime"];
						$data_recibido["estatus"]			="Procedente en Delegacion";
												
						if($data["data"][0]["d_calculo"]=="")
							$data_recibido["d_estatus"]		="Esta solicitud es procedente, porque se tiene evidencia para sustentar la reclamacion.";

						$data_recibido["autorizo"]			=$_SESSION["user"]["name"];
						$data_recibido["m_autorizo"]		=$_SESSION["user"]["email"];				
						$data_recibido["f_autorizo"]		=$_SESSION["var"]["datetime"];
																							
						$this->__SAVE($data_recibido);				
					}
				}			
			}    	
		}	

   		public function __CALCULO_RECHAZO()
    	{
			if(isset($this->request["rh_calculo"]))
			{
				foreach($this->request["rh_calculo"] as $id)
				{
					$data=$this->__BROWSE($id);	
					if(isset($data["data"][0]) AND $data["data"][0]["f_calculo"]=="")
					{											
						$data_recibido					=array();

						$data_recibido["f_estatus"]			=$_SESSION["var"]["datetime"];
						$data_recibido["estatus"]			="Devuelta por Adscripcion";

						$data_recibido["devuelve"]			=$_SESSION["user"]["name"];
						$data_recibido["m_devuelve"]		=$_SESSION["user"]["email"];				
						$data_recibido["f_devuelve"]		=$_SESSION["var"]["datetime"];
												
						if($data["data"][0]["d_calculo"]=="")
							$data_recibido["d_estatus"]		="Esta solicitud es devuelta por falta de documentacion.";
							
						$this->__SAVE($data_recibido);				
					}
				}			
			}    	
		}	
		############################################################################################################
   		public function __RECIBIR_ADSCRIPCION()
    	{
			if(isset($this->request["rh_calculo"]))
			{
				foreach($this->request["rh_calculo"] as $id)
				{
					$data=$this->__BROWSE($id);
					
					
						
					if(isset($data["data"][0]) AND $data["data"][0]["f_p_recibio"]=="" OR $data["data"][0]["f_devolucion"]!="0000-00-00 00:00:00")
					{											
						$data_recibido					=array();

						$data_recibido["f_estatus"]			=$_SESSION["var"]["datetime"];
						$data_recibido["estatus"]			="Recibida por la adscripcion";	
						$data_recibido["d_estatus"]			="Tu representante sindical entrega la documentacion al departamento de personal de tu adscripcion";	
						
						$data_recibido["p_recibio"]			=$_SESSION["user"]["name"];
						$data_recibido["m_p_recibio"]		=$_SESSION["user"]["email"];				
						$data_recibido["f_p_recibio"]		=$_SESSION["var"]["datetime"];
						
						$this->__SAVE($data_recibido);				
					}
				}			
			}    	
		}	

   		public function __REPORT_FILTRO($option)    // PASO 1
    	{
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
			
			#$option["where"]=array("estatus =''");
			
			$option["where"][]				="f_p_recibio is NULL";				
			
			
			$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_elaboro\"]. ' + 5 days')) < date('Y-m-d')";
			$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_elaboro\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
			
			
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";	
			}
				
			if($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
				$option["actions"]["check"]		="$"."row[\"f_p_recibio\"] == ''";	
			}
			

			return $this->__REPORTE($option);
		}	


		############################################################################################################
		
   		public function __REPORT_PENDIENTE()    // PASO 1
    	{
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
			
			#$option["where"]=array("estatus =''");
			
			$option["where"][]				="f_p_recibio is NULL";				
			
			
			$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_elaboro\"]. ' + 5 days')) < date('Y-m-d')";
			$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_elaboro\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
			
			
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				$option["where"][]				="1=1 OR estatus='Devuelta por Adscripcion'";
			
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";	
				$this->words["module_title"]	="";
								
			}
				
			if($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
				$option["actions"]["check"]		="$"."row[\"f_p_recibio\"] == ''";	
				
				$this->words["module_title"]	="Reporte de Solicitudes de Reclamaciones Pendientes por Recibir";
			}
			

			return $this->__REPORTE($option);
		}	
		############################################################################################################
   		public function __REPORT_RECIBIDO() // PASO 2
    	{
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
			
			
			if($this->__NIVEL_SESION("==0")==true)	 // EDUARDO VIZCAINO
			{			
				$option["where"][]				="f_p_recibio != ''";					
				$option["where"][]				="f_calculo is NULL";		
							
				$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 5 days')) < date('Y-m-d')";
				$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 3 days')) < date('Y-m-d')";
			}	
			else if($this->__NIVEL_SESION(">=50")==true)	 // NIVEL USUARIO SINDICATO Y ADSCRIPCION			
			{			
				
				$option["where"][]				="f_p_recibio != ''";					
				$option["where"][]				="f_calculo is NULL";		
				$option["where"][]				="estatus ='Recibida por la adscripcion'";
							
				$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 5 days')) < date('Y-m-d')";
				$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 3 days')) < date('Y-m-d')";

				#$option["echo"]		="Entregado";	
				if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
				{	
					$this->sys_fields["f_p_recibio"]["title_filter"]      = "F Entrega";
														
					$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";
					
						
				}				
				elseif($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
				{			
					$this->__RECIBIR_ADSCRIPCION();
					
					
					
					
					$this->sys_fields["f_p_recibio"]["title_filter"]      = "F Recepcion";				
					#$option["where"][]				="f_devuelve is null";
						    	    
					$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
					$option["actions"]["check"]		="$"."row[\"f_p_recibio\"]!= ''";	
					$this->words["module_title"]	="Solicitudes de Reclamaciones Recibidas en Adscripcion";
				}
			}	

			elseif($this->__NIVEL_SESION("==40")==true)	 // NIVEL USUARIO DELEGACION 
			{			
				$this->__RECIBIR_DELEGACION();
			
				$option["where"][]				="f_d_recibio != ''";					
				
				//$option["where"][]				="f_calculo is NULL";		
							
				$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_d_recibio\"]. ' + 5 days')) < date('Y-m-d')";
				$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_d_recibio\"]. ' + 3 days')) < date('Y-m-d')";

				//$this->__RECIBIR_ADSCRIPCION();
				$option["actions"]["write"]		="$"."row[\"f_d_recibio\"]!=''";	
				$option["actions"]["check"]		="$"."row[\"f_d_recibio\"]!= ''";	
			}
			

			return $this->__REPORTE($option);
		}	
		############################################################################################################
   		public function __REPORT_CALCULO() // PASO 3 -1
    	{
    		//$this->__CALCULO_PROCESADO();    	    		
    		
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
						
			$option["where"][]				="f_calculo != ''";						
			$option["where"][]				="f_d_recibio is NULL";					
										
			$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_calculo\"]. ' + 5 days')) < date('Y-m-d')";
			$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_calculo\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
						
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";	
			}				
			elseif($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			
				$this->__CALCULO_PROCESADO();
				#$option["actions"]["check"]		="$"."row[\"f_p_recibio\"] != ''";	
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
			}
			elseif($this->__NIVEL_SESION("==40")==true)	 // NIVEL USUARIO DELEGACION 
			{			
				$this->__CALCULO_RECIBIDO();
				$option["actions"]["check"]		="$"."row[\"f_calculo\"] != ''";	
				#$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
			}
			
			
			
			return $this->__REPORTE($option);
		}						
		############################################################################################################
   		public function __REPORT_RECHAZO() // PASO 3 - 2
    	{
    		$this->__CALCULO_RECHAZO();
    		
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
												
			$option["where"][]				="estatus = 'Devuelta por Adscripcion'";						
										
			$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 5 days')) < date('Y-m-d')";
			$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
						
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";	
			}
				
			if($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			
				#$option["actions"]["check"]		="$"."row[\"f_p_recibio\"] != ''";	
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
			}
			$option["actions"]["check"]		="1==1";	
			$option["actions"]["write"]		="1==1";	
			
			return $this->__REPORTE($option);
		}	

   		public function __REPORT_IMPROCEDENTE() // PASO 3 - 2
    	{
    		#$this->__CALCULO_IMPROCEDENTE();
    		
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
												
			$option["where"][]				="estatus = 'Improcedente por Adscripcion'";						
										
			$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 5 days')) < date('Y-m-d')";
			$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
						
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";	
			}
				
			if($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			
				#$option["actions"]["check"]		="$"."row[\"f_p_recibio\"] != ''";	
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
			}
			
			return $this->__REPORTE($option);
		}	
   		public function __REPORT_PROCEDENTE() // PASO 3 - 2
    	{
    		$this->__CALCULO_PROCEDENTE();
    		
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
												
			$option["where"][]				="estatus = 'Procedente en Delegacion'";						
										
			#$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 5 days')) < date('Y-m-d')";
			#$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
						
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				#$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";	
			}
				
			if($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			

				#$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
			}
			
			return $this->__REPORTE($option);
		}	

		
		############################################################################################################
   		public function __REPORT_ENVIAR()
    	{
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
						
			$option["where"][]				="f_p_recibio != ''";										
						
			$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 5 days')) < date('Y-m-d')";
			$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_p_recibio\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
						
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]==''";	
			}
				
			if($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			
				$option["actions"]["check"]		="$"."row[\"f_p_recibio\"] != ''";	
				$option["actions"]["write"]		="$"."row[\"f_p_recibio\"]!=''";	
			}			

			return $this->__REPORTE($option);
		}						
   		public function __REPORT_ENVIADO()
    	{
    		#$this->__RECIBIR_DELEGACION();
			$option				=array();			
			$option["where"]	=array();
			$option["color"]	=array();
						
			$option["where"][]				="f_d_recibio != ''";				
			
			#$option["color"]["red"]							="$"."row[\"estatus\"]=='Devuelta por Adscripcion'";
			$option["color"]["purple"]		="date('Y-m-d', strtotime($"."row[\"f_d_recibio\"]. ' + 5 days')) < date('Y-m-d')";
			$option["color"]["blue"]		="date('Y-m-d', strtotime($"."row[\"f_d_recibio\"]. ' + 3 days')) < date('Y-m-d')";
			#$option["color"]["black"]		="1==1";
			
			
			if($this->__NIVEL_SESION("==60")==true)	 // NIVEL USUARIO SINDICATO 			
			{					
				$option["actions"]["write"]		="$"."row[\"f_d_recibio\"]==''";	
			}
				
			if($this->__NIVEL_SESION("==50")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{			
				$option["actions"]["write"]		="$"."row[\"f_d_recibio\"]!=''";	
			}
			

			return $this->__REPORTE($option);
		}						

   		public function __REPORT_APROVADO()
    	{
			$option["actions"]["write"]					="$"."row[\"estatus\"]==''  OR $"."this->__NIVEL_SESION(\"<=20\")==true";
			$option["actions"]["delete"]				="false";

		}				
   		public function __REPORTE($option="")
    	{			
			if($option=="")	$option=array();
		
			if(!isset($option["actions"]))				$option["actions"]							= array();
			if(!isset($option["color"]))				$option["color"]							= array();
			
			if(!isset($option["actions"]["check"]))
				$option["actions"]["check"]					="false";
			if(!isset($option["actions"]["write"]))
				$option["actions"]["write"]					="false";

			if($this->__NIVEL_SESION("=0")==true)	 // NIVEL USUARIO ADSCRIPCION 
			{													
				$option["actions"]["write"]					="true";	

			}
			if($this->sys_private["section"]!="section_rechazo")
				$option["color"]["red"]					="$"."row[\"estatus\"]=='Devuelta por Adscripcion'";
			$option["color"]["black"]				="1==1";						

			#array_unshift($option["color"], "red""$"."row[\"estatus\"]=='Rechazada en Adscripcion'";			

			$option["actions"]["show"]					="$"."row[\"estatus\"]!='CANCELADO'";			
			$option["actions"]["delete"]				="false";

			if(isset($this->sys_private["order"]) AND $this->sys_private["order"]=="")
				$option["order"]="id desc";
			
			return $this->__VIEW_REPORT($option);
		}						
/*
   		public function __REPORT_ESPECIFICO()
    	{
			$this->sys_fields["departamento_id"]	=array("title"             => "Departamento");
			$this->sys_fields["puesto_id"]			=array("title"             => "Categoria");
			$this->sys_fields["jornada"]			=array("title"             => "Jornada");

				## GUARDAR USUARIO
			$option=array();			
			$option["template_title"]	                = $this->sys_module . "html/report_especifico_title";
			$option["template_body"]	                = $this->sys_module . "html/report_especifico_body";
			
			$option["select"]=array(				
				"trabajador_clave",
				"left(departamento_id,6)"	=>"departamento_id",
				"right(puesto_id,2)"		=>"jornada",
				"puesto_id",				
				"sum(total)"				=>"total",
			);				
			$option["where"]=array(
				"dias LIKE '%/". date("n")."/%'",	
				"estatus = 'APROVADO'"
			);
			
			if($this->__NIVEL_SESION(">=20")==true)	 // NIVEL ADMINISTRADOR 			
			{					
				$option["where"][]="left(trabajador_departamento,6)=left('{$_SESSION["user"]["departamento_id"]}',6)";				
			}
			
			$option["from"]="personal_txt join plazas on trabajador_clave=matricula";
			$option["group"]="trabajador_clave";
			
			$option["actions"]							="false";
			
			#$option["echo"]="REPORT1";
			
			return $this->__VIEW_REPORT($option);
		}				
*/
   		public function __REPORT_GENERAL()
    	{
			$this->sys_fields["unidad"]=array("title"             => "Unidad");
			$this->sys_fields["Ene"]=array("title"             => "Ene");
			$this->sys_fields["Feb"]=array("title"             => "Feb");
			$this->sys_fields["Mar"]=array("title"             => "Mar");
			$this->sys_fields["Abr"]=array("title"             => "Abr");
			$this->sys_fields["May"]=array("title"             => "May");
			$this->sys_fields["Jun"]=array("title"             => "Jun");
			$this->sys_fields["Jul"]=array("title"             => "Jul");
			$this->sys_fields["Ago"]=array("title"             => "Ago");
			$this->sys_fields["Sep"]=array("title"             => "Sep");
			$this->sys_fields["Oct"]=array("title"             => "Oct");
			$this->sys_fields["Nov"]=array("title"             => "Nov");
			$this->sys_fields["Dic"]=array("title"             => "Dic");
			
				## GUARDAR USUARIO
			$option=array();			
			$option["template_title"]	                = $this->sys_module . "html/report_general_title";
			$option["template_body"]	                = $this->sys_module . "html/report_general_body";
			
			$option["select"]=array(
				"trabajador_puesto",
				#"IF(LOCATE('/1/',dias)>0,SUM(total),0)"=>"Ene",
				"IF(locate('/1/',group_concat(dias))>0,sum(total),0)"=>"Ene",
				"IF(locate('/2/',group_concat(dias))>0,sum(total),0)"=>"Feb",
				"IF(locate('/3/',group_concat(dias))>0,sum(total),0)"=>"Mar",
				"IF(locate('/4/',group_concat(dias))>0,sum(total),0)"=>"Abr",
				"IF(locate('/5/',group_concat(dias))>0,sum(total),0)"=>"May",
				"IF(locate('/6/',group_concat(dias))>0,sum(total),0)"=>"Jun",
				"IF(locate('/7/',group_concat(dias))>0,sum(total),0)"=>"Jul",
				"IF(locate('/8/',group_concat(dias))>0,sum(total),0)"=>"Ago",
				"IF(locate('/9/',group_concat(dias))>0,sum(total),0)"=>"Sep",
				"IF(locate('/10/',group_concat(dias))>0,sum(total),0)"=>"Oct",
				"IF(locate('/11/',group_concat(dias))>0,sum(total),0)"=>"Nov",
				"IF(locate('/12/',group_concat(dias))>0,sum(total),0)"=>"Dic",
			);				
			$option["from"]="personal_txt join plazas on trabajador_clave=matricula";
			$option["where"]=array(
				"dias LIKE '%/". date("n")."/%'",	
				"estatus = 'APROVADO'"
			);
			if($this->__NIVEL_SESION(">=20")==true)	 // NIVEL ADMINISTRADOR 			
			{					
				$option["where"][]="left(trabajador_departamento,6)=left('{$_SESSION["user"]["departamento_id"]}',6)";				
			}

			$option["group"]="trabajador_puesto";
			
			$option["actions"]							="false";
			
			/*
			99062212    1ra de junio    Ma sara marquez preciado
			*/						
			return $this->__VIEW_REPORT($option);
		}				
	}
?>
