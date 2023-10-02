<h4 class="text-center">Datos del Productos</h4>
<div  style="display: table;table-layout: fixed;width: 100%;">
            <div  style="overflow-x: auto;" class="divTableSC">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Fecha de acceso</th>
                <th>Usuario</th>
                <th>Tipo de usuario</th>
                
            </tr>
        </thead>
        <tbody id="datosUsuarioLog">
        </tbody>
        <tfoot>
            <tr>
                <th>Fecha de acceso</th>
                <th>Usuario</th>
                <th>Tipo de usuario</th>
                
        </tfoot>
    </table>
</div>
        </div>
      
      <!--//modales-->
      
<!--      <div class="modal fade" id="cambiarDatosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header backMarti" style="">-->
<!--          <div id="titAct">Actualizar Datos</div>-->
<!--           <label type="button" class="btn btn-danger " onclick="closemodCambiarD()" style="-->
<!--    border: none;"><i class="fa fa-times-circle" style=""></i></label> -->
<!--      </div>-->
<!--      <div class="modal-body">-->
           
<!--           <form id="formActProducto">-->
               
<!--                  <input type="text" readonly id="idProdu" name="idProdu">-->
<!--                <div class="row">-->
<!--                    <div class="col-12 col-sm-6">-->
<!--                        <label>Nombre del producto:</label>-->
<!--                        <input type="text" class="form-control" id="nombreProduct" name="nombreProduct"  />-->
<!--                    </div>-->
<!--                    <div class="col-12 col-sm-6">-->
<!--                        <label>No. de producto:</label>-->
<!--                        <input type="text" class="form-control" id="noProducto" name="noProducto"  />-->
<!--                    </div>  -->
<!--                </div>-->
<!--                    <br>-->
<!--                    <div class="row">-->
<!--                        <div class="col-12 col-sm-6">-->
<!--                            <label>Precio de compra:</label>-->
<!--                            <input type="text" class="form-control" id="precioCompra" name="precioCompra"  />-->
<!--                        </div>-->
<!--                        <div class="col-12 col-sm-6">-->
<!--                            <label>Precio de venta:</label>-->
<!--                            <input type="text" class="form-control" id="precioVent" name="precioVent"  />   -->
<!--                        </div>  -->
                        
<!--                </div> -->
<!--                    <br>-->
<!--                    <div class="row">-->
<!--                        <div class="col-12 col-sm-6">-->
<!--                            <label>Color:</label>-->
<!--                            <input type="text" class="form-control" id="color" name="color"  />-->
<!--                        </div>-->
<!--                        <div class="col-12 col-sm-6">-->
<!--                            <label>Marca:</label>-->
<!--                            <input type="text" class="form-control" id="marca" name="marca"  />   -->
<!--                        </div>  -->
                        
<!--                </div> -->
<!--                <br>-->
                
<!--                <div class="row">-->
<!--                    <div class="col-sm-6 col-12">-->
<!--                        <select name="catePren" id="catePren" class="form-control">-->
<!--                  </select><label class="btn btn-success" onclick="agregarCate(1)"><i class="fa fa-plus" aria-hidden="true"></i></label>-->
<!--                    </div>-->
<!--                    <div class="col-sm-6 col-12">-->
<!--                        <select name="cateUser" id="cateUser" class="form-control"></select>-->
<!--              <label class="btn btn-success" onclick="agregarCate(2)"><i class="fa fa-plus" aria-hidden="true"></i></label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                        <div class="col-12 col-sm-12">-->
<!--                            <label>Descripción:</label>-->
<!--                            <textarea name="descripcionProd" id="descripcionProd" cols="20" rows="2" class="form-control" ></textarea>-->
<!--                        </div> -->
                        
<!--                </div>-->
                
<!--           </form>-->
<!--           <br>-->
<!--               <button class="btn btn-primary" onclick="actualizarDatosProd()" id="btnActualizar" style="margin-left: 239px;height: 33px;font-size: 9pt;">Actualizar</button>-->
                
           
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!--<div class="modal fade" id="agregarCateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-sm">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header backMarti" style="">-->
<!--          <div id="titRegCat"></div>-->
<!--           <label type="button" class="btn btn-danger" onclick="closemodCate()" style="-->
<!--    border: none;"><i class="fa fa-times-circle" style=""></i></label> -->
<!--      </div>-->
<!--      <div class="modal-body">-->
           
<!--           <form id="formCatego">-->
<!--              <div class="row">-->
<!--                  <input type="hidden" readonly id="TipoCat" name="TipoCat">-->
<!--                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria">-->
<!--                </div> -->
<!--           </form>-->
<!--           <br>-->
<!--               <button class="btn btn-primary" onclick="guardarCate()" id="saveCate" style="">Guardar</button>-->
                
           
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!--<div class="modal fade" id="verImgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-sm">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header backMarti" style="">-->
<!--          <div id="titProducto"></div>-->
<!--           <label type="button" class="btn btn-danger" onclick="closemodImg()" style="-->
<!--    border: none;"><i class="fa fa-times-circle" style=""></i></label> -->
<!--      </div>-->
<!--      <div class="modal-body" id="divImgProd">-->
            
           
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
    

      <script>
      $(document).ready(function() {
            getDatosUserLog();
            //getCategorias();

            } );
//             var guardarCate=function(){
//     var formData = new FormData($("#formCatego")[0]);

