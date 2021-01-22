<?php
	class menu_sub extends general
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $sys_table	="menu";
		##############################################################################	
		##  Metodos	
		##############################################################################
		public function __CONSTRUCT($option=NULL)
		{
			parent::__CONSTRUCT($option);
		}
        #/*		
		public function __SAVE($datas=NULL,$option=NULL)
    	{
    		parent::__SAVE($datas,$option);
		}		
		#*/
	}
?>
