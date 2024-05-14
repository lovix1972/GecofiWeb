<?php

/*include("./footer/footer.html");*/     
session_start();

if(!isset($_SESSION['utente']) && !isset($_SESSION['codente'])  )
{
header('location:session.php');


} 


  include "Connect.php"; 

if($_SESSION['codente'] !=1){

  include("./header/header.html"); 
  $filtra_Amm="where capitoli.id_reparto='".$_SESSION['codente']."' and";
  $filtra_Amm1="where id_Reparto='".$_SESSION['codente']."'";
  $filtra_Amm2="WHERE id_Reparto = '".$_SESSION['codente']."' and ";
}else{


include("./header/headerAmm.html");

 

if(isset($_GET['id_Reparto'])){


$ID_Reparto = $_GET['id_Reparto'];
$filtra_Amm="WHERE capitoli.id_Reparto = '".$ID_Reparto."' ";

$filtra_Amm1="";
$filtra_Amm2="WHERE id_Reparto = '".$ID_Reparto."' ";


}
}

?>  
<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Situazione Reparti</title>
   
<link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
<link rel="stylesheet" href="./CSS/preavvisi.css"> 

<script src="./CSS/js/jquery.min.js"  ></script>
<script src="./CSS/js/hamburger.js" defer   ></script>
</head>

   <body>



<div class='container'>
<div class="Filtra">

<form action="" class ="form-select" method="GET">

  Anno: 
  <select name ="Anno" id="anno" >
  <?php
    $sql="SELECT Anno from capitoli group by Anno ";

    $stmt=$pdo->query($sql);

    while($row=$stmt->fetch()){
    
    echo '<option value ="'.$row['Anno'].'">'.$row["Anno"].'</option>';
  }?>
</select>  



Reparto: 
<select  name ="id_Reparto" id="id_reparto" >
<option selected disabled  >Scegli Reparto</option>
<option value ="<?=$row['Reparto']?>"></option>
<?php
$sql="SELECT id_Reparto, Reparto from reparti $filtra_Amm1";

$stmt=$pdo->query($sql);
  
  while($row=$stmt->fetch()){
 
  echo '<option value ="'.$row['id_Reparto'].'">'.$row["Reparto"].'</option>';
  }
  ?>

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
        
    
         </thead>
            
      
      <?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['id_reparto']) and isset($_GET['Anno'])){

$Anno=$_GET['Anno'];

 } 


        $query=$pdo->query("SELECT Anno, Reparto, Capitolo, Art, sum(previsto_impegno) AS previsto_impegno, sum(Impegnato) AS Impegnato, SUM(Contabilizzato) AS Contabilizzato FROM registro_pds $filtra_Amm2 group by capitolo, art "); 

    

        while($cicle=$query->fetch() ){ 
       
          echo"
        
        
          <tr id='riga'>
          
          <td>".$cicle['Reparto']."</td>
          <td>".$cicle['Capitolo']."</td>
          <td>".$cicle['Art']."</td>
                    

          <td>".$cicle["previsto_impegno"]."</td>
          <td>".$cicle["Impegnato"]."</td>  
          <td>".$cicle["Contabilizzato"]."</tde=>
          
     
          </tr>";
           }  
      
    // Recupero per totali tabella   <td>".number_format($cicle["totPreavvisi"]-$cicle["totalespeso"],2,',','.')."</td><td>".number_format($cicle["totPreavvisi"],2,',','.')."</td>//



    $query=$pdo->query("SELECT SUM(Valore_progetto) as Valore_progetto, SUM(previsto_impegno) as previsto_impegno, SUM(Impegnato) as Impegnato, SUM(Contabilizzato) AS Contabilizzato FROM registro_pds  $filtra_Amm2");

    while($cicle=$query->fetch())  { 

      echo"
          <tr id='totali'>
          <td colspan=3>
          
          <td style='font-size:15px; font-weight:bold;'>".number_format($cicle["previsto_impegno"],2,',','.')."</td>
          <td style='font-size:15px; font-weight:bold;'>".number_format($cicle["Impegnato"],2,',','.')."</td>  
          <td style='font-size:15px; font-weight:bold;'>".number_format($cicle["Contabilizzato"],2,',','.')."</td></tr>";
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
      console.log(e);
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