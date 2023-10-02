<?php
    date_default_timezone_set('America/Mexico_City');
    session_start();
    require_once '../../model/conexion.class.php';

    $_conn = new DBManager();
    $_datasonRegistrosStack = array();
    
    $datosIns=array();
    $datosIns2=array();
    $datosIns3=array();
    
    $labels= array();
    $colors=array();
    
    
    $mes=$_POST['mes'];
    $catego=$_POST['catego'];//id_categoriaUser
    
    if( empty($catego) ){
        $filcate="  ";
    }else{
        $filcate=" and id_categoriaUser=".$catego;
    }
    //echo $catego.'<br>';
    //echo $filcate.'<br>';
    //echo $mes.'<br>';
    
    $meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    if($mes==0){
        for($i=1;$i<13;$i++){
    //suma de todos los productos
    $_dataSumTotal= $_conn->get_consulta_generalselecta(' SUM(Precio_venta) as totalEsperado, SUM(Precio_compra) as gastado ',' Productos ',' where MONTH(Fecha_Alta)='.$i.$filcate);
    
    $_dataSumVendido= $_conn->get_consulta_generalselecta(' SUM(Monto_venta) as vendido ',' Venta as v inner join Productos as p on v.id_producto=p.id_producto ',' where MONTH(Fecha_Registro)='.$i.$filcate);
    
    $totalEsperado=$_dataSumTotal[0]['totalEsperado'];
    ///gastado
    $gastado=$_dataSumTotal[0]['gastado'];
    //vendido
    $vendido=$_dataSumVendido[0]['vendido'];
    
    
    $mes=$meses[$i];
    array_push($labels,$mes);
    
    
    array_push($datosIns, intval($totalEsperado) );
    array_push($datosIns2, intval($gastado) );
    array_push($datosIns3, intval($vendido) );
    
    /*
    if($vendido>0){
       $porcentaje=($vendido*100)/$totalEsperado;
        $porcentaje=round($porcentaje,2); 
    }else{
        $porcentaje=0;    
    }
    
    
    if(is_nan($porcentaje) or is_infinite($porcentaje) ){
        $porcentaje=0;
    }
    //echo $porcentaje;
    if($porcentaje<25){
        $color="#D81007";
    }else if($porcentaje>25 and $porcentaje<50){
        $color="#E2E605";
    }else if($porcentaje>50 and $porcentaje <95){
        $color="#C6E501";
    }else if($porcentaje=100)
    $color="#0EC211";
    */
    
    
        }//for 
    }
    else{
        $i=$mes;
        $_dataSumTotal= $_conn->get_consulta_generalselecta(' SUM(Precio_venta) as totalEsperado, SUM(Precio_compra) as gastado ',' Productos ',' where MONTH(Fecha_Alta)='.$i.$filcate);
        $_dataSumVendido= $_conn->get_consulta_generalselecta(' SUM(Monto_venta) as vendido ',' Venta as v inner join Productos as p on v.id_producto=p.id_producto ',' where MONTH(Fecha_Registro)='.$i.$filcate);
    
    $totalEsperado=$_dataSumTotal[0]['totalEsperado'];
    ///gastado
    $gastado=$_dataSumTotal[0]['gastado'];
    //vendido
    $vendido=$_dataSumVendido[0]['vendido'];
    
    
    $mes=$meses[$i];
    array_push($labels,$mes);
    
    
    array_push($datosIns, intval($totalEsperado) );
    array_push($datosIns2, intval($gastado) );
    array_push($datosIns3, intval($vendido) );
    }
    
    
    
    
    
    
     array_push($_datasonRegistrosStack,array('values'=>$datosIns,'text'=>'Esperado','backgroundColor'=>"#06B233"));
     array_push($_datasonRegistrosStack,array('values'=>$datosIns2,'text'=>'Gastado','backgroundColor'=>"#D8CC07"));
     array_push($_datasonRegistrosStack,array('values'=>$datosIns3,'text'=>'Real','backgroundColor'=>"#1A68D1"));
    
                
                
                $_return['datajsonReg'] = $_datasonRegistrosStack;
                $_return['datajsonlabel'] = $labels;
                
                
                $_return['success'] = true;
                echo json_encode($_return);
                die();  
?>