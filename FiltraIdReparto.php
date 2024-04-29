<?php

include('Connect.php');

$id=$_POST['id'];
$sql="SELECT ID_Reparto, id_Capitolo, Capitolo, art, prog , IDV, PDC, Decreto from Capitoli where id_Reparto=$id group by IDV order by Capitolo, art ASC";

$stmt=$pdo->query($sql);
echo '<option value="" disabled selected> Codice Capitolo</option>';
 while($row=$stmt->fetch()){
 
 echo '<option value ="'.$row['id_Capitolo'].'">'.$row['id_Capitolo'].' -->  '.$row['Capitolo'].' / '.$row['art'].' / '.$row['prog'].' - '.$row['IDV'].'- '.$row['PDC'].'--->'.$row['Decreto'].'</option>';

}
 ?>