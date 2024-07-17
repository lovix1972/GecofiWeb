<?php

include('Connect.php');
if(isset($_POST['pds']) && isset($_POST['reparto'])){


$pds=$_POST['pds'];
$reparto=$_POST['reparto'];
}
$sql="SELECT num_PDS, Reparto, capitolo, art, prog, Oggetto, Valore_progetto from Registro_PDS where id_Reparto=$reparto and num_PDS like '%$pds%'";
$stmt=$pdo->query($sql);
while($cicle=$stmt->fetch()){
  echo"
<tr>
   <td>".$cicle['num_PDS']." </td>

   <td>".$cicle['Reparto']."</td>

   <td>".$cicle['capitolo']."</td>
   <td>".$cicle['art']."</td>
   <td>".$cicle['prog']."</td>
   <td>".$cicle['Oggetto']."</td>
   <td>".number_format($cicle["Valore_progetto"],2,',','.')."</td>
   </tr>";
}
 ?>