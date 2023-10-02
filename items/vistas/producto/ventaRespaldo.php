<br>

<div class="container backMarti" >
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search" aria-hidden="true"></i></span>
        <input class="form-control me-2" type="search" placeholder="Buscar producto" name="prodName" id="prodName" aria-label="Search" style="width: 80%;" onkeyup="getImgProd();">
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4" col-0></div>
        <div class="col-sm-4 col-12">
       <div style="overflow-x: scroll;
    height: 400px;width:90%" id="divImgProd" >
        
    </div> 
    </div>
    <div class="col-sm-4 col-0"></div>
    </div>
    
    
</div>


<div class="modal fade" id="procesoVentamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header backMarti" >
           <label type="button" class="btn btn-danger" onclick="closemodProcVent()" style="margin-left: 250px;height: 20px;font-size: 14pt;padding-top: 0px;margin-top: -7px;background-color: transparent;
    border: none;"><i class="fa fa-times-circle" style="color:#E80007"></i></label> 
      </div>
      <div class="modal-body">
          <input type="hidden" readonly id="idProdPri" name="idProPri">
           <div id="btnProces" >
           <div class="row" style="display:none" id="rowVenApr">
               <div class="col-6 col-sm-6">
                   <button class="btn btn-primary" onclick="procApartar(1)" id="saveCate" style="width: 100%;height: 33px;font-size: 9pt;">Vender</button> 
               </div>
               <div class="col-6 col-sm-6">
                   <button class="btn btn-secondary" onclick="procApartar(2)" id="saveCate" style="width: 100%;height: 33px;font-size: 9pt;">Apartar</button>
               </div>
             
             
           </div>
           <div class="row" style="display:none" id="rowAbon">
               <div class="row">
                   <div class="col-sm-6">
                       <label>Monto actual:</label><br> 
                       <input type="text" id="inpMontoAct" class="form-control" style="border:none" readonly>
                   </div>
                   <div class="col-sm-6">
                       <label>Restante:</label><br>
                       <input type="text" id="inpMontoRest" class="form-control" style="border:none" readonly>
                   </div>
               </div>
               <div class="row">
                   <div class="col-12 col-sm-12 text-center">
                   
                   <form id="formAbonar">
                       <input type="hidden" id="idProAbon" name="idProAbon" readonly>
                       <br>
                       <label>Monto del abono <br><strong>(sin puntos, comas ni signo de pesos)</strong></label>
                       <input type="text" id="montoAbono" name="montoAbono" class="form-control">
                       <br>
                   </form>
                   <button class="btn btn-secondary" onclick="procAbonar()" id="btnAbon" style="width: 100%;height: 33px;font-size: 9pt;">Abonar</button>
               </div>
               </div>
               
               
           </div>
           
           </div>
           
           <div id="divForm" style="display:none">
               <button class="btn btn-secondary" onclick="backBtnProc()" id="saveCate" style="width: 10%;height: 33px;font-size: 9pt;"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
               <form id="formProcesoventa" >
                   <br>
              <div class="row">
                  <input type="hidden" readonly id="opcSelect" name="opcSelect">
                  <input type="hidden" readonly id="idProd" name="idProd">
                    <input type="text" class="form-control" placeholder="Nombre del usuario" id="nombreUsuer" name="nombreUsuer" autocomplete="off" onkeyup="get_usuarios();" style="width:90%"><label class="btn btn-secondary" onclick="cleanUser()" id="saveCate" style="width: 10%;height: 33px;font-size: 9pt;"><i class="fa fa-eraser" aria-hidden="true"></i></label>

                        <ul id="lista_id" style="display:none;background-color:#fff" ></ul>
                        <input type="hidden" id="idProv" name="idProv" readonly="">
                        
                        <input type="text" class="form-control" id="montoAbon"name="montoAbon" class="form-control" placeholder="Monto abonado" style="display:none">
                </div> 
           </form>
           <br>
           <button class="btn btn-success" onclick="guardarVenta()" id="saveVenta" style="height: 33px;font-size: 9pt;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
           </div>
           
           <br>
               
                
           
      </div>
    </div>
  </div>
