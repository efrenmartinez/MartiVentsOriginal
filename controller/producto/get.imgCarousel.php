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
            $slideTo=$cont-1;
            if($cont==1){
                
                $divCarouClass='active';
                $divIndicador.='<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$slideTo.'" class="active" aria-curren="true" aria-label="Slide '.$cont.'"></button>';
            }else{
                $divCarouClass='';
                $divIndicador.='<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$slideTo.'" aria-label="Slide '.$cont.'"></button>';
            }
            
            $divCarou.='
            <div class="carousel-item '.$divCarouClass.'">
            
                <!--<div style="background:#FFF;background: url(img/'.$value['UrlImg'].') no-repeat center;width: 90%;height: 340px;background-size: contain;margin-left:5%;">
                </div>-->
                <!-- <img src="img/'.$value['UrlImg'].'" class="d-block w-100" alt="..." style="width:70%;">-->
                <!--<div class="card-body">
                    <h5 class="card-title blunavy">'.$value['Producto'].'</h5>
                    <p class="card-text">
                    '.$value['Descripcion'].'
                    </p>
                </div>-->
                
                <!--<div class="carousel-caption d-none d-md-block" style="color:#000">
                <h5></h5>
                <p>'.$value['Descripcion'].'.</p>
                </div>-->
                
                <a href="'.$value['id_producto'].'" target="_blank">
    <div style="background:#FFF;background: url(img/'.$value['UrlImg'].') no-repeat center;width: 90%;height: 340px;background-size: contain;margin-left:5%;">
    </div>
    </a>  
      
      <div class="card-body">
        <h5 class="card-title blunavy">'.$value['Producto'].'</h5>
        <p class="card-text">
        '.$value['Descripcion'].'
        </p>
      </div>
    </div>
                
                
                
                
                
            </div>';
            
             
            
        }
    }    

    $_return['success'] = true;
    $_return['_dataImgCarousel'] = $divCarou;
    $_return['_dataIndicador'] = $divIndicador;
    
    echo json_encode($_return);
    die();
?>