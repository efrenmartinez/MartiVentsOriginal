<head>
    <?php include('items/head.php') ?>
  </head>
<div id="number"></div>
<div id="divBar">
    
</div>

<script>
    var n = 0;
var l = document.getElementById("number");

window.setInterval(function(){
  l.innerHTML = n;
  n++;
  document.getElementById('divBar').innerHTML='<div class="progress"><div class="progress-bar progress-bar-striped" role="progressbar" style="width: '+n+'%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div></div>';
  
  if (n==100){
  
  n=0;
}
},800);

</script>