<?php
include_once ("Connect.php");


$risultato=[];

$sql="SELECT * from capitoli ";
$stmt=$pdo->query($sql);

$risultato=array($stmt);
while($row=$stmt->fetch()){
echo $row['capitolo'] .$row['art'];

}
var_dump($risultato);
