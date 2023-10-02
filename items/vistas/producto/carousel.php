<!--<div id="carouselExampleCaptions" class="carousel slide text-center" data-bs-ride="carousel" style="width:90%;max-height: 350px;">-->
<!--  <div class="carousel-indicators" id="divIndicador">-->
    
<!--  </div>-->
  
<!--  <div class="carousel-inner" id="divCarousel">-->
    
<!--  </div>-->
  
<!--  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">-->
<!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--    <span class="visually-hidden">Previous</span>-->
<!--  </button>-->
<!--  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">-->
<!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--    <span class="visually-hidden">Next</span>-->
<!--  </button>-->
  
<!--</div>-->
<br>
<div class="row " id="catImgProd">
    
</div>

<script>
$( document ).ready(function() { 
      //getImgCatProd();
  });
    var getImgCarousel=function(){
      
      $.ajax({
                    url: 'controller/producto/get.imgCarousel.php',
                    type: 'POST',
                    data: {},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            var divImgProd=document.getElementById("divCarousel");
                            divImgProd.innerHTML=Parse_Registro._dataImgCarousel;
                            
                            var divIndica=document.getElementById("divIndicador");
                            divIndica.innerHTML=Parse_Registro._dataIndicador;
                            

                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });
  }
  
  var getImgCatProd=function(){
      
      $.ajax({
                    url: 'controller/producto/get.imgCatalogoProductos.php',
                    type: 'POST',
                    data: {},
                    success: function( data ){
                        var Parse_Registro = $.parseJSON(data);
                        if( Parse_Registro.success ){
                            var divCatProd=document.getElementById("catImgProd");
                            divCatProd.innerHTML=Parse_Registro._dataImgCatProd;
                            

                        }
                        else{
                          Swal.fire({ icon: 'error', title: Parse_Registro.msg ,showConfirmButton: false, timer: 1500}); 
                        }
                    }
                });
  }
</script>