<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrazione Utente</title>
    
<link rel="stylesheet" href="./CSS/Style-Rec.css">
    <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
</head>
<body>

<header>
     <img src="./IMG/OIP.png" alt="Stemma Brigata">

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
                      <option value="Soldato">Soldato</option>
                      <option value="Caporale">Caporale</option>
                      <option value="Caporale maggiore">Caporale maggiore</option>
                      <option value="Graduato">Graduato</option>
                      <option value="Graduato Scelto">Graduato Scelto</option>
                      <option value="Graduato Capo">Graduato Capo</option>
                      <option value="Graduato Aiutante">Graduato Aiutante</option>
                      <option value="Sergente">Sergente</option>
                      <option value="Sergente Maggiore">Sergente Maggiore</option>
                      <option value="Sergente Maggiore Capo">Sergente Maggiore Capo</option>
                      <option value="Sergente Maggiore Aiutante">Sergente Maggiore Aiutante</option>
                      <option value="Maresciallo">Maresciallo</option>
                      <option value="Maresciallo Ordinario">Maresciallo Ordinario</option>
                      <option value="Maresciallo Capo">Maresciallo Capo</option>
                      <option value="Primo Maresciallo">Primo Maresciallo</option>
                      <option value="Luogotenente">Luogotenente</option>
                      <option value="Primo Luogotenente">1° Luogotenente</option>
                      <option value="Sottotenente">Sottotenente</option>
                      <option value="Tenente">Tenente</option>
                      <option value="Capitano">Capitano</option>
                      <option value="Maggiore">Maggiore</option>
                      <option value="Tenenete Colonnello">Tenenete Colonnello</option>
                      <option value="Colonnello">Colonnello</option>
                      <option value="Genereale di Brigata">Genereale di Brigata</option>


                    </select>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="Nome" name="nome" required>
                                
                         
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="Cognome" name="cognome" required>
                                   
                    
                    <input type="email" class="form-control" id="validationTooltip03" placeholder="email" name="email" required>
                 
                                 
                    <input type="text" class="form-control" id="validationTooltipUsername"  name="utente" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                                           
                   
                    <input type="password" class="form-control" id="validationTooltipPassword" name="password" placeholder="Password" aria-describedby="validationTooltipPasswordPrepend" required>
                                               
                                  
                   
                      <select type="text" class="form-control" id="codente" name="codente" >
                     <option disabled selected >Ente di appartenenza</option>
                      <?php
                 
                      include('Connect.php');

                      //$id=$_POST['id'];
                      $sql="SELECT  ID_Reparto, Reparto from Reparti";
                      echo '<option></option>';
                      $stmt=$pdo->query($sql);

                      while($row=$stmt->fetch()){
                      
                      echo '<option value ="'.$row['ID_Reparto'].'">'.$row['ID_Reparto'].' - '.$row['Reparto'].' </option>';

                      }
                      ?>
                      </select>
                                 
           
              
               
                <div class="button">
                <button class="btn btn-primary" type="submit" >Registra</button>
                <button><a href="./index.php">Login</a></button>
                  </div>              
        
         
                                  
          </form>
  
           </div> 
        </div>

</body>
</html>