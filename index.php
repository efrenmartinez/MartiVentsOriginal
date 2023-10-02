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
      <img src="img/logoMarti.png" style="height:80px;" alt=""  class="d-inline-block align-text-top img-marti" >
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
          <a class="nav-link mx-2" href="#" >
            <img src="img/logoMarti.png" style="height:80px;margin-top:-35px;" alt=""  class="d-inline-block align-text-top img-marti" >
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
  <div>
    <?php
    include('items/vistas/login/login.php')
    ?>
  </div>  




<?php include('items/footer.php') ?>
 <script type="text/javascript">
  $('.img-marti').on('click',function(){
    $('#modalLogin').modal('show');
  });

  
 </script>
  </body>
</html>
