<?php

include('Connect.php');

$id=$_POST['id'];
$sql="SELECT id_Reparto, id_Capitolo, Capitolo, art, prog from Capitoli where id_capitolo=$id group by art";

$stmt=$pdo->query($sql);

 while($row=$stmt->fetch()){
 
 echo '<option value ="'.$row['prog'].'">'.$row['prog'].' </option>';

}
 ?>