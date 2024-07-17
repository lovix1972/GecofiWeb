<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="./css/js/finanziaria.js" ></script>

  <title></title>
</head>
<body>
  <table>

         
     <th>n° PDS</th>
     <th>Reparto</th>
     <th>Cpt</th>
     <th>Art</th>
     <th>Prt</th>
     <th>Oggetto</th>  
     <th>Previsto Impegno</th>  
     <th>Impegnato</th>  
     <th>Contabilizzato</th>  



  
  <?php
  
  session_start();
   
  if(!isset($_SESSION['utente'])){
  header('location:session.php');
  } 


  
include('Connect.php');
if(isset($_POST['id_reparto']) && isset($_POST['anno']) && isset($_POST['capitolo']) && isset($_POST['art'])){


  $id_reparto=$_POST['id_reparto'];
  $anno=$_POST['anno'];
  $capitolo=$_POST['capitolo'];
  $art=$_POST['art'];
}
$sql="SELECT Anno, num_PDS, id_Reparto, Reparto,  capitolo, art, prog, Oggetto, elaborati, Valore_progetto, previsto_impegno, Impegnato , Contabilizzato from Registro_PDS where Anno=$anno and id_Reparto=$id_reparto and elaborati=1 and capitolo=$capitolo and art=$art";

$stmt=$pdo->query($sql);
while($cicle=$stmt->fetch()){
  echo"
<tr>
   <td>".$cicle['num_PDS']." </td>

   <td>".$cicle['Reparto']."</td>

   <td>".$cicle['capitolo']."</td>
   <td>".$cicle['art']."</td>
   <td>".$cicle['prog']."</td>
   <td style='text-align: left'>".$cicle['Oggetto']."</td>
   <td style='text-align: right' id='prev_imp'>".number_format($cicle["previsto_impegno"],2,',','.')."</td>
   <td style='text-align: right' id='impegnato'>".number_format($cicle["Impegnato"],2,',','.')."</td>
   <td style='text-align: right' id='cont'>".number_format($cicle["Contabilizzato"],2,',','.')."</td>
   </tr>";

}
 ?>  

<script>


</script>



</table>
</body>
</html>
<?php

