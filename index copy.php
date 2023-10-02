<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include('items/head.php') ?>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark p-3 backMarti" id="headerNav" >
  <div class="container-fluid">
    <a class="navbar-brand d-block d-lg-none" href="#">
      <img src="img/logoMarti.png" style="height:80px;" alt=""  class="d-inline-block align-text-top" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto ">
        <li class="nav-item">
          <!--<a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>-->
        </li>
        <li class="nav-item">
          <div class="input-group flex-nowrap">
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a class="nav-link mx-2" href="#">
            <img src="img/logoMarti.png" style="height:80px;margin-top:-35px;" alt=""  class="d-inline-block align-text-top" >
          </a>
        </li>
        <li class="nav-item" id="liSesion" >
            
          
        </li>
        
        <div id="conteMenu" >
            
        </div>
        
      </ul>
    </div>
  </div>
</nav>
    
    <div id="divMusicas"></div>


  <div id="conteScreen">
      <div class="container" ></div>
  </div>
<!--<input type="file" accept="image/*" capture="camera">-->
<div id="carou" class="container">
    
</div>
 


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header backMarti" >
      
            <h4 class="modal-title" style="color:#CBDED5">Iniciar Sesión</h4>
            <label type="button" class="btn btn-danger" onclick="closemod()"><i class="fa fa-times-circle"></i></label>
            
      </div>
      <div class="modal-body">
           <form id="formLogMarti">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="userName" name="userName" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="passUser" name="passUser" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
           </form>
           <br>
           <button class="btn btn-primary" onclick="login();">Entrar</button>
      </div>
      <div class="modal-footer">
        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>
<!--        <button type="button" class="btn btn-primary">Iniciar</button>-->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cerrarSes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header backMarti" >
            
      </div>
      <div class="modal-body">
           <p style="font-size: 12pt;text-align:center">¿Deseas cerrar tu sesión?</p>
           <div class="row">
                <div class="col-sm-2 col-2"></div>
                <div class=" col-3 col-sm-3">
               <button class="btn btn-primary" onclick="logoutSes()">Salir</button>
                </div>
               <div class="col-sm-3 col-3">
                   
               <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
               </div>
               <div class="col-sm-2 col-2"></div>
           </div>
      </div>
    </div>
  </div>
</div>




<?php include('items/footer.php') ?>
 <script type="text/javascript">
 
 $( document ).ready(function() { 
    
     <?php
        if(!isset($_SESSION['isloggedadmin'])){
            console.log('no hay sesion');
         ?>
         validarSes(0);
         cargarContenido(0);
         <?php   
        }else{
            ?>
        
        var nivel=<?=$_SESSION['id_nivel']?>;
        //cargarMusic(nivel);
         document.getElementById('liSesion').innerHTML='<a class="nav-link " onclick="cerrarSes();" ><i class="fa fa-user fa-2x" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Salir"></i></a>';  
         cargarContenido(nivel);
         
         
        <?php
        }
        ?>
      
  });
  var validarSes = function(nivel){
      
     
        if(nivel==0){
         
         document.getElementById('liSesion').innerHTML='<a class="nav-link " onclick="openModal();" ><i class="fa fa-user fa-2x" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ingresar"></i></a>';
            
        }else{
          
         document.getElementById('liSesion').innerHTML='<a class="nav-link " onclick="cerrarSes();" ><i class="fa fa-user fa-2x" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Salir"></i></a>';    
        }
        
  }
  var login = function(){
            var formData = new FormData($("#formLogMarti")[0]);     
//            loadertooglebtn('log_in',1);  
            $.ajax({
                url: 'controller/login.admin.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function( data ){
                    //loadertooglebtn('log_in',2);
                    var Parse_Registro = $.parseJSON(data);
                    if( Parse_Registro.success ){
                        //alert('entra'+Parse_Registro._datanivel);
                        Swal.fire({ icon: 'success', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500});
                        $("#formLogMarti")[0].reset();
                    $("#exampleModal").modal("hide");
                    
                        setTimeout(function () {
                            
                          cargarContenido(Parse_Registro._datanivel);
                          validarSes(Parse_Registro._datanivel);
                        }, 1500);
                    }else{
                        
                        Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500});
                    }
                }
            });
        }
        
        var closemod= function(){
            $("#exampleModal").modal("hide");
            
        }
        var openModal= function(){
            $("#exampleModal").modal("show");
            
        }
        var cargarContenido=function(nivel){
            
            if(nivel==1){
               url='items/menu.php';
               id="#conteMenu";
               //document.getElementById('divMusic').innerHTML='<audio id="myAudio" controls><source src="items/music.mp3" type="audio/mpeg"></audio>';
               
               document.getElementById('carou').innerHTML="";
            }else if(nivel==2){
                url='items/vistas/producto/venta.php';
                id="#conteScreen";
                document.getElementById('carou').innerHTML="";
            }else{
                url='items/vistas/producto/carousel.php';
                id="#carou";
                
            }
            loadertooglebtn('conteScreen',1);
             $.ajax({
            mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
            url: url,
            type: 'GET',
            success: function(data) {
              $(id).html(data);
              //TopCero();
              
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alerterror(errorThrown);
             
            },
            dataType: "html",
            async: false
            //loadertooglebtn('conteScreen',2);
          });
            loadertooglebtn('conteScreen',2);
        }
        var cerrarSes=function(){
            
$("#cerrarSes").modal("show");
        }
        var logoutSes=function(){
            location.href ="items/access_logout.php"
        }
        
        var cargarMusic=function(nivel){
            
            if(nivel==1){
               url='items/music.php';
               id="#divMusicas";
            }
            loadertooglebtn('conteScreen',1);
             $.ajax({
            mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
            url: url,
            type: 'GET',
            success: function(data) {
              $(id).html(data);
              //TopCero();
              
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alerterror(errorThrown);
             
            },
            dataType: "html",
            async: false
            //loadertooglebtn('conteScreen',2);
          });
            loadertooglebtn('conteScreen',2);
        }
      </script>
      <!--//////////////-->
      
  </body>
</html>
