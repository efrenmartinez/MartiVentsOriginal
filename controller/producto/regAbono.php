<?php

	date_default_timezone_set('America/Mexico_City');
	session_start();
    require_once '../../model/conexion.class.php';
	
    $_conn = new DBManager();
    
$reg=0;
    if ( empty( $_POST['idProAbon'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Error en la selección del producto.';
		echo json_encode($_return);
		die();
        $reg=1;
	}else if ( empty( $_POST['montoAbono'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Ingrese el monto del abono.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
	else {
	    
   
    $_dataProd = $_conn->get_consulta_general(' Productos ',' where id_Producto = '.$_POST['idProAbon']);
    $costoProducto=$_dataProd[0]['Precio_venta'];
    
    $_dataVentaProd = $_conn->get_consulta_general(' Venta ',' where id_producto = '.$_POST['idProAbon']);
    $montoVenta=$_dataVentaProd[0]['Monto_venta'];
    
    $montoActual=$montoVenta+$_POST['montoAbono'];
    if($montoActual==$costoProducto){
        $estVenta=1;
    }
    else{
        $estVenta=2;
    }
     
	
	$_regAbonoVenta['Monto_venta'] =$montoActual;
	$_regAbonoVenta['Estatus_venta'] =$estVenta;
	$_regAbonoVenta['Fecha_Registro']=date("Y-m-d H:i:s");
	$_regAbonoVenta['id_UserVende']=$_SESSION['id_User'];

	
	if($_conn->Actualizar( 'Venta' , $_regAbonoVenta , ' id_producto='.$_POST['idProAbon']) ){
	
	$_return['success'] = true;
	$_return['msg'] = 'Se ha agregado abono.';
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