<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    $_imgProd = '';
    $producto=$_POST['prodName'];
    $_dataCatalogoProd = $_conn->get_consulta_general(' Productos  ',' where (Producto like"%'.$producto.'%" or noProducto like"%'.$producto.'%") and id_producto not in (select id_producto from Venta where Estatus_venta=1)');


     if (empty($_dataCatalogoProd)) {
        $_imgProd ='';
    }else{
        
        foreach ($_dataCatalogoProd as $key => $value) {
            
            $_dataCatalogoVen= $_conn->get_consulta_general(' Venta  ',' where id_producto ='.$value['id_producto']);
            $estatusVenta=0;
            $montoAbonado='';
            $montoVendi='';
            if( empty($_dataCatalogoVen) ){
                $cardFooter='';
                $classImgProd=" ";
            }else{
              if($_dataCatalogoVen[0]['Estatus_venta']==2){
                  $montoRest=$value['Precio_venta']-$_dataCatalogoVen[0]['Monto_venta'];
                  
                 $montoRest= number_format($montoRest, 2);
                 $montoVendido= number_format($_dataCatalogoVen[0]['Monto_venta'], 2);
                 
                $cardFooter='<div class="card-header"><strong>Apartado</strong></div>';
                
                $classImgProd=" prodApart ";
                $montoAbonado='<input type="hidden" id="inpMontoVent" style="border:none" value="$'.$montoRest.'" readonly>';
                $montoVendi='<input type="hidden" id="inpMontoVendido" style="border:none" value="$'.$montoVendido.'" readonly>';
                
                $estatusVenta=2;
            }else{
                $cardFooter='';
                $classImgProd=" ";
            }  
            }
            
            $totalPrecioVent= number_format($value['Precio_venta'], 2);
            /*$_imgProd = '<div class="col-sm-3 col-md-3 cl-lg-3">
            <img src="img/'.$value['UrlImg'].'" class="card-img-top imgProd" alt="..." onclick="procesoVenta('.$value['id_producto'].','.$estatusVenta.');">
            <p class="card-text" style="font-size: 16pt;font-weight: 500;margin-top: -29px;color: #014002;">$'.$totalPrecioVent.$montoAbonado.$montoVendi.'</p>
            </div>
            ';*/
            
            $_imgProd .='<div class="col-sm-4 col-md-4 cl-lg-4" >
            
                           
                            <img src="img/'.$value['UrlImg'].'" class="imgProd '.$classImgProd.'" alt="..." onclick="procesoVenta('.$value['id_producto'].','.$estatusVenta.');">
                            <hr>
                            </div>
                            ';
                            /*'
                            <p class="card-text" style="font-size: 16pt;font-weight: 500;margin-top: -29px;color: #014002;">$'.$totalPrecioVent.$montoAbonado.$montoVendi.'
                                
                            </p>
                            
                            <p class="card-text" style="font-size: 14pt;font-weight: 300;margin-top: -22px;">'.$value['Producto'].'</p>
                            <p align="justify" class="card-text" style="font-size: 14pt;font-weight: 300;margin-top: -22px;">'.$value['Descripcion'].'</p>
                            
                            <p align="justify" class="card-text" style="font-size: 10pt;font-weight: 300;margin-top: -22px;">'.$value['Marca'].'</p>
                            
                            
                            </div><br>';*/
        }
    }    

    $_return['success'] = true;
    $_return['_dataImgProd'] = $_imgProd;
    
    echo json_encode($_return);
    die();
?>