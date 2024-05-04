<?php

require ("./vendor/autoload.php");

use Pasquale\Gecofi_Office\DBConfig;
use Pasquale\Gecofi_Office\MyPDO;

$DBConfig=new DBConfig(
"localhost",
"gecofi",
"3306",
"lovix",
"Misery12"

);

$pdo=new MyPDO($DBConfig);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE html>
<html lang="IT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  
<link rel="stylesheet" href="./CSS/Style_login.css">

<link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
<script src="./CSS/js/fontawesome.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="container">

    <div class = "login-box">
        <img SRC="./img/OIP.png" alt="10">
    <H3>BRIGATA AEROMOBILE 'FRIULI'</H3>
    <H3>Direzione di Intendenza</H3>
    <H3>Gestione Bilancio</H3>
  
   

    <form action="Login.php" method="POST" name="form" >

    <div class="input-box">
    <input type="text"  name="utente" id="utente">
    <i class="fa-solid fa-user"></i>  <label>Utente</label>  
     
    </div>

    <div class="input-box">
        <input type="password"  name ="password" id="password" >
        <i class="fa-solid fa-key"></i>  <label>Password</label>
    </div>
   
    <div class="input-box"><i class="fa-solid fa-house"></i>
       
      <select type="text"  name ="codente" id="codente" >
            <option disabled selected>Centro Funzionale</option>
            <?php
           // include_once('connect.php');
            $query=$pdo->query("SELECT ID_Reparto, Reparto  FROM Reparti order by ID_Reparto ASC");
                while($row=$query->fetch()){

?>
           
           <option value = "<?php echo $row['ID_Reparto'];?>"><?php echo $row['Reparto'];?></option>
           <?php
             }  
?>  
    </select>  
  

  </div>   

  <button type="submit" class="btn" name="login" >Entra</button>

</form>

<div class="input-box">
<button class ="btn" onclick="window.location.href='./Registrazione.php'" style="width: 80%; position: relative; top:-2rem;" >Registrati</button>
</div>  
</div>





</body>
</html>