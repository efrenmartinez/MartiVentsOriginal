<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    
    $mes=$_POST['mes'];
    $catego=$_POST['catego'];//id_categoriaUser
    
    if( empty($catego) ){
        $filcate="  ";
    }else{
        $filcate=" and id_categoriaUser=".$catego;
    }
    $meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    
    
    
    
    if($mes==0){
    $_registr = '';
    
    
    $_dataCatalogoProd = $_conn->get_consulta_generalselecta('id_producto,MONTH(Fecha_Alta)as mes,Producto,cu.Categoria as cateU,UrlImg,Precio_compra,Precio_venta',' Productos as p inner join CategoriaPrenda as cp ON p.id_categoriaPrenda=cp.id_categoriaP inner join CategoriaUser as cu ON p.id_categoriaUser=cu.id_categoria_user',' where p.id_producto is not null '.$filcate);


     if (empty($_dataCatalogoProd)) {
        $_registr ='';
     }
    else{
        foreach ($_dataCatalogoProd as $key => $value) {
            $estatus='';
        $_dataEstatusProd = $_conn->get_consulta_general('Venta',' where id_producto='.$value['id_producto']);
        
        
        $styleEst='';
        if( empty($_dataEstatusProd) ){
            
            $estatus='Disponible'; 
        }else{
            if($_dataEstatusProd[0]['Estatus_venta']==1){
                $estatus='Vendido';  
                $styleEst='style="background-color:#1A68D1"';
            }else if($_dataEstatusProd[0]['Estatus_venta']==2){
                $estatus='Apartado';
            }
           
        }
                    $_registr.='<tr style="">
                            <td>'.$meses[$value['mes']] .'</td>
                            <td>'.$value['Producto'] .'</td>
                            <td>'.$value['cateU'] .'</td>
                            <td '.$styleEst.'>'.$estatus.'</td>
                            <td style="background-color:#D8CC07">$'.$value['Precio_compra'] .'</td>
                            <td style="background-color:#06B233">$'.$value['Precio_venta'] .'</td>
                            <td><button onclick="verImg('.$value['id_producto'].')" class="btn btn-primary"><i class="fa fa-picture-o"></i></button></td>
                            ';
                        $_registr.='</tr>';
        }
    }    

    $_return['success'] = true;
    $_return['_dataInfoProd'] = $_registr;
    
    echo json_encode($_return);
    die();
    }///if del mes
    else{
        $_registr ='';
        $i=$mes;
        $filMes=" and MONTH(Fecha_Alta)= ".$mes;
        
    $_dataCatalogoProd = $_conn->get_consulta_generalselecta('id_producto,MONTH(Fecha_Alta)as mes,Producto,cu.Categoria as cateU,UrlImg,Precio_compra,Precio_venta',' Productos as p inner join CategoriaPrenda as cp ON p.id_categoriaPrenda=cp.id_categoriaP inner join CategoriaUser as cu ON p.id_categoriaUser=cu.id_categoria_user',' where p.id_producto is not null '.$filMes.$filcate);


     if (empty($_dataCatalogoProd)) {
        $_registr ='';
     }
    else{
        foreach ($_dataCatalogoProd as $key => $value) {
            $estatus='';
        $_dataEstatusProd = $_conn->get_consulta_general('Venta',' where id_producto='.$value['id_producto']);
        
        
        $styleEst='';
        if( empty($_dataEstatusProd) ){
            
            $estatus='Disponible'; 
        }else{
            if($_dataEstatusProd[0]['Estatus_venta']==1){
                $estatus='Vendido';
                $styleEst='style="background-color:#1A68D1"';
            }else if($_dataEstatusProd[0]['Estatus_venta']==2){
                $estatus='Apartado';
            }
           
        }
                    $_registr.='<tr style="">
                            <td>'.$meses[$value['mes']] .'</td>
                            <td>'.$value['Producto'] .'</td>
                            <td>'.$value['cateU'] .'</td>
                            <td '.$styleEst.'>'.$estatus.'</td>
                            <td style="background-color:#D8CC07">$'.$value['Precio_compra'] .'</td>
                            <td style="background-color:#06B233">$'.$value['Precio_venta'] .'</td>
                            <td><button onclick="verImg('.$value['id_producto'].')" class="btn btn-primary"><i class="fa fa-picture-o"></i></button></td>
                            ';
                        $_registr.='</tr>';
        }
    }    

    $_return['success'] = true;
    $_return['_dataInfoProd'] = $_registr;
    
    echo json_encode($_return);
    die();
    
    
    }
?>