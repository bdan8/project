<?php
error_reporting(E_ALL ^ E_NOTICE);

$con = mysqli_connect("localhost","root","","agency");

if (mysqli_connect_errno()){
  
  echo "Ez a baja a MySQL-nek: " . mysqli_connect_error();
  
}

$result = mysqli_query($con,"set names 'utf8'");

$login = 'pavel.tibor@valami.hu';
$pass =  '896423f95929303ae8fe37f67316fb62a7b75a7a';
$nickname = 'Tibi'
?>