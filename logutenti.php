


<?php
session_start();
include ("Connect.php"); 
if(!isset($_SESSION['utente'])){
header('location:session.php');
} 

if($_SESSION['codente'] !=1){

   echo ("<p>Non Autorizzato alla visualizzazione della risorsa!</p>");
}else{
include("./header/headerAmm.html"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Amministrazione utenti</title>
   <link rel="stylesheet" href="./CSS/utenti.css">
   <script src="./CSS/js/jquery.min.js"></script>

   <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
</head>
<body>
<div class="container">
   <div class="contenuto">
   <div class="intestazione"></div>
<h2>Amministrazione Utenti</h2>


<table class="table">
<thead>
   <tr>
<th>ID</th>

<th>Utente</th>


<th>Cod Ente</th>


   </tr>
</thead>

   <?php

   $query=$pdo->query("SELECT *  FROM logUtenti");

   while($cicle=$query->fetch()){
   
echo"
   <tr class='select-tr' id=".$cicle['ID'].">
     <td>".$cicle['ID']." </td>
     
     <td>".$cicle['utente']."</td>

     <td>".$cicle['codente']."</td>
   
     
     <td><button class='tr-utente' id=".$cicle['ID'].">Elimina</button></td>
     <td><button class='tr-attivo' id=".$cicle['ID'].">Attiva</button></td>
   
     <td><button class='tr-disattivo' id=".$cicle['ID'].">Disattiva</button></td>
     </tr>";
   }

     ?>
 </table> 
 </div>
 </div>

 


</body>
</html>