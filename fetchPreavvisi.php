<?php

include('Connect.php');


$sql=$pdo ->query("SELECT *, sum(Preavvisi) as totPreavvisi from Capitoli GROUP BY capitolo, art ");


$risultato=Array();
 
while($row=$sql->fetch()){
      
    $risultato[] =  $row;
}
 
   
$data = array($risultato);
 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($risultato);

 ?>
