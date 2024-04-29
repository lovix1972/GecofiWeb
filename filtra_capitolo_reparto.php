<?php

session_start();


include ("Connect.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<table id="table-modale'"> 

<thead>
  <th>num_pds</th>
  <th>Data</th>
  <th>Oggetto</th>
  <th>Reparto</th>
  <th>Capitolo</th>
  <th>Art</th>
  <th>IDV</th>
  <th>Importo</th>
  <th>Prev.Impegno</th>
  <th>Impegnato</th>
  <th>Contabilizzato</th>

</thead>

<?php



if (isset($_POST['capitolo']) && isset($_POST['art']) && isset($_POST['reparto'])) {

$reparto=$_POST['reparto'];
$capitolo=$_POST['capitolo'];
$art=$_POST['art'];




}




$sql="SELECT * from Registro_PDS where  Capitolo=$capitolo and Art=$art and Reparto= '$reparto'  order by num_PDS ASC ";

$stmt=$pdo->query($sql);

 while($row=$stmt->fetch()){
 $data=date_create($row['Data_protocollo']);
    echo "
    <tr>
    
    <td>".$row['num_PDS']." </td>

    <td>".date_format($data, "d/m/Y")."</td>
    <td>".$row['Oggetto']."</td>
    <td>".$row['Reparto']."</td>
    <td>".$row['Capitolo']."</td>
    <td>".$row['Art']."</td>
    <td>".$row['IDV']."</td>
  
    <td>".number_format($row["Valore_progetto"],2,',','.')."</td>
    <td>".number_format($row["previsto_impegno"],2,',','.')."</td>
    <td>".number_format($row["Impegnato"],2,',','.')."</td>
    <td>".number_format($row["Contabilizzato"],2,',','.')."</td>
 
    </tr>";
 }


 $query1=$pdo->query("SELECT SUM(previsto_impegno) as previsto_impegno, SUM(Impegnato) as Impegnato, SUM(Contabilizzato) AS contabilizzato FROM Registro_pds  where Registrato=1 and Anno=2024 and capitolo<>4191 and capitolo<>4195 and Capitolo=$capitolo and art=$art and Reparto='$reparto'");       
      


 while (($row1=$query1->fetch()) ) {

echo"
   <tr>
   <td colspan=8>
 
   <td>".number_format($row1["previsto_impegno"],2,',','.')."</td>
   <td>".number_format($row1["Impegnato"],2,',','.')."</td>  
   <td>".number_format($row1["contabilizzato"],2,',','.')."</td>  
   </tr>";
}   







?>
</table>
</body>
</html>