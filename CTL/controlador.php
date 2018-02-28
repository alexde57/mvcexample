<?php
ini_set('default_charset','utf8'); 
ini_set('display_errors', 'Off');//cambiar a off

include_once '../MDL/modelo.php';


error_reporting(E_ALL);

$nombreobjeto = new cls_nombreclase_modelo();
$obj = new stdClass();

$var_app=$_GET['var_app'];

if(isset($_REQUEST['oper_s'])){	

	$oper = $_REQUEST['oper_s'];

	$nombreobjeto->act_id       = $_REQUEST['act_id'];
	$nombreobjeto->sact_id      = $_REQUEST['sact_id'];
	$nombreobjeto->sact_descripcion      = $_REQUEST['sact_descripcion'];
	$nombreobjeto->sact_pun     = $_REQUEST['sact_pun'];	
	$nombreobjeto->sact_glb     = $_REQUEST['sact_glb'];		
	$nombreobjeto->sact_baseref = $_REQUEST['sact_baseref'];		
	$nombreobjeto->sact_codbase = $_REQUEST['sact_codbase'];		
	$nombreobjeto->act_codigo   = $_REQUEST['act_codigo'];					
			
		//echo "ENTRO AQUI";
		$mensaje="ENTRO CON OPCION:  ".$oper;
		switch ($oper) {
			case "add":
				$mensaje =$nombreobjeto->Insert();
			break;
			case "edit":
				$mensaje =$nombreobjeto->Update();
			break;
			case "del":
				$mensaje =$nombreobjeto->Delete();
			break;
		}
		
	    $obj->mensaje=$mensaje;

		echo json_encode($obj);		
		//return;
}





?>