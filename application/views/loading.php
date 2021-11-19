
<!DOCTYPE html>
<html>

<head>
    
<link rel="stylesheet" href="<?php echo base_url('dist/css/carga.css'); ?>">
    
</head>
<body>

<div id="contenedor_carga" style="">
    <div id="carga"></div>
</div>
</body>

<footer>

<script>
  window.onload = function(){
    var contenedor = document.getElementById("contenedor_carga");
    contenedor.style.visibility = "hidden";
    contenedor.style.opacity = "0";
  }
</script>
</footer>
</html>