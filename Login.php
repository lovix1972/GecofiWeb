
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="./css/Style_login.css">
   <link rel="shortcut icon" href="9719OIP.ico" type="image/x-icon">
   <script src="./CSS/js/jquery.min.js"></script>
</head>
<body>
<div class="box-msg-login">
<?php 

session_start();


  require ('./vendor/autoload.php');  
  
 if (empty($_POST['utente']) || empty($_POST['password']) ||  empty($_POST['codente'])  ){
  echo "Inserire le credenziali complete", '<a href="./index.php" target="_top" class="msg-login"> Login</a>';

 }
  

                  if(isset($_POST['utente']) && isset($_POST['password']) && isset($_POST['codente'])){

                  $_SESSION['codente']=$_POST['codente'];
                        $_SESSION['utente']=$_POST['utente'];

                        $utente = $_POST['utente'] ?? '';
                        $password = $_POST['password'] ?? '';
                        $codente = $_POST['codente'] ?? ''; 
                                                            
                        $query = "
                        SELECT utente, password
                        FROM utenti
                        WHERE utente = :utente AND codente= :codente AND attivo = 1";
                    
                        $check = $pdo->prepare($query);

                        $check->bindParam(':utente', $utente, PDO::PARAM_STR);
                        $check->bindParam(':codente', $codente, PDO::PARAM_STR);
                      
                        $check->execute();
                        
                        $user = $check->fetch(PDO::FETCH_ASSOC);
                                                                   
                        if (!$user || password_verify($password, $user['password']) === false) {

                              echo "Credenziali non valide!", '<a href="./index.php" target="_top" class="msg-login"> Login</a>';     

                              unset($_SESSION['utente']);
                              unset($_SESSION['codente']);
                              
                              session_destroy();
                              session_unset();
                        } else {
                                                    
 
                       header('Location: Home.php'); 
                  
                       ?>
                       <script>
<?php
      echo "let codente='$codente';";
      echo "let utente='$utente';" ;
     ?>                      
                       $.ajax({
                        type:'post', 
                        url:'logUtente.php',
                        data:{
                          reparto:codente,
                          utente:utente,
     
                         },
                           success: function(result){
                         console.log(result)
                    
                         }
                       
                    });
                      </script>
                      <?php  

                        } 
                        
                    



                  }
      
                              
   
 
 ?>   

</div>
 </body>
 </html>