//     loadertooglebtn('saveCate',1);
//                     $.ajax({
//                         url: 'controller/categorias/registrarCate.php',
//                         type: 'POST',
//                         data: formData,
//                         cache: false,
//                         contentType: false,
//                         processData: false,
//                         success: function( data ){
//                             var Parse_Registro = $.parseJSON(data);
//                             if( Parse_Registro.success ){
//                                 Swal.fire({ icon: 'success', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
//                                     $("#agregarCateModal").modal("hide");                  
//                                   getCategorias(); 
//                                   $("#formCatego")[0].reset();
//                             }else{
//                                 Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
//                                 //$("#form_basesUpdCli")[0].reset();
//                             }
//                         loadertooglebtn('saveCate',2);
//                         }
//                     });
// }
//             var getCategorias=function(){
                
//                 $.ajax({
//                     url: 'controller/categorias/get.Categorias.php',
//                     type: 'POST',
//                     data: {},
//                     success: function( data ){
//                         var Parse_Registro = $.parseJSON(data);
//                         if( Parse_Registro.success ){
//                             var catePren=document.getElementById("catePren");
//                             var cateUser=document.getElementById("cateUser");
                            
//                             catePren.innerHTML=Parse_Registro._dataCatePren;
//                             cateUser.innerHTML=Parse_Registro._dataCateUser;

//                         }
//                         else{
//                           Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
//                         }
//                     }
//                 });

//             }
//             var agregarCate=function(tipoCate){
//                 var tit='';
//                 if(tipoCate==1){
//                     $("#agregarCateModal").modal("show");
//                     document.getElementById('TipoCat').value=tipoCate;
//                     tit='prenda';
//                 }else{
//                     $("#agregarCateModal").modal("show");
//                     document.getElementById('TipoCat').value=tipoCate; 
//                     tit='uso';
//                 }
//                 document.getElementById('titRegCat').innerHTML='<p style="font-size: 12pt;text-align:center">Registrar categoria '+tit+'</p>';
//             }
//             var closemodCate= function(){
//                 $("#agregarCateModal").modal("hide");
//             }
            
            var getDatosUserLog=function(){
                if ($.fn.DataTable.isDataTable("#example")) {
                    $('#example').DataTable().clear().destroy();
                }
                consul=1;
                loadertooglebtn('datosUsuarioLog',1);
                $.ajax({
                    url: 'controller/usuario/get.datosUserLog.php',
                    type: 'POST',
                    data: {consul:consul},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            loadertooglebtn('datosUsuarioLog',2);
                          $("#datosUsuarioLog").html(Parse_Registro._dataInfoLogUser); 
                          
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
            
//             var changeDatos= function(idProducto){
                
//                 $('#cambiarDatosModal').modal('show');
//                 document.getElementById('idProdu').value=idProducto;
                
//                 consul=2;
//                 $.ajax({
//                     url: 'controller/producto/get.datosProductos.php',
//                     type: 'POST',
//                     data: {consul:consul,idProducto:idProducto},
//                     success: function( data ){
//                         var Parse_Registro = $.parseJSON(data);
//                         if( Parse_Registro.success ){
                            
                          
//                           document.getElementById('nombreProduct').value=Parse_Registro._dataProducto;
//                           document.getElementById('noProducto').value=Parse_Registro._dataNoProducto;
//                           document.getElementById('marca').value=Parse_Registro._dataMarca;
//                           document.getElementById('color').value=Parse_Registro._dataColor;
//                           document.getElementById('precioCompra').value=Parse_Registro._dataPrecioC;
//                           document.getElementById('precioVent').value=Parse_Registro._dataPrecioV;
//                           document.getElementById('descripcionProd').value=Parse_Registro._dataDescrip;
//                           document.getElementById('catePren').value=Parse_Registro._dataCateP;
//                           document.getElementById('cateUser').value=Parse_Registro._dataCateU;
                          


//                         }
//                         else{
//                           Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
//                         }
//                     }
//                 });
                
//             }
//             var verImg=function(idProducto){
//                 $('#verImgModal').modal('show');
//                 // document.getElementById('idProdu').value=idProducto;
                
//                 consul=2;
//                 $.ajax({
//                     url: 'controller/producto/get.datosProductos.php',
//                     type: 'POST',
//                     data: {consul:consul,idProducto:idProducto},
//                     success: function( data ){
//                         var Parse_Registro = $.parseJSON(data);
//                         if( Parse_Registro.success ){
                            
                          
                          
//                           var img=Parse_Registro._dataUrlImg;
//                           document.getElementById('divImgProd').innerHTML='<img src="img/'+img+'" class="img-thumbnail" alt="...">'
//                         }
//                         else{
//                           Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
//                         }
//                     }
//                 });
//             }
//             var closemodCambiarD= function(){
                
//                 $('#cambiarDatosModal').modal('hide');
//                 document.getElementById('idProdu').value='';
//             }
//             var closemodImg = function(){
//                 $('#verImgModal').modal('hide');
//             }
//             function truncaTelC2(e){
//             if($("#telefonoC2").val().length>10){
//                 $("#telefonoC2").val($("#telefonoC2").val().slice(0,10)); 
//             }                
//         }
//             var actualizarDatosProd=function(){
//             var formData = new FormData($("#formActProducto")[0]);
//             loadertooglebtn('btnActualizar',1);
//             $.ajax({
//                 url: 'controller/producto/actualizar.Producto.php',
//                 type: 'POST',
//                 data: formData,
//                 cache: false,
//                 contentType: false,
//                 processData: false,
//                 success: function( data ){
//                     var Parse_Registro = $.parseJSON(data);
//                     if( Parse_Registro.success ){
//                         Swal.fire({ icon: 'success', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});    
//                         $("#formActProducto")[0].reset();
//                         $("#cambiarDatosModal").modal("hide");
//                         getDatosProducto();
                        
//                     }else{
//                         Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
                                
//                     }
//                 loadertooglebtn('btnActualizar',2);
//                 }
//             });
                    
    
// }



      </script>
      