</div>
<script>
    $( document ).ready(function() { 
      getImgProd();
  });
  
  var getImgProd=function(){
      var prodName=document.getElementById("prodName").value;
      $.ajax({
                    url: 'controller/producto/get.imgProducts.php',
                    type: 'POST',
                    data: {prodName:prodName},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            var divImgProd=document.getElementById("divImgProd");
                            
                            divImgProd.innerHTML=Parse_Registro._dataImgProd;

                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });
  }
  var procesoVenta=function(idProd,estVen){
      backBtnProc();
      $("#procesoVentamodal").modal("show");
      document.getElementById("idProdPri").value=idProd;
      
      if(estVen==2){
          var precProd=document.getElementById("inpMontoVent").value;
          document.getElementById("inpMontoRest").value=precProd;
          
          var precProdVend=document.getElementById("inpMontoVendido").value;
          document.getElementById("inpMontoAct").value=precProdVend;

          
        document.getElementById("rowVenApr").style.display="none";
        document.getElementById("rowAbon").style.display="block";
        document.getElementById("idProAbon").value=idProd;
        
            
      }
      else{
          document.getElementById("rowAbon").style.display="none";
          document.getElementById("rowVenApr").style.display="block";
          document.getElementById("rowVenApr").className="row";
      }
  }
var closemodProcVent= function(){
    $("#procesoVentamodal").modal("hide");
}
var procApartar=function(opcion){
   document.getElementById("divForm").style.display='block';
   document.getElementById("idProd").value=document.getElementById("idProdPri").value;
   document.getElementById("btnProces").style.display='none'; 
   document.getElementById("opcSelect").value=opcion;
   
   if(opcion==1){
      document.getElementById('montoAbon').style.display="none"; 
   }else{
      document.getElementById('montoAbon').style.display="block";
   }
}
var backBtnProc= function(){
   document.getElementById("divForm").style.display='none'; 
   document.getElementById("btnProces").style.display='block';
   document.getElementById('nombreUsuer').readOnly = false;
   $("#formProcesoventa")[0].reset();
}
var get_usuarios = function(){
          
                 $("#lista_id").show();
                var text = $("#nombreUsuer").val();
                
                $.ajax({
                    url: 'controller/usuario/get.Usuarios.php',
                    type: 'POST',
                    data: { nProv : text},
                    success: function( data ){
                        
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            $("#lista_id").html( atob( Parse_Registro.data ) );
                        }
                                              
                    }
                });
             
              
          
          
                
            }
var sel_prov = function( id ){
              
                document.getElementById("idProv").value=id;
                var text = $("#txt_pro_"+id).html();
                text = text.replace("<span>", "");
                text = text.replace("</span>", "");
                $("#nombreUsuer").val( text );
                  document.getElementById('nombreUsuer').readOnly = true;
                  
                $("#lista_id").html('');
                if(text!='Sin Resultados'){
                    
                    $("#lista_id").hide();
                }

              

            }
var cleanUser=function(){
                document.getElementById('nombreUsuer').readOnly = false;
                document.getElementById('nombreUsuer').value ="";
                document.getElementById("idProv").value=0;
            }
var guardarVenta=function(){
    var formData = new FormData($("#formProcesoventa")[0]);

    loadertooglebtn('saveVenta',1);
                    $.ajax({
                        url: 'controller/producto/regVenta.php',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function( data ){
                            var Parse_Registro = $.parseJSON(data);
                            if( Parse_Registro.success ){
                                Swal.fire({ icon: 'success', title: '' ,showConfirmButton: false, timer: 1200});
                                    //$("#agregarCateModal").modal("hide");                  
                                   //getCategorias(); 
                                   getImgProd();
                                   $("#procesoVentamodal").modal("hide");
                                   $("#formProcesoventa")[0].reset();
                            }else{
                                Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
                                //$("#form_basesUpdCli")[0].reset();
                            }
                        loadertooglebtn('saveVenta',2);
                        }
                    });
}
var procAbonar=function(){
    var formData = new FormData($("#formAbonar")[0]);

    loadertooglebtn('btnAbon',1);
                    $.ajax({
                        url: 'controller/producto/regAbono.php',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function( data ){
                            var Parse_Registro = $.parseJSON(data);
                            if( Parse_Registro.success ){
                                Swal.fire({ icon: 'success', title: '' ,showConfirmButton: false, timer: 1200});
                                    //$("#agregarCateModal").modal("hide");                  
                                   //getCategorias(); 
                                   getImgProd();
                                   $("#procesoVentamodal").modal("hide");
                                   $("#formAbonar")[0].reset();
                            }else{
                                Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
                                //$("#form_basesUpdCli")[0].reset();
                            }
                        loadertooglebtn('btnAbon',2);
                        }
                    });
}
</script>

