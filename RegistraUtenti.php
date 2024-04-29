
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

<div class="msg-registrazione">


<?php

require_once('Connect.php');

if (!isset($_POST['codente']) || empty($_POST['codente']) || empty($_POST['utente'])){


$msg ="Inserire i dati richiesti!";

printf($msg, '<a href="./index.php" >Torna al Login</a>');
    printf('<a href="./Registrazione.php" target="_top">Registrati</a>');

}else{

$ente = trim(stripslashes($_POST['codente']) );
        
$qualifica=$_POST['grado'];
$ente=$_POST['codente'];
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$utente=$_POST['utente'];
$email=$_POST['email'];
$password=$_POST['password'];

$hashpasswd=password_hash($password, PASSWORD_DEFAULT);


$verifica="SELECT utente from utenti where utente ='".trim($utente)."' and codente='".$ente."'";
$check= $pdo->query($verifica);
$num_row= $check->rowCount();

if($num_row !=0){

    echo "Utente già presente !";
            }else{

                        $sql="INSERT INTO utenti 

                        (grado, codente, nome, cognome, utente, email, password) 

                        VALUES 

                        (:grado, :codente,  :nome, :cognome, :utente, :email, :hashpasswd)";

                        
                                    $ins=$pdo->prepare($sql);

                                    $ins->bindParam(':grado',$qualifica);
                                    $ins->bindParam(':codente',$ente);
                                    $ins->bindParam(':nome',$nome);
                                    $ins->bindParam(':cognome',$cognome);
                                    $ins->bindParam(':utente',$utente);
                                    $ins->bindParam(':email',$email);
                                    $ins->bindParam(':hashpasswd',$hashpasswd);

                        $ins->execute()

                        or die ("Errore di registrazione");


                        echo     "Registrazione effettuata con successo";  

                        $message = '
                            <html>
                                <head>
                                    <title>Brigata Aeromobile "Friuli"</title>
                                </head>
                                <body>
                                <h2>Dati di registrazione
                                    <h2>Nome:       '.$nome.' <br>
                                        Cognome:    '.$cognome.'<br>
                                        Ente:       '.$ente.'<br>
                                        Utente:     '.$utente.'<br></h2>
                                    <p>La registrazione è stata effettuata con successo.</p>
                                </body>
                            </html>
                        ';
                        $headers[] = 'Bcc: suadsezciaf@bfriuli.esercito.difesa.it';
                        $headers[] = 'MIME-Version: 1.0';
                        $headers[] = 'Content-type: text/html; charset=utf-8';
                       // mail($email, 'Conferma di Registrazione sulla piattaforma di gestione Contabile della Direzione di Intendenza', $message, implode("\r\n", $headers));

                        header("Location:index.php");
                        }

            }
?>









    </div>
    </body>
</html>