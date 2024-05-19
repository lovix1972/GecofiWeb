<?php
session_start();
/*require ("./vendor/autoload.php");*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrazione Utente</title>
    
<link rel="stylesheet" href="/CSS/Style-Rec.css">
    <link rel="shortcut icon" href="/IMG/9719OIP.ico" type="image/x-icon">
</head>
<body>

<header>
     <img src="/IMG/OIP.png" alt="Stemma Brigata">

    <span>Registrazione Utente</span>
         
  
</header>
     <div class="note">
      <p>NOTA: Inserire i dati richiesti. L'utente sarà creato ma non autorizzato all'accesso. L'amministratore della webapp successivamente convaliderà l'iscrizione"

      </p>
     </div>
   
       <div class="input-rec">
                                
            <form class="needs-validation" novalidate action="RegistraUtenti.php" method="POST">
              <div class="input-container">

                    <select  class="form-control" id="validationTooltip00" name="grado" required>
                    <option disabled selected>Qualifica</option>
                    <?php
                 
                 require_once ('Connect.php');

                 $sql="SELECT grado from gradi";
                 echo '<option></option>';
                 $stmt=$pdo->query($sql);

                 while($row=$stmt->fetch()){
              
                 echo '<option value ="'.$row['grado'].'">'.$row['grado'].' </option>';

                 }
          
                 ?>


                    </select>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="Nome" name="nome" required>
                                
                         
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="Cognome" name="cognome" required>
                                   
                    
                    <input type="email" class="form-control" id="validationTooltip03" placeholder="email" name="email" required>
                 
                                 
                    <input type="text" class="form-control" id="validationTooltipUsername"  name="utente" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                                           
                   
                    <input type="password" class="form-control" id="validationTooltipPassword" name="password" placeholder="Password" aria-describedby="validationTooltipPasswordPrepend" required>
                                               
                                  
                   
                      <select type="text" class="form-control" id="codente" name="codente" >
                     <option disabled selected >Ente di appartenenza</option>
                      <?php
                 
                     

                     
                      $sql="SELECT id_reparto, reparto from reparti";
                      echo '<option></option>';
                      $stmt=$pdo->query($sql);

                      while($row=$stmt->fetch()){
                    
                      echo '<option value ="'.$row['id_reparto'].'">'.$row['id_reparto'].' - '.$row['reparto'].' </option>';

                      }
                      ?>
                      </select>
                               
           
                             
                <div class="button">
                <button class="btn btn-primary" type="submit" >Registra</button>
                <button><a href="index.html">Login</a></button>
                  </div>              
        
         
                                  
          </form>
  
           </div> 
        </div>

</body>
</html>