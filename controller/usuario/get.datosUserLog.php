<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    
    if($_POST['consul']==1){
    $_registr = '';
    
    $_dataCatalogoProd = $_conn->get_consulta_general(' Usuario as u inner join LogMarti as lm ON u.id_User=lm.idUsuario ','');


     if (empty($_dataCatalogoProd)) {
        $_registr ='';
     }
    else{
        foreach ($_dataCatalogoProd as $key => $value) {
            $value['id_nivel'] ;
            $nivel='';
            if($value['id_nivel']==1){
                $nivel="Admin";
            }else if($value['id_nivel']==2){
                $nivel="Vendedor";
            }else{
                
            }
                    $_registr.='<tr style="">
                            <td>'.$value['Fecha_Registro'] .'</td>
                            <td>'.$value['UserName'] .'</td>
                            <td>'.$nivel.'</td>
                            
                            ';
                        $_registr.='</tr>';
        }
    }    

    $_return['success'] = true;
    $_return['_dataInfoLogUser'] = $_registr;
    echo json_encode($_return);
    die();
    }
?>