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
            unset($this->sys_fields["sesion_start"]);
            unset($this->sys_fields["company_id"]);

            $this->__PRINT_R($this->sys_fields);
			parent::__CONSTRUCT($option);
		}				
	}
?>
