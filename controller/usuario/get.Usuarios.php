<?php
    date_default_timezone_set('America/Mexico_City');
	session_start();
    require_once '../../model/conexion.class.php';
	
    $_conn = new DBManager();
     $_result = '';
    if ( !empty( $_POST['nProv'] ) ) {
        
        
           $consul = $_conn->get_consulta_general( "Usuario ", "WHERE UserName LIKE '%".$_POST['nProv']."%' AND idEstatus = 1  " );

        if ( empty( $consul )  ) {
            
            //$_result.='<li><div onclick="sel_prov(0);" id=""><span>Nuevo proveedor</div></li>';
        }
        else{
             
            $cont=0;
            foreach ($consul as $key => $value) {
                $cont++;
                $_result.='<li><div onclick="sel_prov('.$value['id_User'].');" id="txt_pro_'.$cont.'"><span>'.utf8_decode( $value['UserName']).'</div></li>';
            }
        }  
        }

    $_return['success'] = true;
    $_return['data'] = base64_encode( $_result );
    echo json_encode($_return);
    die();
   ?>