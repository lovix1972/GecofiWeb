<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disattivazione Utente</title>
</head>
<body>
    

<?php

include('connect.php');

if(isset($_GET['idutente'])){

$idutente =            $_GET['idutente'];


$sql="UPDATE utenti SET attivo = 0 where ID = $idutente";

$update=$pdo->prepare($sql);


$update->execute();

}
?>



</body>
</html>