<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario</title>

<script>
$(document).ready(function(){
			$("#btnGuadarIngSAct").on("click", function(data){
				guardarDatos();
				return false;
			});	
 });
	 

		function guardarDatos(){
			$.ajax({
					url: "../CTL/controlador.php?oper_s=add",						 		 
					type: "POST",             // Type of request to be send, called as method
				    data: $('#frmIDSAct').serialize(),
					dataType: "json",
					success: function(data)   // A function to be called if request succeeds
					  {
						  $("#txtMensajeResultadoDl").empty();
						  $("#txtMensajeResultadoDl").append(data.mensaje);						  
						  alert(data.mensaje);

					  }
					});		
		}		 
</script>
<style>	
		.inp_dlg{
			border:solid 1px;
			background:none;
		}
</style>
</head>

<body>
<div role="alert" id="txtMensajeResultadoDl"></div>
<div align="right"><button id="btnGuadarIngSAct">Guardar</button></div>
<form id="frmIDSAct" >
<fieldset  style="border:solid 1px;padding:27px;">
<legend><strong>Datos</strong></legend>
	<input type="hidden" name="sact_id" id="sact_id" value="0" />
    <label for="sact_descripcion"><strong>Descripción (Campo Obligatorio):</strong></label><br>
    <input type="text" name="sact_descripcion" id="sact_descripcion" style="border:solid 1px;background:none;" /><br>
    <input type="hidden" name="act_codigo" id="act_codigo" value="<?php echo $_REQUEST['act_codigo']; ?>" />
    <input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id']; ?>" />    

    <label for="sact_glb"><strong>Unidad:</strong></label><br>
    <input type="text" name="sact_glb" id="sact_glb" style="border:solid 1px;background:none;" /><br>

    <label for="sact_pun"><strong>Precio:</strong></label><br>
    <input type="text" name="sact_pun" id="sact_pun" style="border:solid 1px;background:none;" /><br>

    <label for="sact_baseref"><strong>Base Referencia:</strong></label><br>
    <input type="text" name="sact_baseref" id="sact_baseref" style="border:solid 1px;background:none;" /><br>

    <label for="sact_codbase"><strong>Codigo Base:</strong></label><br>
    <input type="text" name="sact_codbase" id="sact_codbase" style="border:solid 1px;background:none;" /><br>
    
    
</fieldset>
</form>

</body>
</html>