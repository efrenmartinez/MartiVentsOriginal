   <script>
   
   
    
          
   function loadertooglebtn(element,tipo){
    var divloader = '<div id="loader-d" class="spinner-border text-primary m-1"></div>';
    if(tipo==1)
    {
        $("#"+element).parent().append(divloader);
        $("#"+element).hide();
    }
    else{
        $("#loader-d").remove();
        $("#"+element).show();
    }
    
}
// function validarSesion(){


//           if(logged==true){

//           }else{
//             location.href = "https://pruebasspoti.000webhostapp.com/MartiVents/";
//           }
//         }
var menuOp=function(opcion){
            //validarSesion();
            if(opcion==1){
               url="items/vistas/producto/registroProducto.php";
               id="#conteScreen";
            }else if(opcion==2){
                url="items/vistas/usuario/usuarios.php";
               id="#conteScreen";
            }else if(opcion==3){
                url="items/vistas/producto/datosProducto.php";
               id="#conteScreen";
            }else if(opcion==4){
                url="items/vistas/usuario/datosLogUser.php";
               id="#conteScreen";
            }else if(opcion==5){
                url="items/vistas/estadisticas/estadisticasVenta.php";
               id="#conteScreen";
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

function soloNumeros(e){
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
                e.preventDefault();
            }
        }
        


</script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="js/sweetalert.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>  
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>    

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> 
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script> 

  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
    
    <!---->
    <script src="js/shepherd.js"></script>
   <!---->
   
   