<?php	

if (!class_exists('cls_conexion')) {include("../../COR/GNR/CNX/pg_cor_conexion.php");
}

	
class cls_nombreclase_modelo{
	var $sact_id;	
	var $act_codigo;
	var $act_id;
	var $sact_descripcion;
	var $sact_glb;
	var $sact_pun;	
	var $sact_baseref;
	var $sact_codbase;
	


		
	function Insert(){
		$conexion = new cls_conexion();
		$conexion->conectarOracle();
	
	
			
		$sql="INSERT INTO nombre_base.nombre_tabla (act_id,act_codigo,sact_descripcion,sact_glb,sact_pun,sact_baseref,sact_codbase) 
		      values ('".$this->act_id."','".$this->act_codigo."','".$this->sact_descripcion."','".$this->sact_glb."','".$this->sact_pun."','".$this->sact_baseref."','".$this->sact_codbase."') RETURNING sact_id";
		
		
		@$result= pg_query($conexion->con,$sql);
		if ($result) {
					//Tecnicos
					$oid = 0;//pg_last_oid($result);
					
					while($row = pg_fetch_array($result))
					{
						$oid = $row['sact_id'];
					}
					$this->sact_id= $oid;
			
				return "REGISTRO INSERTADO";
		} else {
				return "ERROR AL INSERTAR ".pg_last_error($conexion->con);
		}
		
	}
		
	function Update(){
		$conexion = new cls_conexion();
		$conexion->conectarOracle();

		$sqlEdit="UPDATE nombre_base.nombre_tabla SET  
				  act_id = '".$this->act_id."', 
				  act_codigo = '".$this->act_codigo."', 
				  sact_descripcion = '".$this->sact_descripcion."',
				  sact_glb = '".$this->sact_glb."',
				  sact_pun = '".$this->sact_pun."',
				  sact_baseref = '".$this->sact_baseref."',
				  sact_codbase = '".$this->sact_codbase."'				  				  				  				  
			      WHERE sact_id = '".$this->sact_id."'";
		
				@$result= pg_query($conexion->con,$sqlEdit);
				if ($result) {
						return "REGISTRO ACTUALIZADO";
		
				} else {
						return "ERROR AL ACTUALIZAR ".pg_last_error($conexion->con);
						//return pg_last_error($conexion->con);
				}
		
		}
		
	function Delete(){
		$conexion = new cls_conexion();
		$conexion->conectarOracle();

		$sqlDelSub = "delete from  nombre_base.nombre_tabla c where c.sact_id = '".$this->sact_id."' ";
				
		@$result= pg_query($conexion->con,$sqlDelSub);
		 
		 	 if($result){
				 
				  return "REGISTRO ELIMINADO";		
				 			 
			 }else{
					return "ERROR AL ELIMINAR TECNICOS ".pg_last_error($conexion->con);	 
			 }
		 
		
	  }//fin de funsion eliminar

	
}//Fin de clase cls_nombreclase_modelo	

?>