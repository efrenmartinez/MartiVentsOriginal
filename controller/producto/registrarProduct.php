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
	/*else if ( empty( $_FILES['prod']['name'] ) ) {
        $_return['success'] = false;
		$_return['msg'] = 'Debes ingresar la imagen del producto.';
		echo json_encode($_return);
		die();
		$reg=1;
    }*/
	else {
    if(stristr($_POST['panoramica'], '/png;')){
            $ext = 'png';
            $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "",$_POST['panoramica']);
        }
        else{
            $ext = 'jpeg';
            $imagenCodificadaLimpia = str_replace("data:image/jpeg;base64,", "",$_POST['panoramica']);
        }
    $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
        $nombreImagenGuardada = date("YmdHis")."_prod_".uniqid().".".$ext;
        $panoramica = $nombreImagenGuardada;
        $bd_panoramica = 'imgProducts/'.$nombreImagenGuardada;
        $rutaDestino = '../../img/imgProducts/'.$panoramica;        
        file_put_contents($rutaDestino, $imagenDecodificada);
    
    //////GUARDAR IMAGEN 
            /*if( !empty( $_FILES['prod']['name'] ) ){
                $info = pathinfo($_FILES['prod']['name']);
                $ext = $info['extension']; 
            }
            if($ext != "jpg"  && $ext != "png" &&$ext != "jpeg"  ){
                    $_return['success'] = false;
                    $_return['msg']="seleccione una imagen.";
                    echo json_encode($_return);
                    die();
            }else{
                        $newname = date("YmdHis").".".$ext; 
                        $target = '../../img/imgProducts/'.$newname;
                        $ruta = 'imgProducts/'.$newname;

                        if(!move_uploaded_file( $_FILES['prod']['tmp_name'], $target)){
                            $_return['success'] = false;
                            $_return['msg']="Error al subir la imagen";
                            echo json_encode($_return);
                            die();
                        }

            }*/
///////////////////////////////////
    
    
    
	$_regProduct['Producto'] = $_POST['nombreProduct'];
	$_regProduct['noProducto'] = 10000+$_POST['noProducto'];
	$_regProduct['Precio_compra'] = $_POST['precioCompra'];
	$_regProduct['Precio_venta'] = $_POST['precioVent'];
	$_regProduct['Color'] = $_POST['color'];
	$_regProduct['Marca'] = $_POST['marca'];
	$_regProduct['id_categoriaPrenda'] = $_POST['catePren'];
	$_regProduct['id_categoriaUser'] = $_POST['cateUser'];
	$_regProduct['Descripcion'] = $_POST['descripcionProd'];
	$_regProduct['UrlImg']=$bd_panoramica;
	
	
	
	$_regProduct['Fecha_Alta']=date("Y-m-d H:i:s");
                
        $keyReg = sha1(date("YmdHisu").$_POST['nombreProduct'].$_POST['noProducto']);
        $_regProduct['keyProducto']=$keyReg;
        
        

	if($_conn->Insertar( 'Productos', $_regProduct )){
	    
	

	$_return['success'] = true;
	$_return['msg'] = 'Se ha registrado el producto.';
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