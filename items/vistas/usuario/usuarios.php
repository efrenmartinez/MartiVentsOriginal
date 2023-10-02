<h4 class="text-center">Registro de Productos</h4>
      <div class="container backMarti" >
          <form  id="form_agregarUser" name="formulario" >
          <br>
          <div class="row">
          <div class="col-12 col-sm-6">
              <img src="img/user.png" style="width: 76%;">
          </div>
          <div class="col-12 col-sm-6">
             <div class="input-group">
                 <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre del usuario" />
              </div>
              <br>
              <div class="input-group">
                 <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                <input type="text" class="form-control" id="contrasenia" name="contrasenia" placeholder="contraseña" />
              </div>
              <br>
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-level-up" aria-hidden="true"></i></div>
              <select name="nivel" id="nivel" class="form-control" onchange="tipoUser()">
                  <!--<option value="0">Selecciona nivel...</option>-->
                  <!--<option value="1">Admin</option>-->
                  <!--<option value="2">Vendedor</option>-->
                  <!--<option value="3">Usuario</option>-->
              </select>
            </div>
          </div>
          </div>
          
         <br>
         <div class="row" id="divDescUsuario" style="display:none">
             <div class="col-12 col-sm-12">
                 <div class="input-group">
                 <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                 <textarea class="form-control" id="descUsuario" name="descUsuario" placeholder="descripción del usuario"></textarea>
              </div>
             </div>
         </div>
         <br>
        </form>
        <div class="text-center">
            <button class="btn btn-primary" onclick="validarPass()" id="btnSaveUser">Guardar</button>
        </div>
         <br>
      </div>
      
      <script>
$(document).ready(function() {
            getNiveles();
            } );
            
            var getNiveles=function(){
                $.ajax({
                    url: 'controller/niveles/get.niveles.php',
                    type: 'POST',
                    data: {},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            var nivel=document.getElementById("nivel");
                            nivel.innerHTML=Parse_Registro._dataNiveles;

                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });

            }
var tipoUser=function(){
    var nivel=document.getElementById('nivel').value;
    if(nivel==3){
      document.getElementById('divDescUsuario').style.display="block";  
    }else{
        document.getElementById('divDescUsuario').style.display="none";
    }
    
}
var validarPass = function(){
    var numeroCaracteres = 0;
    var contra = $('#contrasenia').val();
    numeroCaracteres = contra.length;
    if(numeroCaracteres<6){
       Swal.fire({ icon: 'error', title: 'Ingrese una contraseña de almenos 6 caracteres' ,showConfirmButton: false, timer: 3000}); 
    }else{
        guadarUser();
    }
}
var guadarUser=function(){
    var formData = new FormData($("#form_agregarUser")[0]);

    loadertooglebtn('btnSaveUser',1);
                    $.ajax({
                        url: 'controller/usuario/registrarUser.php',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function( data ){
                            var Parse_Registro = $.parseJSON(data);
                            if( Parse_Registro.success ){
                                Swal.fire({ icon: 'success', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});    
                                $("#form_agregarUser")[0].reset();
                                // $("#accion_modal").modal("hide");                  
                                //   getDatosBase(); 
                            }else{
                                Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
                                //$("#form_basesUpdCli")[0].reset();
                            }
                        loadertooglebtn('btnSaveUser',2);
                        }
                    });
}
      </script>