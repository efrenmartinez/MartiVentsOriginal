

<div class="container">
    <h5 >Estadisticas venta</h5>
    <div class="row">
    <div class="col-sm-6 col-12">
    <h6>Mes:</h6>
    <select name="mesSel" id="mesSel" class="form-control" onchange="getdataestadisticas(),getDatosProducto()">
        <?php
        $meses=array("General","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        for($i=0;$i<13;$i++){
            echo '<option value="'.$i.'">'.$meses[$i].'</option>';    
        }
        
        ?>
        
    </select>
    
    </div>
    <div class="col-sm-6 col-12">
    <h6>Categoria:</h6>
    <select name="cateUs" id="cateUs" class="form-control" onchange="getdataestadisticas(),getDatosProducto()">
    </select>
    
    </div>
    </div>
    
    <div id='grafCursos' style="height: 100%;width: 100%;min-height: 450px;"></div>
    <div  style="display: table;table-layout: fixed;width: 100%;">
            <div  style="overflow-x: auto;" class="divTableSC">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Mes</th>
                <th>Producto</th>
                <th>Categoria para uso</th>
                <th>Estatus</th>
                <th>precio compra</th>
                <th>Precio venta</th>
                <th>Ver foto</th>
            </tr>
        </thead>
        <tbody id="datosProducto">
        </tbody>
        <tfoot>
            <tr>
                <th>Mes</th>
                <th>Producto</th>
                <th>Categoria para uso</th>
                <th>Estatus</th>
                <th>precio compra</th>
                <th>Precio venta</th>
                <th>Ver foto</th>
            </tr>
        </tfoot>
    </table>
</div>
        </div>
        <div class="modal fade" id="verImgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header backMarti" style="">
          <div id="titProducto"></div>
           <label type="button" class="btn btn-danger" onclick="closemodImg()" style="
    border: none;"><i class="fa fa-times-circle" style=""></i></label> 
      </div>
      <div class="modal-body" id="divImgProd">
            
           
      </div>
    </div>
  </div>
