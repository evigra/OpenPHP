<?php
	class webHome extends users
	{   
		##############################################################################	
		##  Propiedades	
		##############################################################################
		var $mod_menu       =array();
		var $sys_table		="users";
		##############################################################################	
		##  Metodos	
		##############################################################################
		public function __CONSTRUCT($option=null)
		{			    
            unset($this->sys_fields["usergroup_ids"]);

			parent::__CONSTRUCT($option);
		}		
		
	}
?>
