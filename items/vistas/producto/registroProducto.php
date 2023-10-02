<h4 class="text-center">Registro de Productos</h4>
      <div class="container backMarti" style="width: 96%;border-style: outset;">
          <form  id="form_agregarConven" name="formulario" >
          <br>
          <div class="row">
          <div class="col-12 col-sm-6">
              <img src="img/clothes.png" style="width: 50%;">
          </div>
          <div class="col-12 col-sm-6">
             <div class="input-group">
                 <div class="input-group-text"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                <input type="text" class="form-control" id="nombreProduct" name="nombreProduct" placeholder="Nombre del producto" />
              </div>
              <br>
              <br>
              <div class="input-group">
                 <div class="input-group-text"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                <input type="text" class="form-control" id="noProducto" name="noProducto" placeholder="No. producto" />
              </div>
          </div>
          </div><br>
          <div class="row">
          
          <div class="col-12 col-sm-6">
             
          </div>
          </div><br>
          
          <div class="row">
          
          <div class="alert alert-warning " role="alert" style="font-size:9pt;">
             *No poner cantidades con signo de pesos, ni comas 
          </div>
          <br>
          <div class="col-12 col-sm-6">
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></div>
              <input type="text" class="form-control" id="precioCompra" name="precioCompra" placeholder="Precio compra" />
            </div>
         </div>
         <br>
         <div class="col-12 col-sm-6">
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></div>
              <input type="text" class="form-control" id="precioVent" name="precioVent" placeholder="Precio venta" />
            </div>
         </div>
         </div>
         <br>
         <div class="row">
          <div class="col-12 col-sm-6">
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></div>
              <input type="text" class="form-control" id="color" name="color" placeholder="Color" />
            </div>
         </div>
         <br>
         <div class="col-12 col-sm-6">
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></div>
              <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" />
            </div>
         </div>
         </div>
         <br>
         <div class="row">
          <div class="col-12 col-sm-6">
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
              <select name="catePren" id="catePren" class="form-control">
                  </select><label class="btn btn-success" onclick="agregarCate(1)"><i class="fa fa-plus" aria-hidden="true"></i></label>
            </div>
         </div>
         <br>
         <div class="col-12 col-sm-6">
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
              <select name="cateUser" id="cateUser" class="form-control">
                 
              </select>
              <label class="btn btn-success" onclick="agregarCate(2)"><i class="fa fa-plus" aria-hidden="true"></i></label>
            </div>
         </div>
         </div>
         <br>
         <div class="row">
          <div class="col-12 col-sm-12">
              <div class="input-group">
               <div class="input-group-text"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                  <textarea name="descripcionProd" id="descripcionProd" cols="20" rows="2" class="form-control" placeholder="Descripción del producto"></textarea>
            </div>
         </div>
         
         
         </div>
         <br>
         <div class="row">
             <div class="col-12 col-sm-12" style="overflow-x: scroll;height: 200px;">
              <div class="input-group">
              
                  <!--<input type="file" class="form-control" accept="image/*" capture="camera" name="fotoProduct" id="fotoProduct">-->
                  <!--<input onchange="readURL(this),preViz()" class="form-control" type="file" accept="image/*" id="fotoProduct" name="fotoProduct" >-->
            </div>
            <button type="button" class="btn_photo" onclick="showphoto('img_panoramica','panoramica')"><i class="fa fa-camera"></i></button>Foto del producto.
                                            </label><br>
                                            <img style="display: none;" class="ft_img" id="img_panoramica" src="" alt="panoramica" />
                                            <input type="hidden" name="panoramica" id="panoramica" value="" ><br>
         </div>
         </div>
         
        </form>
        <br>
        <button class="btn btn-primary" onclick="guadarProd()" id="btnSave">Guardar</button>
      </div>
      
      
      <!--//modales-->
      
      <div class="modal fade" id="agregarCateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="background-image: linear-gradient(to right, rgba(74, 95, 84   ,2), rgba(23, 189, 108  ,3));">
           <label type="button" class="btn btn-danger" onclick="closemodCate()" style="margin-left: 279px;height: 20px;font-size: 14pt;padding-top: 0px;margin-top: -7px;background-color: transparent;
    border: none;"><i class="fa fa-times-circle" style="color:#E80007"></i></label> 
      </div>
      <div class="modal-body">
           <div id="titRegCat"></div>
           <form id="formCatego">
              <div class="row">
                  <input type="hidden" readonly id="TipoCat" name="TipoCat">
                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria">
                </div> 
           </form>
           <br>
               <button class="btn btn-primary" onclick="guardarCate()" id="saveCate" style="margin-left: 239px;height: 33px;font-size: 9pt;">Guardar</button>
                
           
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="getphoto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 10px 10px 0px 7px !important;">
                <h4 class="titlemodal" >Selecciona un dispositivo</h4>
                <label class="btn btn-danger" data-dismiss="modal" aria-label="Close" onclick="cerrarTomarFoto()"><span aria-hidden="true">&times;</span></label> 
            </div>
            <div class="modal-body">       
                <div>
                    <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
                    <p id="estado"></p>
                </div>
                <input type="hidden" id="validimg" value="">
                <input type="hidden" id="validbase" value="">
                <br>
                <video style="width: 100%;" muted="muted" id="video"></video>
                <canvas id="canvas" style="display: none;"></canvas>
            </div>
            <div class="modal-footer">
                <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  redes pad10" align="center" >
                    <button type="button" class="btn linea" id="boton"> Tomar Foto </button>
                </div> 
            </div>
            <div class="modal-footer">
                <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  redes pad10" align="center" >
                    No pudiste capturar la evidencia? <button type="button" class="btn linea" onclick="fileClick();"> inténtalo aquí </button>
                    <input onchange="readURL(this)" type="file" accept="image/*" id="multimedia-postevd" name="multimedia" style="opacity: 0;">
                </div> 
            </div>            
        </div>
    </div>
