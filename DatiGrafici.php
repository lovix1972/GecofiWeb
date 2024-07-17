<?php
header('Content-Type: application/json');
include_once("Connect.php");



$dataPoints= array();

$sql="SELECT count(ID_PDS) as totpds, Reparto FROM Registro_PDS";
$stmt = $pdo->query($sql);


    while($row = $stmt->fetch())
    {        
        $point = array("x" => $row['Reparto'] , "y" => $row['totpds']);

        array_push($dataPoints, $point);        
    }

    echo json_encode($dataPoints);


?>
