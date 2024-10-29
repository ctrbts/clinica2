<?php 
$fecha=date("Y-m-d");
$mes= substr($fecha,5,2);
echo $mes;
$dia= substr($fecha,8,2);
echo $dia;
$año= substr($fecha,0,4);
echo $año;
?>