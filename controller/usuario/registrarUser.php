<?php

	date_default_timezone_set('America/Mexico_City');
	session_start();
    require_once '../../model/conexion.class.php';
	
    $_conn = new DBManager();
    
$reg=0;
    if ( empty( $_POST['nombreUsuario'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes ingresar nombre del usuario.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
    else if ( empty( $_POST['contrasenia'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Debes asignar una contraseña al usuario.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
    else if ( empty( $_POST['nivel'] ) ) {
    	$_return['success'] = false;
		$_return['msg'] = 'Asigna un nivel al usuario.';
		echo json_encode($_return);
		die();
        $reg=1;
	}
   
	else {
        if($_POST['nivel']==3){
            if ( empty( $_POST['descUsuario'] ) ) {
    	    $_return['success'] = false;
		    $_return['msg'] = 'Describe el tipo de usuario.';
		    echo json_encode($_return);
		    die();
            $reg=1;
	        }
        }
        else{
            $tipoUsuario=$_POST['descUsuario'];
        }
        
        $consul = $_conn->get_consulta_general( "Usuario", "WHERE UserName = '".$_POST['nombreUsuario']."'" ) ;
        if(!empty($consul)){
            $_return['success'] = false;
		    $_return['msg'] = 'El nombre de usuario no esta disponible, ingrese otro.';
		    echo json_encode($_return);
		    die();
        }else{
            $keyReg = sha1(date("YmdHisu").$_POST['nombreUsuario']);
            $_regUser['KeyUsuario']=$keyReg;
	        $_regUser['UserName'] = $_POST['nombreUsuario'];
	        $_regUser['Contrasenia'] = $_POST['contrasenia'];
	        $_regUser['Password'] = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
	        $_regUser['Fecha_Registro']=date("Y-m-d H:i:s");
	        $_regUser['id_nivel'] = $_POST['nivel'];
	        $_regUser['UrlImg']='imgUsers/default_user.png';
	        $_regUser['Estatus_comprador']=$tipoUsuario;
	        $_regUser['idEstatus']='1';
    
	
	    if($_conn->Insertar( 'Usuario', $_regUser )){
	        $_return['success'] = true;
	        $_return['msg'] = 'Se ha registrado el usuario.';
	        echo json_encode($_return);
	        die(); 
            }
        else{
	        $_return['success'] = false;
	        $_return['msg'] = 'No se puede por ahora, intentalo mas tarde.';
	        echo json_encode($_return);
	        die();
            }
        }
        	
	}		
?>