</div>
      <script>
      $(document).ready(function() {
            getCategorias();
            

            } );
            var preViz=function(){
                const $seleccionArchivos = document.querySelector("#fotoProduct"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
    document.getElementById('imagenPrevisualizacion').style.display="block";
    document.getElementById('divimagenPrevisualizacion').style.display="block";
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
}

            
            function resizeImage(file, size, callback) {
                var fileTracker = new FileReader;
                
                fileTracker.onload = function() {
                    var image = new Image();
                    image.onload = function(){
                        var canvas = document.createElement("canvas");
                        //alert(image.width);
                        $("#before").html(image.width+"x"+image.height);
                        if(image.width > size) {
                            image.height = image.height / 6;
                            image.width = image.width / 6;
                        }
                        $("#after").html(image.width+"x"+image.height);
                        var ctx = canvas.getContext("2d");
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        canvas.width = image.width;
                        canvas.height = image.height;
                        ctx.drawImage(image, 0, 0, image.width, image.height);
                        callback(canvas.toDataURL("image/png"));
                    };
                    image.src = this.result;
                }
                fileTracker.readAsDataURL(file);
                fileTracker.onabort = function() {
                    alert("The upload was aborted.");
                }
                fileTracker.onerror = function() {
                    alert("An error occured while reading the file.");
                }
            }


            function showphoto(idimg,idbase){
                $('#getphoto').modal('show');
                $('#validimg').val(idimg);
                $('#validbase').val(idbase);
            }


            function fileClick(){
                $("#multimedia-postevd").trigger("click");
            }

            function readURL(input) {
  
                idimg  = $('#validimg').val();
                idbase = $('#validbase').val();                   

                id = idimg;

                if (input.files && input.files[0]) {

                    extensiones_permitidas = new Array(".gif", ".jpg", ".png", ".jpeg");
                    archivo=input.value;
                    extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
                    permitida = false; 
                    for (var i = 0; i < extensiones_permitidas.length; i++) { 
                       if (extensiones_permitidas[i] == extension) { 
                       permitida = true; 
                       break; 
                       } 
                    } 
                    if (!permitida) {
                        Swal.fire({ icon: 'error', title: 'Tipo de archivo no permitido' ,showConfirmButton: false, timer: 1500});
                    }
                    else{
                        var reader = new FileReader();
                        reader.onload = function (e) {

                            var file = input.files[0]; // Multiple files can be dropped. Lets only deal with the "first" one.
                            var maxWidth = 700; // 400 px
                            if (file.type.match('image.*')) {
                                resizeImage(file, maxWidth, function(result) {
                                    $('#'+id).attr('src', result);
                                    $('#'+idbase).attr('value', result);
                                    // alert(e.target.result);
                                    // alert(result);                                    
                                    $('#'+id).show();              
                                    $('#getphoto').modal('hide');
                                    $('#validimg').val();
                                    $('#validbase').val();  

                                    if(id=='img-postevd'){
                                        $('#btn-addattachevd').show();
                                    }                    
                                });
                            } else {
                                Swal.fire({ icon: 'error', title: 'Tipo de archivo no permitido' ,showConfirmButton: false, timer: 1500});
                            }

                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }

            
            var getCategorias=function(){
                
                $.ajax({
                    url: 'controller/categorias/get.Categorias.php',
                    type: 'POST',
                    data: {},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            var catePren=document.getElementById("catePren");
                            var cateUser=document.getElementById("cateUser");
                            
                            catePren.innerHTML=Parse_Registro._dataCatePren;
                            cateUser.innerHTML=Parse_Registro._dataCateUser;

                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });

            }
      formulario.precioCompra.addEventListener("keypress", soloNumeros, false);
      formulario.noProducto.addEventListener("keypress", soloNumeros, false);
      formulario.precioVent.addEventListener("keypress", soloNumeros, false);
      
          

function truncaTelC2(e){
            if($("#telefonoC2").val().length>10){
                $("#telefonoC2").val($("#telefonoC2").val().slice(0,10)); 
            }                
        }
var guadarProd=function(){
    var formData = new FormData($("#form_agregarConven")[0]);
    if($("#panoramica").val()==''){
                        Swal.fire({ icon: 'warning', title: 'Suba Evidencia Panorámica.',showConfirmButton: false, timer: 1500});
                         
                    }else{
                        loadertooglebtn('btnSave',1);
                    $.ajax({
                        url: 'controller/producto/registrarProduct.php',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function( data ){
                            var Parse_Registro = $.parseJSON(data);
                            if( Parse_Registro.success ){
                                Swal.fire({ icon: 'success', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});    
                                $("#form_agregarConven")[0].reset();
                                // $("#accion_modal").modal("hide");                  
                                //   getDatosBase(); 
                            }else{
                                Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
                                //$("#form_basesUpdCli")[0].reset();
                            }
                        loadertooglebtn('btnSave',2);
                        }
                    });
                    }
    
}
//agregarCateP
//agregarCateU


var agregarCate=function(tipoCate){
    var tit='';
    if(tipoCate==1){
        $("#agregarCateModal").modal("show");
        document.getElementById('TipoCat').value=tipoCate;
        
        tit='prenda';
    }else{
       $("#agregarCateModal").modal("show");
      document.getElementById('TipoCat').value=tipoCate; 
      tit='uso';
    }
       document.getElementById('titRegCat').innerHTML='<p style="font-size: 12pt;text-align:center">Registrar categoria '+tit+'</p>';
}
var closemodCate= function(){
    $("#agregarCateModal").modal("hide");
}
var cerrarTomarFoto= function(){
    $("#getphoto").modal("hide");
}
var guardarCate=function(){
    var formData = new FormData($("#formCatego")[0]);

    loadertooglebtn('saveCate',1);
                    $.ajax({
                        url: 'controller/categorias/registrarCate.php',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function( data ){
                            var Parse_Registro = $.parseJSON(data);
                            if( Parse_Registro.success ){
                                Swal.fire({ icon: 'success', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
                                    $("#agregarCateModal").modal("hide");                  
                                   getCategorias(); 
                                   $("#formCatego")[0].reset();
                            }else{
                                Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 3000});
                                //$("#form_basesUpdCli")[0].reset();
                            }
                        loadertooglebtn('saveCate',2);
                        }
                    });
}
      </script>
      <script>
const tieneSoporteUserMedia = () =>
    !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
const _getUserMedia = (...arguments) =>
    (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);

// Declaramos elementos del DOM
const $video = document.querySelector("#video"),
    $canvas = document.querySelector("#canvas"),
    $estado = document.querySelector("#estado"),
    $boton = document.querySelector("#boton"),
    $listaDeDispositivos = document.querySelector("#listaDeDispositivos");

const limpiarSelect = () => {
    for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--)
        $listaDeDispositivos.remove(x);
};
const obtenerDispositivos = () => navigator
    .mediaDevices
    .enumerateDevices();

// La función que es llamada después de que ya se dieron los permisos
// Lo que hace es llenar el select con los dispositivos obtenidos
const llenarSelectConDispositivosDisponibles = () => {

    limpiarSelect();
    obtenerDispositivos()
        .then(dispositivos => {
            const dispositivosDeVideo = [];
            dispositivos.forEach(dispositivo => {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            if (dispositivosDeVideo.length > 0) {
                // Llenar el select
                dispositivosDeVideo.forEach(dispositivo => {
                    const option = document.createElement('option');
                    option.value = dispositivo.deviceId;
                    option.text = dispositivo.label;
                    $listaDeDispositivos.appendChild(option);
                });
            }
        });
}

(function() {
    // Comenzamos viendo si tiene soporte, si no, nos detenemos
    if (!tieneSoporteUserMedia()) {
        alert("Lo siento. Tu navegador no soporta esta característica");
        $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
        return;
    }
    //Aquí guardaremos el stream globalmente
    let stream;


    // Comenzamos pidiendo los dispositivos
    obtenerDispositivos()
        .then(dispositivos => {
            // Vamos a filtrarlos y guardar aquí los de vídeo
            const dispositivosDeVideo = [];

            // Recorrer y filtrar
            dispositivos.forEach(function(dispositivo) {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            // y le pasamos el id de dispositivo
            if (dispositivosDeVideo.length > 0) {
                // Mostrar stream con el ID del primer dispositivo, luego el usuario puede cambiar
                mostrarStream(dispositivosDeVideo[0].deviceId);
            }
        });



    const mostrarStream = idDeDispositivo => {
        _getUserMedia({
                video: {
                    // Justo aquí indicamos cuál dispositivo usar
                    deviceId: idDeDispositivo,
                }
            },
            (streamObtenido) => {
                // Aquí ya tenemos permisos, ahora sí llenamos el select,
                // pues si no, no nos daría el nombre de los dispositivos
                llenarSelectConDispositivosDisponibles();

                // Escuchar cuando seleccionen otra opción y entonces llamar a esta función
                $listaDeDispositivos.onchange = () => {
                    // Detener el stream
                    if (stream) {
                        stream.getTracks().forEach(function(track) {
                            track.stop();
                        });
                    }
                    // Mostrar el nuevo stream con el dispositivo seleccionado
                    mostrarStream($listaDeDispositivos.value);
                }

                // Simple asignación
                stream = streamObtenido;

                // Mandamos el stream de la cámara al elemento de vídeo
                $video.srcObject = stream;
                $video.play();

                //Escuchar el click del botón para tomar la foto
                //Escuchar el click del botón para tomar la foto
                $boton.addEventListener("click", function() {

                    //Pausar reproducción
                    $video.pause();

                    //Obtener contexto del canvas y dibujar sobre él
                    let contexto = $canvas.getContext("2d");
                    $canvas.width = $video.videoWidth;
                    $canvas.height = $video.videoHeight;
                    contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                    let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                    idimg  = $('#validimg').val();
                    idbase = $('#validbase').val();


                    $('#'+idimg).attr('src',foto);
                    $('#'+idbase).attr('value',foto);
                    $('#'+idimg).show();
                    $('#getphoto').modal('hide');
                    $('#validimg').val();
                    $('#validbase').val();                    
                    // $estado.innerHTML = "Enviando foto. Por favor, espera...";
                    // fetch("./guardar_foto.php", {
                    //         method: "POST",
                    //         body: encodeURIComponent(foto),
                    //         headers: {
                    //             "Content-type": "application/x-www-form-urlencoded",
                    //         }
                    //     })
                    //     .then(resultado => {
                    //         // A los datos los decodificamos como texto plano
                    //         return resultado.text()
                    //     })
                    //     .then(nombreDeLaFoto => {
                    //         // nombreDeLaFoto trae el nombre de la imagen que le dio PHP
                    //         console.log("La foto fue enviada correctamente");
                    //         $estado.innerHTML = `Foto guardada con éxito. Puedes verla <a target='_blank' href='./${nombreDeLaFoto}'> aquí</a>`;
                    //     })

                    //Reanudar reproducción
                    $video.play();
                });
            }, (error) => {
                console.log("Permiso denegado o error: ", error);
                $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
            });
    }
})();    
</script>