<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    $divCarou='';
    $divIndicador='';
    
    $_dataCatalogoProd = $_conn->get_consulta_general(' Productos  ',' where  id_producto not in (select id_producto from Venta where Estatus_venta=1)');


     if (empty($_dataCatalogoProd)) {
       
    }else{
        $cont=0;
        foreach ($_dataCatalogoProd as $key => $value) {
           $cont++;
            $totalPrecioVent= number_format($value['Precio_venta'], 2);
            $divCarou.='<div class="col-sm-12 col-md-4 col-lg-4 ">
    <a href="'.$value['id_producto'].'" target="_blank">
    <div style="background:#FFF;background: url(img/'.$value['UrlImg'].') no-repeat center;width: 90%;height: 200px;background-size: contain;margin-left:5%;">
    </div>
    </a>  
      
      <div class="card-body card-body text-center">
        <h5 class="card-title" style="font-size:16pt;font-weight:bold;">$'.$totalPrecioVent.'</h5>
        <p class="card-text" style="font-size:14pt;margin-top: -16px;color: #007E34;" >
        '.$value['Descripcion'].'
        </p>
      </div>
    </div>
  </div>';
            
             
            
        }
    }    

    $_return['success'] = true;
    $_return['_dataImgCatProd'] = $divCarou;
    
    
    echo json_encode($_return);
    die();
?>