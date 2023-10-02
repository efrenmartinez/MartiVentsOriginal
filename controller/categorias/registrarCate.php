<?php

	date_default_timezone_set('America/Mexico_City');
	session_start();
    require_once '../../model/conexion.class.php';
	
    $_conn = new DBManager();
    
$reg=0;
    if ( empty( $_POST['categoria'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar nombre de la categoria.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
	else {
    $tableName='';

	$_regCatego['Categoria'] = $_POST['categoria'];
	$_regCatego['Fecha_Registro']=date("Y-m-d H:i:s");
	
        if($_POST['TipoCat']==1){
            $tableName='CategoriaPrenda';
            
        }else{
            $tableName='CategoriaUser';
        }
        

	if($_conn->Insertar( $tableName, $_regCatego )){
	    
	

	$_return['success'] = true;
	$_return['msg'] = 'Se ha registrado la categoria.';
	echo json_encode($_return);
	die(); 
}else{
	$_return['success'] = false;
	$_return['msg'] = 'No se puede por ahora, intentalo mas tarde.';
	echo json_encode($_return);
	die();
}
		
	}		
?>