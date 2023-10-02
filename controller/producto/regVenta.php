<?php

	date_default_timezone_set('America/Mexico_City');
	session_start();
    require_once '../../model/conexion.class.php';
	
    $_conn = new DBManager();
    
$reg=0;
    if ( empty( $_POST['idProd'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Error en la selección del producto.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
	else {
    
    if(empty($_POST['nombreUsuer'])){
         $nombreUser='Usuario no registrado';
     }
     else{
        $nombreUser=$_POST['nombreUsuer'];
     }
     
    if( empty($_POST['idProv']) ){
        $idUserCompra=0;
        
    }
    else{
        $idUserCompra=$_POST['idProv'];
        
    }
   
    $_dataProd = $_conn->get_consulta_general(' Productos ',' where id_producto = '.$_POST['idProd']);
      if($_POST['opcSelect']==1){//venta
       $estatus_venta=1; 
       $monto=$_dataProd[0]['Precio_venta'];
     }else{//producto apartado
       $estatus_venta=2; 
       $monto=$_POST['montoAbon'];
     }
	$_regVenta['id_producto'] = $_POST['idProd'];
	$_regVenta['id_User'] = $idUserCompra;
	$_regVenta['NombreUsuario'] = $nombreUser;
	$_regVenta['Estatus_venta'] =$estatus_venta;
	$_regVenta['Monto_venta'] =$monto;
	$_regVenta['Fecha_Registro']=date("Y-m-d H:i:s");
	$_regVenta['id_UserVende']=$_SESSION['id_User'];
// 	$_regVenta['KeyUsuario']='keyVenta';
	
// 	echo $_POST['idProd'];
// 	echo '<br>';
// 	echo $idUserCompra;
// 	echo '<br>';
// 	echo $nombreUser;
// 	echo '<br>';
// 	echo $_dataProd[0]['Precio_venta'];
// 	echo '<br>';
// 	echo $_SESSION['id_User'];

	if($_conn->Insertar( 'Venta', $_regVenta )){
	    
	

	$_return['success'] = true;
	$_return['msg'] = 'Se ha registrado la venta.';
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