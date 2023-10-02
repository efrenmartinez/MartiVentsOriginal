<?php

	date_default_timezone_set('America/Mexico_City');
	session_start();
    require_once '../../model/conexion.class.php';
	
    $_conn = new DBManager();
    
$reg=0;
    if ( empty( $_POST['nombreProduct'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar nombre del producto.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
    else if ( empty( $_POST['noProducto'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar el numero del producto.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
    else if ( empty( $_POST['precioCompra'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar precio de compra.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
    else if ( empty( $_POST['precioVent'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar precio de venta.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
    else if ( empty( $_POST['color'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar color.';
		echo json_encode($_return);
		die();
        $reg=1;
	}else if ( empty( $_POST['marca'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar la marca.';
		echo json_encode($_return);
		die();
        $reg=1;
	}else if ( empty( $_POST['catePren'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes seleccionar categoria de la prenda.';
		echo json_encode($_return);
		die();
        $reg=1;
	}else if ( empty( $_POST['cateUser'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes seleccionar categoria para el usuario.';
		echo json_encode($_return);
		die();
        $reg=1;
	}else if ( empty( $_POST['descripcionProd'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar la descripción del producto.';
		echo json_encode($_return);
		die();
        
        $reg=1;
	}
	else {
    
    
	$_actProduct['Producto'] = $_POST['nombreProduct'];
	$_actProduct['noProducto'] =$_POST['noProducto'];
	$_actProduct['Precio_compra'] = $_POST['precioCompra'];
	$_actProduct['Precio_venta'] = $_POST['precioVent'];
	$_actProduct['Color'] = $_POST['color'];
	$_actProduct['Marca'] = $_POST['marca'];
	
	$_actProduct['id_categoriaPrenda'] = $_POST['catePren'];
	$_actProduct['id_categoriaUser'] = $_POST['cateUser'];
	$_actProduct['Descripcion'] = $_POST['descripcionProd'];

	  
        

	
	if($_conn->Actualizar( 'Productos' , $_actProduct , ' id_Producto='.$_POST['idProdu']) ){
	    
	

	$_return['success'] = true;
	$_return['msg'] = 'Se ha actualizado el producto.';
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