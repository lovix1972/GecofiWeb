<?php

include "Connect.php";


    $ID_PDS=$_POST['id_pds'];

    $imp=$_POST['imp'];

      
 

$sql="UPDATE num_PDS, Data_Protocollo, id_capitolo, ID_reparto, Valore_progetto, previsto_impegno, Impegnato, Contabilizzato, Oggetto set ID_PDS=$ID_PDS";
   


$ins=$pdo->prepare($sql);

$ins->execute();

if($ins->rowCount()){
    echo"Salvato!";

}else{
    echo" Salvataggio non effettuato!";
}



?>
