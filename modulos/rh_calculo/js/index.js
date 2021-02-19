	function muestra_diferente(objeto)
	{
		
		if($(objeto).prop('checked')!=true)
		{
			$("div.diferente").hide();
		}
		else			
		{			
			$("div.diferente").show();					
		}	
	
	}
	$(document).ready(function()
	{					
		$("font#autorizacion").click(function(){
			$.ajax({
				type: 'GET',
				url: '../modulos/rh_calculo/ajax/autorizar_reclamacion_ads.php',
				contentType:"application/json",
				data:"&fecha=",
				success: function (res) 
				{
					$("div#message").html(res);
					$("div#message").dialog({
						width:"700px"									
					});															
				}
			});

			
			

		});
		reporte_ajax($("input#trabajador_clave").val(),$("input#registro").val());
		
		muestra_diferente($("#rh_calculo_che_plaza"));
		$("#rh_calculo_che_plaza").click(function(){
		
			muestra_diferente(this);
		});
	

		$("#registro").change(function() 
		{		
			reporte_ajax($("input#trabajador_clave").val(),$(this).val());
		});
		$("#trabajador_clave").focusout(function() 
		{		
			$.ajax({
				type: 'GET',
				url: '../modulos/personal/ajax/personal_calculo.php',
				contentType:"application/json",
				data:"&matricula="+$(this).val(),				
				success: function (response) 
				{
					var obj = $.parseJSON( response);
					valida_matricula("trabajador", obj);
				}
			});		
			reporte_ajax($(this).val(),$("input#registro").val());
		});	
		$("#trabajador_plaza_1").focusout(function() 
		{	
			var path="";
			var datas="";
			if($(this).val()>0)
			{	
				path	="../modulos/plazas/ajax/plaza_calculo.php";
				datas	="&plaza="+$(this).val();
			}	
			else
			{
				path="../modulos/plazas/ajax/plaza_0.php";	
				datas	="&puesto_id="+ $("input#trabajador_puesto_id").val();
			}
				$.ajax({
					type: 			'GET',
					url: 			path,
					contentType:	"application/json",
					data:			datas,				
					success: function (response) 
					{
						var obj = $.parseJSON( response);
						bases(obj,1);
					}
				});			
			
			
		});			
    });
	
	function valida_matricula(tipo, obj,)
	{
		if(obj.length>0)
		{		
			$("#"+tipo+"_nombre").val(obj[0].nombre);
			
			$("#"+tipo+"_nombre").val(obj[0].ocupante);
			
			if($("#"+tipo+"_puesto").length)			$("#"+tipo+"_puesto").val(obj[0].categoria);
			
			if($("#"+tipo+"_puesto_id").length)			$("#"+tipo+"_puesto_id").val(obj[0].puesto_id);
			if($("#"+tipo+"_horario").length)			$("#trabajador_horario").val(obj[0].horario);
			if($("#"+tipo+"_departamento").length)		$("#"+tipo+"_departamento").val(obj[0].adscripcion2);
			if($("#"+tipo+"_departamento_id").length)	$("#"+tipo+"_departamento_id").val(obj[0].departamento_id);
			//if($("#"+tipo+"_plaza").length)				$("#"+tipo+"_plaza").val(obj[0].clave);
			if($("#"+tipo+"_plaza").length)				$("#"+tipo+"_plaza").val(obj[0].plaza_id);
			
			if($("#sueldo").length)						$("#sueldo").val(obj[0].sueldo/2);
						
			if($("#turno").length)						
			{	
				$("#turno").val(obj[0].turno);
				if(obj[0].turno=="")	
				{
					$("#turno").attr({'placeholder':'1:matutino, 2:vespertino, 3:nocturno, 4:mixto, 5:Jorn Acum'});
					$("#turno").attr({'title':'1:matutino, 2:vespertino, 3:nocturno, 4:mixto, 5:Jorn Acum'});
					$("#turno").attr({'style':'border:1px solid red;'});										
				}
			}
			bases(obj);
		}	
		else
		{
			$("#"+tipo+"_nombre").val("");
			if($("#"+tipo+"_puesto").length)	$("#"+tipo+"_puesto").val("");
			if($("#"+tipo+"_horario").length)	$("#"+tipo+"_horario").val("");		
			if($("#"+tipo+"_plaza").length)		$("#"+tipo+"_plaza").val("");
			if($("#"+tipo+"_departamento").length)		$("#"+tipo+"_departamento").val("");
			$("#turno").val("");
		}		
	}	
	
	function bases(obj, grupo)
	{
		if(grupo==undefined)	grupo="";
		else					grupo="_1";
		if(obj.length>0)
		{		
			if($("#sueldo"+grupo).length)						$("#sueldo"+grupo).val(obj[0].sueldo);
			if($("#turno"+grupo).length)						$("#turno"+grupo).val(obj[0].turno);
			if($("#trabajador_puesto"+grupo).length)			$("#trabajador_puesto"+grupo).val(obj[0].categoria);
			if($("#trabajador_puesto_id"+grupo).length)			$("#trabajador_puesto_id"+grupo).val(obj[0].puesto_id);
			if($("#trabajador_horario"+grupo).length)			$("#trabajador_horario"+grupo).val(obj[0].horario);			
			if($("#trabajador_departamento").length)			$("#trabajador_departamento").val(obj[0].adscripcion2);
			if($("#trabajador_dependencia").length)				$("#trabajador_dependencia").val(obj[0].dependencia );
			
			
			if($("#b2"+grupo).length)							$("#b2"+grupo).val(obj[0].b2);
			if($("#b3"+grupo).length)							$("#b3"+grupo).val(obj[0].b3);
			if($("#b4"+grupo).length)							$("#b4"+grupo).val(obj[0].b4);
			if($("#b5"+grupo).length)							$("#b5"+grupo).val(obj[0].b5);	
			if($("#b6"+grupo).length)							$("#b6"+grupo).val(obj[0].b6);
			if($("#b7"+grupo).length)							$("#b7"+grupo).val(obj[0].b7);
			if($("#b8"+grupo).length)							$("#b8"+grupo).val(obj[0].b8);
			if($("#b9"+grupo).length)							$("#b9"+grupo).val(obj[0].b9);			
			
			var matricula="";
			if(obj[0].matricula!="")							matricula		="Matricula:\t" + obj[0].matricula + ",\n";


			
			motivo=matricula + "Plaza:\t\t" + obj[0].clave + ", \nHorario:\t" + obj[0].horario + ", \nPuesto:\t\t"+ obj[0].puesto;
			if(grupo=="") motivo="";
			
			$("#motivo").val(motivo);			
			
		}	
	}		
	function reporte_ajax(matricula,fecha)
	{
		$.ajax({
			type: 'GET',
			url: '../modulos/rh_calculo/ajax/verificar_reclamacion_unica.php',
			contentType:"application/json",
			data:"&sys_section_rh_calculo=section_rechazo&matricula="+matricula+"&fecha="+fecha,
			success: function (res) 
			{
				$("div#REPORT").html(res);
			}
		});
	}
	
    
    // ###########################################################################
