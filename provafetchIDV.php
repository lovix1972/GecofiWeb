<?php

include('Connect.php');


$sql="SELECT *, sum(Preavvisi) as totPreavvisi from Capitoli where id_Reparto=1 group by capitolo, art";

 
$count= $sql->fetch();
 
$risultato=Array();
 
while($row=$sql->fetch()){
      
    $risultato[] = $row;
}
 
   
$data = array($count);
 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($risultato);

 ?>
