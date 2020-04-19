	var mensaje="";
	var obj;

	$(document).ready(function()
	{		
		$("#matricula").focusout(function() 
		{	
			if($(this).val()!="")
			{
				$.ajax({
					type:           "GET",
					url:            "../modulos/plazas/ajax/index.php?time=" + Date.now(),
					contentType:    "application/json",
					data:           "&matricula="+$(this).val(),				
					success: function (response) 
					{
						obj = $.parseJSON( response);				

                        $("#ocupante").val(obj[0].ocupante);
                        $("#categoria").val(obj[0].categoria);
                        $("#horario").val(obj[0].horario);					
					}
				});
			}	
		});	
    });
    
    // ###########################################################################
    // ######################### FUNCIONES #######################################
    // ###########################################################################
