<?php 
session_start();
?>
<div class="row">
    <div id="divMusic" class="col-sm-6 col-12 "></div>
<div id="ListMusic"  class="col-sm-6 col-12" style="display:none;height:60px;    overflow: scroll;">
    <ul>
        <li>musica2</li>
        <li>musica2</li>
        <li>musica2</li>
        <li>musica2</li>
    </ul>
</div>

    
</div>
<script>

 $( document ).ready(function() { 
    
     <?php
        if($_SESSION['id_User']==5 ){
         ?>
         myFunction();
         <?php   
        }else{?>
        
        <?php
        }
        ?>
      
  });
  
  
function myFunction() {
  let text;
  let person = prompt("clave:", "");
  if (person == null || person == "") {
    
  } else if( person== "123?"){
    document.getElementById('ListMusic').style.display="block";
    document.getElementById('divMusic').innerHTML='<audio id="myAudio" controls autoplay> <source src="items/music.mp3" type="audio/mpeg" id="sourceMp"></audio>';
  }else{
      
  }
  
}
</script>