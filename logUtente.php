<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Utente</title>
    <link rel="stylesheet" href="./css/utenti.css">
    <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
</head>
<body>



<?php




include('Connect.php');
        
if(isset($_POST['utente']) && isset($_POST['reparto'])){



$utente=$_POST['utente'];
$reparto=$_POST['reparto'];


$Datetime=Date("d/m/Y");

} 


                        $sql="INSERT INTO logUtente 

                        (codente, utente, datatime) 

                        VALUES 

                        ( :codente,   :utente, :datatime)";

                        
                                    $ins=$pdo->prepare($sql);

                                    $ins->bindParam(':codente',$reparto);
                                    $ins->bindParam(':utente',$utente);
                                    $ins->bindParam(':datatime', $Datetime);

                        $ins->execute()

                        or die ("Errore di registrazione");



  
?>


                   
</body>
</html>