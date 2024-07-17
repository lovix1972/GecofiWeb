<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" type="Text/css" href="./CSS/style.css">  
 
</head>
<body>
<?php 
  include('connect.php');
  
   $name = $_POST['name'];
  
  
?>
 <thead>


          
<table class="tblfinestra" >

      
<?php
   $sql = "SELECT * FROM Registro_PDS WHERE oggetto like '%".$name."%'";  
   $query = $pdo->query($sql);
   $data='';
   while($row = $query->fetch())
    {
    echo"
    <tr>
    <td>".$row['num_PDS']." </td>
   
    <td>".$row['Oggetto']."</td>
 
    <td>".number_format($row["previsto_impegno"],2,',','.')."</td>
    <td>".number_format($row["Impegnato"],2,',','.')."</td>
    <td>".number_format($row["Contabilizzato"],2,',','.')."</td></tr>";   
    }
 ?>
</table>
</body>
</html>