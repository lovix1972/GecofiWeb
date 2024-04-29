<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina</title>
</head>
<body>

<table class="table table-striped-columns">

<?php
include_once("Connect.php");
$id=0;
if(isset($_GET['ID_PDS'])){
  
$id=$_GET['ID_PDS'];

}
$ok=($id);

if($ok)


  $ID_PDS=$_GET['ID_PDS'];
  $delete=  $pdo->prepare("delete from Registro_PDS where ID_PDS='$ID_PDS'");
  $delete->execute();


  ?>

      
        


</table>
</body>

</html