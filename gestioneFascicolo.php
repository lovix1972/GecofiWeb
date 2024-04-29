
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Fascicolo</title>
    <link rel="stylesheet" href="./CSS/gestioneFascicolo.css">
    <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
    <script src="./CSS/js/jquery.min.js"  ></script>
</head>
<body>
    <?php
session_start();

if(!isset($_SESSION['utente'])){
header('location:session.php');
} 
if($_SESSION['codente'] !=1){

    include("./header/header.html"); 
  }else{
  include("./header/headerAmm.html");     
  }
 include ("Connect.php"); 
?>
<div class="container-fascicolo">
    <header>
        <span>GESTIONE FASCICOLO</span>
    </header>
<div class="det-fascicolo">

<input type="number" name="n_fascicolo" placeholder="n° Fascicolo" id="n_fascicolo">
<input type="date" name="data" placeholder="data" id="data">
<input type="text" name="oggetto" placeholder="Oggetto" id="oggetto">
<input type="text" name="note" placeholder="Note" id="note">

<div class="btn-ctr">
    <button id="registra">Registra Fascicolo</button>
    <button id="ricerca-cig">Ricerca CIG</button>
  
</div>

</div>
<div class="btn">
<button>Registro Fascicoli</button>
<button>Coperta Fascicolo</button>
<button>Anagrafica Ditte</button>
<button>Albo Fornitori</button>

</div>
</div>

<div class="det-pds">
    <table>
        <thead>
            <th>n° PDS</th>
            <th>dataPDS</th>
            <th>Reparto</th>
            <th>Capitolo</th>
            <th>Art</th>
            <th>Prog</th>
            <th>Oggetto</th>
            <th>Decreto</th>
            <th>Importo</th>
            <th></th>
        </thead>
<tbody>
<?php
 $sql="SELECT num_PDS, date_format(Data_protocollo,'%d/%m/%y') as Data_protocollo,Reparto, capitolo, art, prog, Oggetto, Decreto, Valore_progetto from Registro_PDS ";
 $stmt=$pdo->query($sql);
 while($cicle=$stmt->fetch()){
   echo"
 <tr>
    <td>".$cicle['num_PDS']." </td>
    <td>".$cicle['Data_protocollo']." </td>
    <td style='text-align:left;'>".$cicle['Reparto']."</td>
 
    <td>".$cicle['capitolo']."</td>
    <td>".$cicle['art']."</td>
    <td>".$cicle['prog']."</td>
    <td style='text-align:left;'>".$cicle['Oggetto']."</td>
    <td style='text-align:left;'>".$cicle['Decreto']."</td>
    
    <td style='text-align:right; font-weight:bold'>".number_format($cicle["Valore_progetto"],2,',','.')."</td>
    <td id='del' style='cursor:pointer'>X</td>
    </tr>";
 }?>
</tbody>
    </table>
</div>


<div class="info-percorso">
<input type="text" id="percorso">
<button>Scegli Percorso</button>

</div>


<div class="filtro-fascicolo">

<input type="text" placeholder="n° fascicolo" id="num_fascicolo" name="num_fascicolo">
<input type="text" placeholder="Oggetto" id="obj" name="obj">


</div>

   <div class="ricerca-fascicolo">
   <table id="filtraFascicolo">
        <thead>
            <th>n° PDS</th>
            <th>dataPDS</th>
            <th>Oggetto</th>
        
            <th></th>
        </thead>
<tbody>
<?php
 $sql="SELECT n_fascicolo, date_format(Data_Fascicolo,'%d/%m/%y') as Data_Fascicolo, Oggetto from Fascicolo ";
 $stmt=$pdo->query($sql);
 while($cicle=$stmt->fetch()){
   echo"
 <tr>
    <td>".$cicle['n_fascicolo']." </td>
    <td>".$cicle['Data_Fascicolo']." </td>
  
    <td style='text-align:left;'>".$cicle['Oggetto']."</td>
   

    </tr>";
 }?>


</tbody>
    </table>


</div>

<script>

    $('#num_fascicolo').keyup(function(e){


      let n_fascicolo=$('#num_fascicolo').val();

       $.ajax({
        type:'POST',
        url:'ricerca-fascicolo.php',
        data:{n_fascicolo:n_fascicolo},
        success:function(result)
    {
      $('#filtraFascicolo').html(result);
    
    }
    
  });



});



</script>
</body>
</html>