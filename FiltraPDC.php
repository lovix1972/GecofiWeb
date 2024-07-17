<?php

include('Connect.php');

$id=$_POST['id'];
$sql="SELECT id_Reparto, id_Capitolo, Capitolo, art, prog, PDC from Capitoli where id_capitolo=$id group by PDC";

$stmt=$pdo->query($sql);

 while($row=$stmt->fetch()){
 
 echo "<input type='text' value =".$row['PDC'].">";

}
 ?>