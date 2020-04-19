	var mensaje="";
	var obj;

	$(document).ready(function()
	{		
		$("#matricula").focusout(function() 
		{	
			if($(this).val()!="")
			{
				$.ajax({
					type: 'GET',
					url: '../modulos/plazas/ajax/index.php',
					contentType:"application/json",
					data:"&matricula="+$(this).val(),				
					success: function (response) 
					{
						obj = $.parseJSON( response);				
						
						if(obj[0].turno==null || obj[0].turno==4)			
						{	
							$("#trabajador_turno")
								.removeAttr("disabled")
								.focus();
						}	
					}
				});
			}	
		});	
		
    });
    
    // ###########################################################################
    // ######################### FUNCIONES #######################################
    // ###########################################################################
    
