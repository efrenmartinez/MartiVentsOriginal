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
  <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search" aria-hidden="true"></i></span>
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 80%;">
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
        
<!--  <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--  <div class="container-fluid" style="background-image: linear-gradient(to right, rgba(74, 95, 84   ,2), rgba(23, 189, 108  ,3));">-->
      
      
<!--    <img src="img/logoMarti.png" style="width:120px;" alt=""  class="d-inline-block align-text-top" >-->
<!--    <div class="input-group flex-nowrap">-->
<!--  <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search" aria-hidden="true"></i></span>-->
<!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 80%;">-->
<!--</div>-->
<!--    <button style="background-color: #CBDED5;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUser" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--      <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <br>-->
<!--    <div class="collapse navbar-collapse" id="menuUser">-->
<!--     <div id="conteMenu">-->
      
<!--        </div>-->
<!--        <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--            <li class="nav-item" id="liSesion">-->
            
          
<!--        </li>-->
<!--      </ul>-->
      
<!--    </div>-->
<!--  </div>-->
<!--</nav>-->


  <div id="conteScreen">
      <div class="container" ></div>
  </div>
<!--<input type="file" accept="image/*" capture="camera">-->
<div id="carou" class="container">
    
</div>
 
<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
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

<a href="https://api.instagram.com/oauth/authorize?client_id=528541842374535&redirect_uri=https://pruebasspoti.000webhostapp.com/MartiVents/&scope=user_profile,user_media&response_type=code">iniciar con instagram</a>

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
<?php
if(isset($_GET['code'])){
$code = $_GET['code'];
$uri = 'https://api.instagram.com/oauth/access_token'; 


$data = [
	'client_id' => '528541842374535', 
	'client_secret' => '25163bd4c2b2339065c63fb76080108c', 
	'grant_type' => 'authorization_code', 
	'redirect_uri' => 'https://pruebasspoti.000webhostapp.com/MartiVents/', 
	'code' => $code
];
	
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $uri); // uri
	curl_setopt($ch, CURLOPT_POST, true); // POST
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // POST DATA
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // RETURN RESULT true
	curl_setopt($ch, CURLOPT_HEADER, 0); // RETURN HEADER false
	curl_setopt($ch, CURLOPT_NOBODY, 0); // NO RETURN BODY false / we need the body to return
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // VERIFY SSL HOST false
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // VERIFY SSL PEER false
	$result = json_decode(curl_exec($ch)); // execute curl
	echo '<pre>'; // preformatted view
	
	//ecit directly the result
	//exit(print_r($result)); 
	
	echo $result->access_token;
	echo'<br>';
	$user = $result->user;
	echo $user->id;
}
?>

<?php include('items/footer.php') ?>
 <script type="text/javascript">
 
 $( document ).ready(function() { 
    
     <?php
        if(!isset($_SESSION['isloggedadmin'])){
         ?>
         
         validarSes(0);
         cargarContenido(0);
         <?php   
        }else{?>
        
        var nivel=<?=$_SESSION['id_nivel']?>;
        cargarMusic(nivel);
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
            /*Swal.fire({
  title: '¿Deseas cerrar su sesión?',
  icon:'warning',
  showCancelButton: true,
  confirmButtonText: 'Salir',
  confirmButtonColor: '#095888',
  
}).then((result) => {
  
  if (result.isConfirmed) {
     
      location.href ="items/access_logout.php"
  } else if (result.isDenied) {
    
  }
})*/
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
      <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '652798119375588',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v14.0'
    });
  };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
  </body>
</html>