<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    




<?php
require_once ('Connect.php');




$query=$pdo->query("SELECT * FROM capitoli where id_Reparto=3 and capitolo=1189");

$count= $query->fetch();

$risultato=Array();

while($row=$query->fetch()){
      
    $risultato[] = $row;


}
  
  
$data = array($risultato);





header('Content-Type: application/json; charset=utf-8');
  json_encode($risultato);
?>
<table>

          <th>Capitolo</th>
           <th>Art</th>
           <th>Pravvisi</th>
           <th>Reparto</th>  
        
   
        <?php
    
    foreach($risultato as $dati){
    ?>
    <div class="container">
   
                 

 <tr> 
    <td><?php echo $dati['capitolo']?> </td>
  <td><?php echo $dati['art']?> </td>
  <td><?php echo $dati['Preavvisi']?> </td>
  <td><?php echo $dati['id_Reparto']?> </td></tr>
   
    
         </table>    
  <?php  
}

  ?>
  </div>
  </body>
</html>