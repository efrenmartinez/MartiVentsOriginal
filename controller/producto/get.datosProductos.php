<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    
    if($_POST['consul']==1){
    $_registr = '';
    
    $_dataCatalogoProd = $_conn->get_consulta_generalselecta('id_producto,Producto,Marca,cp.Categoria as cateP,cu.Categoria as cateU,UrlImg,Precio_compra,Precio_venta',' Productos as p inner join CategoriaPrenda as cp ON p.id_categoriaPrenda=cp.id_categoriaP inner join CategoriaUser as cu ON p.id_categoriaUser=cu.id_categoria_user','');


     if (empty($_dataCatalogoProd)) {
        $_registr ='';
     }
    else{
        foreach ($_dataCatalogoProd as $key => $value) {
            $estatus='';
        $_dataEstatusProd = $_conn->get_consulta_general('Venta',' where id_producto='.$value['id_producto']);
        
        if( empty($_dataEstatusProd) ){
            
            $estatus='Disponible'; 
        }else{
           $estatus='Vendido';
        }
                    $_registr.='<tr style="">
                            <td>'.$value['Producto'] .'</td>
                            <td>'.$value['Marca'] .'</td>
                            <td>'.$value['cateP'] .'</td>
                            <td>'.$value['cateU'] .'</td>
                            <td>'.$estatus.'</td>
                            <td>$'.$value['Precio_compra'] .'</td>
                            <td>$'.$value['Precio_venta'] .'</td>
                            <td><button onclick="verImg('.$value['id_producto'].')" class="btn btn-primary"><i class="fa fa-picture-o"></i></button></td>
                            <td><button onclick="changeDatos('.$value['id_producto'].')" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button></td>
                            ';
                        $_registr.='</tr>';
        }
    }    

    $_return['success'] = true;
    $_return['_dataInfoProd'] = $_registr;
    
    echo json_encode($_return);
    die();
    }
    else if($_POST['consul']==2){
        $_dataCatalogoProd = $_conn->get_consulta_general(' Productos ','where id_Producto='.$_POST['idProducto']);
        if (empty($_dataCatalogoProd)) {
            $_registr ='';
        }
        else{
        foreach ($_dataCatalogoProd as $key => $value) {
            $producto=$value['Producto'];
            $noProducto=$value['noProducto'];
            $marca=$value['Marca'];
            $color=$value['Color'];
            $precioC=$value['Precio_compra'];
            $precioV=$value['Precio_venta'];
            $descripcion=$value['Descripcion'];
            $idCateP=$value['id_categoriaPrenda'];
            $idCateU=$value['id_categoriaUser'];
            $urlImg=$value['UrlImg'];
        }
    }
    
    $_return['success'] = true;
    $_return['_dataProducto'] = $producto;
    $_return['_dataNoProducto'] = $noProducto;
    $_return['_dataMarca'] = $marca;
    $_return['_dataColor'] = $color;
    $_return['_dataPrecioC'] = $precioC;
    $_return['_dataPrecioV'] = $precioV;
    $_return['_dataDescrip'] = $descripcion;
    $_return['_dataCateP'] = $idCateP;
    $_return['_dataCateU'] = $idCateU;
    $_return['_dataUrlImg'] = $urlImg;
    echo json_encode($_return);
    die();
    }
?>