<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../model/conexion.class.php';
    $_conn = new DBManager();
    //$passUser=password_hash($_POST['passUser'], PASSWORD_DEFAULT);
    $consul = $_conn->get_consulta_general( "Usuario", "WHERE UserName = '".$_POST['userName']."' AND Contrasenia = '".$_POST['passUser']."'" ) ;
    
    if ( empty( $consul ) ) {
        $_return['success'] = false;
        $_return['msg'] = 'El usuario no existe';
        echo json_encode($_return);
        die();
    }else{

        if( $consul[0]['idEstatus'] == 0 ) {
            $_return['success'] = false;
            $_return['msg'] = 'Usuario erroneo';
            echo json_encode($_return);
            die();
        }else{
        	$pass = security($_POST['passUser']);
        	
            if( password_verify( $pass, $consul[0]['Password'] ) ){
               if (password_needs_rehash( $consul[0]['Password'], PASSWORD_DEFAULT, ['cost' => 11])) {
                    $_actualiza['Password'] = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 11]);
                    $_conn->Actualizar( 'Usuario' , $_actualiza , 'id_User = '.$consul[0]['id_User'] );
                }

                //$_log['idCliente'] = $consul[0]['idCliente'];
                //$_log['Navegador'] = $navegador;
                //$_log['SistemaOperativo'] = $so;
                //$_log['Dispositivo'] = $dispositivo;
                //$_log['cadenaLog'] = $cadenamobile;
                //$_log['FechaLog'] = date('Y-m-d H:i:s');
                //$_conn->Insertar( "LogUsersLogin" , $_log );

                $_SESSION['id_User'] = $consul[0]['id_User'];
                $_SESSION['Username'] = $consul[0]['UserName'];
                $_SESSION['id_nivel'] = $consul[0]['id_nivel'];
                $_SESSION['isloggedadmin'] = true;
                $_return['success'] = true;
                $_return['_datanivel'] = $consul[0]['id_nivel'];
                
                 $regLog['idUsuario']=$consul[0]['id_User'];
                $regLog['Fecha_Registro']=date("Y-m-d H:i:s");
                
                if($_conn->Insertar( 'LogMarti ', $regLog )){
                    $_return['msg'] = 'BIENVENIDO';
                echo json_encode($_return);
                die();
                }else{
                  $_return['success'] = false;
                $_return['msg'] = 'error';
                echo json_encode($_return);
                die();  
                }
                
            }else{
                $_return['success'] = false;
                $_return['msg'] = 'La contraseña no es correcta';
                echo json_encode($_return);
                die();
            }
        }
    }

    function security($cdna){
        $cadena = trim($cdna);
        $cadena = str_replace("'","",$cadena);
        $cadena = str_replace(";","",$cadena);
        $cadena = str_replace("\"","",$cadena);
        $cadena = strip_tags($cadena);
        $cadena = stripslashes($cadena);
        //$cruce = addslashes($cruce);
        $cadena = htmlspecialchars($cadena);
        $cadena = str_replace(chr(160),"",$cadena);
        return $cadena;
    }
?>