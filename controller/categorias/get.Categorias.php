<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    $_optCateP = '';
    $_dataCateP= $_conn->get_consulta_general(' CategoriaPrenda ',' order by Categoria ASC');
    $_optCateU = '';
    $_dataCateU= $_conn->get_consulta_general(' CategoriaUser',' order by Categoria ASC');


     if (empty($_dataCateP)) {
        $_optCateP ='';
    }else{
        $_optCateP .='<option value="0">Categoria prenda...</option>';
        
        foreach ($_dataCateP as $key => $value) {
            $_optCateP .='<option value="'.$value['id_categoriaP'].'">'.$value['Categoria'].'</option>';
        }
    }
    if (empty($_dataCateU)) {
        $_optCateU ='';
    }else{
        $_optCateU .='<option value="0">Categoria uso...</option>';
        
        foreach ($_dataCateU as $key => $valueU) {
            $_optCateU .='<option value="'.$valueU['id_categoria_user'].'">'.$valueU['Categoria'].'</option>';
        }
    }


    $_return['success'] = true;
    $_return['_dataCatePren'] = $_optCateP;
    $_return['_dataCateUser'] = $_optCateU;
    
    echo json_encode($_return);
    die();
?>