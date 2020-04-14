<?php	
	require_once("nucleo/sesion.php");
	
	#print_r($_FILES);
	
	$eval="$"."objeto=new {$_GET["sys_name"]}();";
	eval($eval);
	
	#$objeto->__PRINT_R($objeto);
		
	if(is_array($_FILES))
	{
		foreach($_FILES as $datas)
		{
			if(@is_array($datas))
			{							
				if(isset($datas["error"]) AND $datas["error"]==0)
				{
                    

					$uploads_dir 			= 'modulos/files/file';

					$tmp_name 				= $datas["tmp_name"];
					$name 					= $datas["name"];
					$type 					= $datas["type"];

					$path					="$uploads_dir/$name";
				
					####################################################
					if($_GET["seccion_import"]=="subiendo_archivo")
					{			
						if (!copy($tmp_name, $path)) 							
							echo "Error al copiar $path...\n";
						else
							echo "{
								\"mensaje\":\"SUBIENDO ARCHIVO\",
								\"path\":\"$path\",
								\"name\":\"$name\"									
							}";												
					}		
					elseif($_GET["seccion_import"]=="preparar_tabla")
					{
						echo "<br>PREPARAR TABLA";
						
					}	
					####################################################
					elseif($_GET["seccion_import"]=="cargar_tabla")
					{
						$comando_sql="
							LOAD DATA INFILE '$path' 
							INTO TABLE {$objeto->sys_table} 
							FIELDS TERMINATED BY '{$objeto->sys_import["fields"]}' 
							ENCLOSED BY '{$objeto->sys_import["enclosed"]}'
							LINES TERMINATED BY '{$objeto->sys_import["lines"]}'
							IGNORE {$objeto->sys_import["ignore"]} ROWS;
						";
						echo $comando_sql;
						$objeto->__EXECUTE($comando_sql);
						echo "<br>CARGANDO TABLA $comando_sql";
					}	
					####################################################
					elseif($_GET["seccion_import"]=="actualizando_datos")
					{
						echo "<br>ACTUALIZANDO TABLA";
					}
				}	
			}	
		}	
	}
	####################################################
	
?>
