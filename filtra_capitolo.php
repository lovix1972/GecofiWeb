<?php
include ("Connect.php"); 




$id=$_POST['id'];
$sql="SELECT id_Reparto, id_Capitolo, Capitolo, art, prog from Capitoli where id_Reparto= $id group by Capitolo";

$stmt=$pdo->query($sql);

 while($row=$stmt->fetch()){
 
 echo '<option value ="'.$row['id_Capitolo'].'">'.$row['Capitolo'].' - '.$row['art'].' - '.$row['prog'].'</option>';
 }
?>
