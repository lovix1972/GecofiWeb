<?php

include('Connect.php');


$sql=$pdo ->query("SELECT * from Capitoli  ");


$risultato=Array();
 
while($row=$sql->fetch()){
      
    $risultato[] =  $row;
}
 
$data = array($risultato);
 
header('Content-Type: application/json; charset=utf-8');
 json_encode($risultato);

 ?>
