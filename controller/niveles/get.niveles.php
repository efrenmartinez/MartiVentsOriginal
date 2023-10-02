<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    $_optNivel = '';
    $_dataCatalogo = $_conn->get_consulta_general(' Nivel ',' ');


     if (empty($_dataCatalogo)) {
        $_optCatalogo ='';
    }else{
        $_optNivel .='<option value="0">Asigna nivel..</option>';
        
        foreach ($_dataCatalogo as $key => $value) {
            $_optNivel .='<option value="'.$value['id_nivel'].'">'.utf8_decode($value['Nivel']).'</option>';
        }
    }    


    $_return['success'] = true;
    $_return['_dataNiveles'] = $_optNivel;
    
    echo json_encode($_return);
    die();
?>