</div>
</div>


 

  
  <script>
  $(document).ready(function() {
      getdataestadisticas();
      getCategorias();
      getDatosProducto();
    } );
    function getdataestadisticas(){
        var mes=document.getElementById('mesSel').value;
        var catego=document.getElementById('cateUs').value;
        
        $.ajax({
                    url: 'controller/estadisticas/estadisticasVenta.php',
                    type: 'POST',
                    data: {mes:mes,catego:catego},                    
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){


                            var datajsonStackReg = JSON.stringify(Parse_Registro.datajsonReg);
                            datajsonStackReg = JSON.parse(datajsonStackReg);

                            
                            var labels = JSON.stringify(Parse_Registro.datajsonlabel);
                            labels = JSON.parse(labels);

                            
                            
                            

                        //   let chartStackReg = {
                        //         graphset: [{
                        //             type: 'bar3d',
                        //             tooltip: {
                        //                 visible: false,
                        //                 text: '%npv$',
                        //             },
                        //             plotarea: {
                        //                 margin: "80 40 20 130"
                        //             },
                        //             legend: {
                        //               layout: '3x2',
                        //               align: 'right',
                        //               verticalAlign: 'top',
                        //               margin: '5 20 0 0',
                        //               padding: '5px',
                        //               borderRadius: '5px',
                        //               header: {
                        //                 text: '',
                        //                 color: '#5D7D9A',
                        //                 padding: '10px'
                        //               },
                        //               item: {
                        //                 color: '#5D7D9A'
                        //               }
                        //           },
                        //           scaleX: {
                        //             labels: labels,
                        //             label: {
                        //               color: '#6C6C6C',
                        //             },
                        //                 lineColor: '#D8D8D8',
                        //                 tick: {
                        //                   visible: false,
                        //                   _lineColor: '#D8D8D8'
                        //                 },
                        //             item: {
                        //               color: '#6C6C6C',
                        //               angle: '0'
                        //             },

                        //         },
                        //         plot: {
                        //           stacked: true,
                        //           barWidth: '55%',
                        //             valueBox: {
                        //             placement: "top-in",
                        //             text: '$%v',
                        //             padding: "100 125",
                        //             fontColor: "#000",
                        //             fontSize: '14',
                        //             fontFamily: "Open Sans"
                        //             },
                        //         },
                        //         scaleY: {
                        //           lineColor: '#D8D8D8',
                        //           guide: {
                        //             lineStyle: 'solid'
                        //           },
                        //           tick: {
                        //             lineColor: '#D8D8D8'
                        //           },
                        //           item: {
                        //             color: '#6C6C6C'
                        //           },
                        //           label: {
                        //             padding: '200 200 300 0',
                        //             text: '',
                        //             color: '#6C6C6C'
                        //           },
                        //           //values: '1:100'
                        //       },
                        //         series: datajsonStackReg
                        //         }]
                        //     };
                        let chartStackReg = {
  type: 'bar3d',
  //type: 'bar',
  '3dAspect': {
    depth: 30,
    true3d: 0,
    yAngle: 10,
  },
  tooltip: {
                                        visible: true,
                                        text: '$%v',
                                    },
  backgroundColor: '#fff',
  title: {
    text: 'Estadística anual',
    fontWeight: 'normal',
    height: '40px',
  },
  legend: {
    backgroundColor: 'block',
    borderColor: 'block',
    item: {
      fontColor: '#fff',
    },
    layout: 'float',
    shadow: false,
    width: '90%',
    x: '37%',
    y: '10%',
  },
  plotarea: {
    alpha: 0.3,
    backgroundColor: '#fff',
    margin: '95px 35px 50px 70px',
  },
  scaleX: {
      labels: labels,
    //values: ['January', 'February', 'March', 'April', 'May', 'June'],
    alpha: 0.5,
    backgroundColor: '#fff',
    borderColor: '#333',
    borderWidth: '1px',
    guide: {
      visible: false,
    },
    item: {
      fontColor: '#333',
      fontSize: '11px',
    },
    tick: {
      alpha: 0.2,
      lineColor: '#333',
    },
  },
  scaleY: {
    alpha: 0.5,
    backgroundColor: '#fff',
    borderColor: '#333',
    borderWidth: '1px',
    format: '$%v',
    guide: {
      alpha: 0.2,
      lineColor: '#333',
      lineStyle: 'solid',
    },
    item: {
      fontColor: '#333',
      paddingRight: '6px',
    },
    tick: {
      alpha: 0.2,
      lineColor: '#333',
    },
    
  },
  
  series: datajsonStackReg,
};
                            zingchart.render({
                              id: 'grafCursos',
                              data: chartStackReg,
                              height: '100%',
                              width: '100%'
                            }); 

                                            
                        }
                        else{
                          Swal.fire({ icon: 'error', title: 'Problema al cargar información' ,showConfirmButton: false, timer: 1500}); loadertooglebtn('grafCursos',2);
                             loadertooglebtn('grafAccessos',2);
                        }
                    }
                });
    }
    var getCategorias=function(){
                
                $.ajax({
                    url: 'controller/categorias/get.Categorias.php',
                    type: 'POST',
                    data: {},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            
                            var cateUser=document.getElementById("cateUs");
                            
                            
                            cateUser.innerHTML=Parse_Registro._dataCateUser;

                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });

            }
     var getDatosProducto=function(){
          var mes=document.getElementById('mesSel').value;
          var catego=document.getElementById('cateUs').value;
            
                if ($.fn.DataTable.isDataTable("#example")) {
                    $('#example').DataTable().clear().destroy();
                }
                consul=1;
                loadertooglebtn('datosProducto',1);
                $.ajax({
                    url: 'controller/estadisticas/get.datosProductosEstadisticas.php',
                    type: 'POST',
                    data: {mes:mes,catego:catego},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            loadertooglebtn('datosProducto',2);
                          $("#datosProducto").html(Parse_Registro._dataInfoProd); 
                          
                          setTimeout(function(){ 
                                var table = $('#example').DataTable( {
                                    lengthChange: false,
                                    buttons: ['copy',{ extend: 'excel', title: '',exportOptions: {} },{ extend: 'pdf', title: '' }, 'colvis' ]
                                } );
                                table.buttons().container()
                                    .appendTo( '#example_wrapper .col-md-6:eq(0)' );


                          }, 1000);
                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });

            }
            var verImg=function(idProducto){
                $('#verImgModal').modal('show');
                // document.getElementById('idProdu').value=idProducto;
                
                consul=2;
                $.ajax({
                    url: 'controller/producto/get.datosProductos.php',
                    type: 'POST',
                    data: {consul:consul,idProducto:idProducto},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            
                          
                          
                          var img=Parse_Registro._dataUrlImg;
                          document.getElementById('divImgProd').innerHTML='<img src="img/'+img+'" class="img-thumbnail" alt="...">'
                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });
            }
            var closemodImg = function(){
                $('#verImgModal').modal('hide');
            }
  </script>