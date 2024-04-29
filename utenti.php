


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
<th>Qualifica</th>
<th>Cognome</th>
<th>Nome</th>
<th>email</th>
<th>Utente</th>
<th>Password</th>

<th>Cod Ente</th>
<th>Attivo</th>

   </tr>
</thead>

   <?php

   $query=$pdo->query("SELECT *  FROM utenti");

   while($cicle=$query->fetch()){
   
echo"
   <tr class='select-tr' id=".$cicle['ID'].">
     <td>".$cicle['ID']." </td>
     <td>".$cicle['Grado']."</td>
     <td>".$cicle['Cognome']."</td>
     <td>".$cicle['Nome']."</td>
     <td>".$cicle['email']."</td>
     <td>".$cicle['utente']."</td>
     <td>".$cicle['password']."</td>
     <td>".$cicle['codente']."</td>
     <td>".$cicle['attivo']."</td>
     
     <td><button class='tr-utente' id=".$cicle['ID'].">Elimina</button></td>
     <td><button class='tr-attivo' id=".$cicle['ID'].">Attiva</button></td>
   
     <td><button class='tr-disattivo' id=".$cicle['ID'].">Disattiva</button></td>
     </tr>";
   }

     ?>
 </table> 
 </div>
 </div>
 <!-- Cancella Utente con AJAX-->
 
 <script>
  


 


 $(document).ready(function(){

$('.tr-utente').click(function(e){

  let id = document.querySelector('.tr-utente'); 
  //let ID_PDS = modalWindow.querySelectorAll('.select_tr');
  let recordId = e.target.id;


    $.ajax({
    type:'get', 
    url:'EliminaUtente.php',
    data:{ID: recordId},
    success:function(result)
    {       
location.reload();
 
    }
   });
   });

   $('.tr-attivo').click(function(e){

let id = document.querySelector('.tr-attivo'); 
//let ID_PDS = modalWindow.querySelectorAll('.select_tr');
let recordId = e.target.id;


  $.ajax({
  type:'get', 
  url:'attivaUtente.php',
  data:{idutente: recordId},
  success:function(result)
  {      
location.reload();

  }
 });
 });

 $('.tr-disattivo').click(function(e){

let id = document.querySelector('.tr-disattivo'); 
//let ID_PDS = modalWindow.querySelectorAll('.select_tr');
let recordId = e.target.id;


  $.ajax({
  type:'get', 
  url:'disattivaUtente.php',
  data:{idutente: recordId},
  success:function(result)
  {       
location.reload();

  }
 });
 });

}); 
   </script>  

</body>
</html>