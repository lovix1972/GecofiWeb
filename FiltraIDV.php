<?php

include('Connect.php');

$id=$_POST['id'];
$sql="SELECT id_Reparto, id_Capitolo, Capitolo, art, prog, IDV from Capitoli where id_capitolo=$id group by IDV";

$stmt=$pdo->query($sql);

 while($row=$stmt->fetch()){
 
    echo '<option value ='.$row['IDV'].'>'.$row['IDV'].' </option>';

}
$risultato=json_encode($row);

 ?>