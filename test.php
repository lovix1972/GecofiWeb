<?php
include('Connect.php');




$query=$pdo->query("SELECT * FROM Capitoli ");

$count= $query->fetch();

$risultato=Array();

while($row=$query->fetch()){
      
    $risultato[] = $row;
}

   
$data = array($count);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($risultato);

?>

