<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button onclick='cancellaTabella()'>Cancella Tabella Registro_PDS</button>
    
<?php
session_start();
 include ("Connect.php"); 
if(!isset($_SESSION['utente'])){
header('location:session.php');
} 



  
if(!$pdo->query("DROP TABLE IF EXISTS capitoli") ){
    echo "Errore della query:"."$pdo->error";
}else{
    echo "Tabella Eliminata!";};
 
?>