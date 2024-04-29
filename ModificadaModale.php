<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

include('connect.php');

$id_pds =                       $_POST['id_pds'];
$data_protocollo=               $_POST['data_protocollo'];
$oggetto=                       $_POST['oggetto'];
$reparto=                       $_POST['reparto'];
$id_reparto=                    $_POST['id_reparto'];
$id_capitolo=                   $_POST['id_capitolo'];
$capitolo=                      $_POST['capitolo'];
$art=                           $_POST['art'];
$idv=                           $_POST['idv'];
$decreto=                       $_POST['decreto'];
$valore_progetto=               $_POST['valore_progetto'];
$previsto_impegno=              $_POST['previsto_impegno'];
$impegnato=                     $_POST['impegnato'];
$contabilizzato=                $_POST['contabilizzato'];


$sql="UPDATE Registro_PDS SET Data_protocollo='$data_protocollo', Oggetto='$oggetto',Reparto='$reparto', ID_Reparto=$id_reparto,id_capitolo=$id_capitolo, Capitolo=$capitolo, Art=$art, IDV=$idv, Decreto='$decreto', Valore_progetto='$valore_progetto',Previsto_impegno='$previsto_impegno',Impegnato='$impegnato',Contabilizzato='$contabilizzato' where ID_PDS=$id_pds";

$update=$pdo->prepare($sql);


$update->execute();
?>



</body>
</html>

