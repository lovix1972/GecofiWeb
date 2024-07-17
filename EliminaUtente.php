<?php
session_start();
include ("Connect.php"); 
if(!isset($_SESSION['utente'])){
header('location:session.php');
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina Utente</title>

</head>
<body>

<table class="table table-striped-columns">

<?php
include_once("Connect.php");
$id=0;
if(isset($_GET['ID'])){$id=$_GET['ID'];}
$ok=($id);
if($ok)



  $ID=$_GET['ID'];
  $delete=  $pdo->prepare("delete from Utenti where ID='$ID'");
  $delete->execute();


  ?>

 
        


</table>
</body>

</html