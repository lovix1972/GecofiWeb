<?php 

session_start();



if(!isset($_SESSION['utente']) && !isset($_SESSION['codente'])  )
{
header('location:session.php');


} 

unset($_SESSION['utente']);
unset($_SESSION['codente']);

session_destroy();
session_unset();

//header("Location: index.php");//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/Style_login.css">
</head>
<body>
    <div id="msg-logout">
<p>
    Disconnessione eseguita con successo!
</p>

    </div>
</body>
</html>