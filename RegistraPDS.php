<?php

session_start();


if(!isset($_SESSION['utente']))
{
header('location:session.php');

    
 } 
include "Connect.php";

    $n_PDS =                    $_POST['num_PDS']; 
    $n_protocollo =             $_POST['n_Protocollo'];
    $Data_protocollo=           $_POST['Data_protocollo'];
    $id_capitolo=               $_POST['ID_Capitolo'];
    $Capitolo=                  $_POST['Capitolo'];
    $Art=                       $_POST['Art'];
    $Prog=                      $_POST['Prog'];
    $ID_Reparto=                $_POST['id_Reparto'];
    $Reparto=                   $_POST['Reparto'];
    $Anno=                      $_POST['Anno'];
    $Valore_progetto=           $_POST['valore_progetto'];
    $previsto_impegno=          $_POST['previsto_impegno'];
    $Impegnato=                 $_POST['Impegnato'];
    $Contabilizzato=            $_POST['Contabilizzato'];
    $Oggetto=                   $_POST['Oggetto'];
    $Tipologia_Impegno=         $_POST['Tipologia_Impegno'];
    $Decreto=                   $_POST['Decreto'];
    $Registrato=                $_POST['Registrato'];
    $IDV=                       $_POST['IDV'];
    $OPS=                       $_POST['OPS'];
    $PDC=                       $_POST['PDC'];
    $Operatore=                 $_POST['Operatore'];

  
                                $sql="INSERT INTO Registro_PDS
                                (num_PDS, 
                                Data_protocollo, 
                                n_Protocollo, 
                                id_capitolo,
                                Capitolo,
                                Art,
                                Prog,
                                ID_Reparto,
                                Reparto,
                                Anno,
                                Valore_progetto,
                                previsto_impegno,
                                Impegnato, 
                                Contabilizzato, 
                                Oggetto, 
                                Tipologia_Impegno, 
                                Decreto,  
                                Registrato,  
                                IDV, 
                                OPS, 
                                PDC,  
                                Operatore) 
                                
                                VALUES 
   
                                (:num_PDS,
                                :Data_protocollo,
                                :n_Protocollo, 
                                :id_capitolo,
                                :Capitolo, 
                                :Art, 
                                :Prog, 
                                :ID_Reparto,  
                                :Reparto,
                                :Anno,
                                :valore_progetto,
                                :previsto_impegno,
                                :Impegnato,
                                :Contabilizzato,
                                :Oggetto,
                                :Tipologia_Impegno,
                                :Decreto,
                                :Registrato,
                                :IDV,
                                :OPS,
                                :PDC, 
                                :Operatore)"; 

$ins=$pdo->prepare($sql);

$ins->bindParam(':num_PDS',$n_PDS);
$ins->bindParam(':Data_protocollo',$Data_protocollo,PDO::PARAM_STR_CHAR);
$ins->bindParam(':n_Protocollo',$n_protocollo);
$ins->bindParam(':id_capitolo',$id_capitolo);
$ins->bindParam(':Capitolo',$Capitolo);
$ins->bindParam(':Art',$Art);
$ins->bindParam(':Prog',$Prog);
$ins->bindParam(':ID_Reparto',$ID_Reparto);
$ins->bindParam(':Reparto',$Reparto);
$ins->bindParam(':Anno',$Anno);
$ins->bindParam(':valore_progetto',$Valore_progetto);
$ins->bindParam(':previsto_impegno',$previsto_impegno);
$ins->bindParam(':Impegnato',$Impegnato);
$ins->bindParam(':Contabilizzato',$Contabilizzato);
$ins->bindParam(':Oggetto',$Oggetto);
$ins->bindParam(':Tipologia_Impegno',$Tipologia_Impegno);
$ins->bindParam(':Decreto',$Decreto);
$ins->bindParam(':Registrato',$Registrato);
$ins->bindParam(':IDV',$IDV);
$ins->bindParam(':OPS',$OPS);
$ins->bindParam(':PDC',$PDC);
$ins->bindParam(':Operatore',$Operatore);


$ins->execute() 
or die ("Errore di registrazione");

if($ins->rowCount()){
    echo"Salvato!";

}else{
    echo" Salvataggio non effettuato!";
  
}
?>
<script>
alert("Salvataggio eseguto con sucesso!");
</script><?php
header('Location: AcquisizionePDS.php');

?>
