<?php
session_start();

if(!isset($_SESSION['utente']) && !isset($_SESSION['codente'])){

  header('location:session.php');
}

if($_SESSION['codente'] !=1){

  include("./header/header.html"); 
}else{
include("./header/headerAmm.html");     
}


  

?>


<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestione contabile finanziaria</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="./css/StyleHeader.css">
  <link rel="shortcut icon" href="9719OIP.ico" type="image/x-icon">
  
  <link rel="stylesheet" href="./css/style.css">
  <script src="./CSS/js/jquery.min.js"></script>
</head>
 

<body>
  <span></span>
<script >  
    $(function () {
        let name= 'Utente:  ' + ' <?= $_SESSION['utente'] ?>';
      
        $('span').text(name) ; 
  
    });
</script> 

</body>
</html>






