<?php

/*include("./footer/footer.html");*/     
session_start();

if(!isset($_SESSION['utente']) && !isset($_SESSION['codente'])  )
{
header('location:session.php');


} 

include ("Connect.php");  


  

if($_SESSION['codente'] !=1){

  include("./header/header.html"); 
  $filtra_Amm="where capitoli.id_Reparto='".$_SESSION['codente']."' and";
  $filtra_Amm1="where id_Reparto='".$_SESSION['codente']."'";
  $filtra_Amm2="WHERE id_Reparto = '".$_SESSION['codente']."' and ";
}else{


include("./header/headerAmm.html");


if(isset($_GET['ID_Reparto'])){


$ID_Reparto = $_GET['ID_Reparto'];
$filtra_Amm="WHERE Capitoli.id_Reparto = '".$ID_Reparto."'  and ";

$filtra_Amm1="";
$filtra_Amm2="WHERE id_Reparto = '".$ID_Reparto."' and ";


}
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Situazione Reparti</title>
   
<link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
<link rel="stylesheet" href="./CSS/preavvisi.css"> 
<script src="./CSS/JS/fontawesome.js" crossorigin="anonymous"></script>
<script src="./css/js/jquery.min.js"></script>
</head>

   <body>



<div class='container'>
<div class="Filtra">

<form action="SituazioneCapitoli_BR.php" class ="form-select" method="GET">

  Anno: 
  <select name ="Anno" id="anno" >
  <?php
$sql="SELECT Anno from Capitoli group by Anno desc ";

$stmt=$pdo->query($sql);

  while($row=$stmt->fetch()){
    
  echo '<option value ="'.$row['Anno'].'">'.$row["Anno"].'</option>';
  }?>
</select>  



Reparto: 
<select name ="ID_Reparto" id="idreparto" >
<option selected disabled  >Scegli Reparto</option>
<?php
$sql="SELECT id_Reparto, Reparto from Reparti $filtra_Amm1";

$stmt=$pdo->query($sql);
  
  while($row=$stmt->fetch()){
 
  echo '<option value ="'.$row['id_Reparto'].'">'.$row["Reparto"].'</option>';
  }?>

  </select> 


<input type="submit" value="Cerca">
<input type="reset" value="Reset"><br><br>
            
</form>    

</div>



<table class="table" >

  
        <thead>
           
        <th>Reparto</th>
        <th>Capitolo</th>
        <th>Art</th>
     
        <th >Previsto Impegno</th>
        <th >Impegnato</th>
        <th >Contabilizzato</th>
        <th >Totale Speso</th>
    
         </thead>
            
      
      <?php


if(isset($_GET['ID_Reparto']) && isset($_GET['Anno'])   ) {

  $ID_Reparto = $_GET['ID_Reparto'];
  $Anno = $_GET['Anno'];


        $query=$pdo->query("SELECT  Reparto,capitolo, art,
     
        SUM(Capitoli.Preavvisi) AS Preavvisi, 
        SUM(previsto_impegno) AS prev_impegno,
        SUM(impegnato) AS Impegnato,
        SUM(Contabilizzato) AS contabilizzato,
        SUM(previsto_impegno + Impegnato + Contabilizzato) AS totspeso
        FROM Registro_PDS  $filtra_Amm2 anno=$Anno and Registrato=1 
       
        GROUP BY capitolo , art "); 
    
        
        while($cicle=$query->fetch() ){ 
          echo"
        
        
          <tr id='riga'>
          
          <td>".$cicle['Reparto']."</td>
          <td>".$cicle['capitolo']."</td>
          <td>".$cicle['art']."</td>
                    

          <td>".number_format($cicle["prev_impegno"],2,',','.')."</td>
          <td>".number_format($cicle["Impegnato"],2,',','.')."</td>
          <td>".number_format($cicle["contabilizzato"],2,',','.')."</td>
          <td>".number_format($cicle["totspeso"],2,',','.')."</td>
     
          </tr>";
          
      }
    // Recupero per totali tabella   <td>".number_format($cicle["totPreavvisi"]-$cicle["totalespeso"],2,',','.')."</td><td>".number_format($cicle["totPreavvisi"],2,',','.')."</td>//



    $query=$pdo->query("SELECT SUM(Valore_progetto) as Valore_progetto, SUM(previsto_impegno) as previsto_impegno, SUM(Impegnato) as Impegnato, SUM(Contabilizzato) AS Contabilizzato FROM Registro_pds $filtra_Amm2 anno=$Anno and registrato=1 ");

    while($cicle=$query->fetch())  { 

      echo"
          <tr id='totali'>
          <td colspan=4>
          
          <td style='font-size:15px; font-weight:bold;'>".number_format($cicle["previsto_impegno"],2,',','.')."</td>
          <td style='font-size:15px; font-weight:bold;'>".number_format($cicle["Impegnato"],2,',','.')."</td>  
          <td style='font-size:15px; font-weight:bold;'>".number_format($cicle["Contabilizzato"],2,',','.')."</td></tr>";
      }       
}
 
 
    ?>

    </table>
    </div>
    
    <div class="sfondo-modale">
      <div class ="modale-det">
        <button id="btn-modale">X</button>    
        <span>Dettaglio Progetti di Spesa registrati</span>  
      
        <div class="cont-modale"></div>
      </div>
    </div> 
 


  <script>
     
       
        let riga = document.querySelector('#riga');
        let sfondoModale = document.querySelector('.sfondo-modale');
        let modale = document.querySelector('.modale-det');
        let anno=document.querySelector('#anno');

        let spanrep=document.querySelector('.rep');
     

              riga=addEventListener('click',(e)=>{
      
                  if(e.target != riga  ){

                  sfondoModale.style.display='none';
                  modale.style.display = 'none'; 
                  }
                               
                 let reparto=e.target.parentElement.cells[0].textContent;
                
                  let capitolo=e.target.parentElement.cells[1].textContent;
                  let art=e.target.parentElement.cells[2].textContent;
          


         
                               
          
          $.ajax({
                url: 'filtra_capitolo_reparto.php',
                type: 'post',
                data: {capitolo: capitolo, art: art, reparto: reparto},
                success: function(response){

             
                
                $('.cont-modale').html(response);
              
          console.log(reparto)
        
                }
             
              });
                   sfondoModale.style.display='block';
                  modale.style.display='block';
            });
           
           
              let btnmod = document.getElementById('btn-modale');
                      btnmod.addEventListener('click',(e) =>{
          
                 
                      modale.style.display = 'none'; 
                  sfondoModale.style.display='none';
                     });
                     
               
                  

                      $(window).keydown(function(e){
            
                    
                     if(e.key === 'Escape' ){
                      sfondoModale.style.display='none';
                     modale.style.display = 'none'; 
                
                    }
        
                  
           
            });         
             
       </script> 
</body>
</html>