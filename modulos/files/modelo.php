<?php
	#if(file_exists("nucleo/general.php")) require_once("nucleo/general.php");
	
	class files extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $sys_enviroments	="DEVELOPER";
		var $path_file	        ="modulos/files/file";
		var $sys_fields		=array(
			"id"			=>array(
			    "title"             => "id",
			    "type"              => "primary key",
			),	
			"file"	    	=>array(
			    "title"             => "archivo",
			    "type"              => "file",
			),
			"type"	    	=>array(
			    "title"             => "Tipo",
			    "type"              => "input",
			),

			"object"	    =>array(
			    "title"             => "Modulo",
			    "type"              => "input",
			),	
			"company_id"	    =>array(
			    "title"             => "Compañia",
			    "type"              => "input",
			),
			"user_id"	    =>array(
			    "title"             => "Usuario",
			    "type"              => "input",
			),						
			"fecha"	    =>array(
			    "title"             => "Fecha",
			    "type"              => "input",
			),						
			"extension"	    =>array(
			    "title"             => "Fecha",
			    "type"              => "hidden",
			),			
			
		);				
		##############################################################################	
		##  Metodos	
		##############################################################################&sys_action=__SAVE
		public function __CONSTRUCT($option=NULL)
		{
			parent::__CONSTRUCT($option);
		}
		public function __DELETE($option=NULL)
		{
    	    if(!is_null($option))
    	    {
    	        $path=$this->path_file ."/$option".".*";    	        
    	        
    	        #$this->__PRINT_R($path);
    	        array_map('unlink', glob($path));
                #unlink();
            }
			parent::__DELETE($option);
		}

   		public function __SAVE($datas=NULL,$option=NULL)
    	{    	   
    		#$option["table"]=$datas;
    	    $return =NULL;
    	    #$this->__PRINT_R($datas);									
			if(@is_array($datas))
			{							
				if(is_null($option))	$option=array();				

				if(isset($datas["error"]) AND $datas["error"]==0)
				{
					$tmp_name 				= $datas["tmp_name"];
					$name 					= $datas["name"];
					$type 					= $datas["type"];
					
					$vtype					=explode(".",$name);
					$ctype					=count($vtype) - 1;
					$extension				=$vtype[$ctype];
					
					$datas["file"]			=$name;
					$datas["type"]			=$type;
					$datas["extension"]		=$extension;
					#$datas["object"]		=@$option["table"];
					$datas["company_id"]	=@$_SESSION["company"]["id"];
					$datas["user_id"]		=@$_SESSION["user"]["id"];
					$datas["fecha"]			=$this->sys_date;
		                
					$return					=parent::__SAVE($datas);

					$path					=$this->path_file."/$return.$extension";

					move_uploaded_file($tmp_name, $path);							

				    if(in_array($extension,array("jpg","jpeg","png","gif")))		
				    {
				        $this->thumbs($path);
				        if(isset($datas["agua"]))
				        {
				            $this->agua($path);
				        }				        
				    }
				}
			}	
		    return $return;	
		}		

   		public function __GET_FILE($id=NULL)
    	{    	    
			$return="";
			if(!is_null($id))
			{
				$data=$this->__BROWSE($id);
				
				if(is_array($data) and count($data)>0)
				{
					if(@array_key_exists("type",$data[0]))
					{
						if($data[0]["type"]=="image/png")		$return="<img src=\"../modulos/files/file/$id.png\">";
						if($data[0]["type"]=="image/jpg")		$return="<img src=\"../modulos/files/file/$id.jpg\">";
					}		
				}				
			}					
		    return $return;	
		}	
        public function agua($path)
        {
            $nombreimg = explode("/", $path);  
            $nombreimg = $nombreimg[count($nombreimg)-1];  
                  
            #$this->redimensionar_imagen($nombreimg, $path, $path."_thumb.jpg",20,15);
            #$this->redimensionar_imagen($nombreimg, $path, $path."_small.jpg",120,90);                        
            #$this->redimensionar_imagen($nombreimg, $path, $path."_medium.jpg",400,300);            
            #$this->redimensionar_imagen($nombreimg, $path, $path."_big.jpg",800,600);            
            
            $this->__PRINT_R("AGUA en files");
        }
        public function thumbs($path)
        {
            $nombreimg = explode("/", $path);  
            $nombreimg = $nombreimg[count($nombreimg)-1];  
                  
            $this->redimensionar_imagen($nombreimg, $path, $path."_thumb.jpg",20,15);
            $this->redimensionar_imagen($nombreimg, $path, $path."_small.jpg",120,90);                        
            $this->redimensionar_imagen($nombreimg, $path, $path."_medium.jpg",400,300);            
            $this->redimensionar_imagen($nombreimg, $path, $path."_big.jpg",800,600);            
        }

        public function redimensionar_imagen($nombreimg, $rutaimg, $ruta_nueva, $xmax, $ymax)
        {              
            $ext = explode(".", $nombreimg);  
            $ext = $ext[count($ext)-1];  
            
            
            if($ext == "jpg" || $ext == "jpeg")  
              $imagen = imagecreatefromjpeg($rutaimg);  
            elseif($ext == "png")  
              $imagen = imagecreatefrompng($rutaimg);  
            elseif($ext == "gif")  
              $imagen = imagecreatefromgif($rutaimg);  

            $x = imagesx($imagen);  
            $y = imagesy($imagen);  

            
            /*
            if($x <= $xmax && $y <= $ymax){
              echo "<center>Esta imagen ya esta optimizada para los maximos que deseas.<center>";
              return $imagen;  
            }
            */

            if($x >= $y) {  
              $nuevax = $xmax;  
              $nuevay = $nuevax * $y / $x;  
            }  
            else {  
              $nuevay = $ymax;  
              $nuevax = $x / $y * $nuevay;  
            }  

            $img2 = imagecreatetruecolor($nuevax, $nuevay);  
            imagecopyresized($img2, $imagen, 0, 0, 0, 0, floor($nuevax), floor($nuevay), $x, $y);      
  
            imagejpeg($img2, $ruta_nueva,100);    
        }        				
	}
?>
