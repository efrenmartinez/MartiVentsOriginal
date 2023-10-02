<?php  
session_start();
session_destroy();

$url = "../";
header('Refresh: 0; url='.$url);
exit();
?>


