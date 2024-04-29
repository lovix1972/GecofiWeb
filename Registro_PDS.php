<?php
     
     session_start();
     
  
    if($_SESSION['codente'] !=1){

      include("./header/header.html"); 
      
    }else{
    include("./header/headerAmm.html");     
    }
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
  <title>Registro</title>




<script src="./CSS/js/modal.js" defer></script>
<script src="./CSS/js/fontawesome.js" crossorigin="anonymous"></script>
<script src="./CSS/js/jquery.min.js"></script>
<link rel="stylesheet" href="./CSS/RegistroPDS.css">
</head>

<body>
<div id="detailsModal" class="modal">

  
  <div class="modal-content">

  </div>  


</div>

   
<div class="container">
<div class="filtro"  >

<form action="Registro_PDS.php" method="POST" id="form1">

Anno: <select id="anno" name ="anno" class="form-select" required>
          
          <option value="2023" selected>2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
</select>
Ricerca per: <select id="filtro" name ="Filtro" class="form-select" required>
          
            <option value="Oggetto">Oggetto</option>
            <option value="num_PDS">n_PDS</option>
</select>
Reparto: 
<select name ="ID_Reparto" class="form-select" id="ID_Reparto" required>
<option value=""></option>
            <?php
            include_once('connect.php');
            $query=$pdo->query("SELECT ID_Reparto, Reparto  FROM Reparti order by ID_Reparto ASC");
                while($row=$query->fetch()){

?>
           
           <option value = "<?php echo $row['ID_Reparto'];?>"><?php echo $row['Reparto'];?></option>
           <?php
             }  
?>    
</select>
   
         
   <td>Contenuto Ricerca: <input name="cerca" type="text" style="width: 250px;"></td>
        
            <button id="avvia" name="avvia" >Ricerca / Reset</button>

        
</form> 

 </div>  



<table class="table table-striped"  >

 
 <thead>

    <th>N° PDS</th>
    <th >Data PDS</th>
    <th >Oggetto</th>
    <th >N° Protocollo</th>
    <th >Capitolo</th>
    <th >Art</th>
    <th >Prog</th>
    <th >Fascicolo</th>
    <th >...</th>
    <th >Reparto</th>
    <th >Importo progetto</th>
    <th >Prev. Impegno</th>
    <th >Impegnato</th>
    <th >Contabilizzato</th>

 </thead>
  



    <?php
  


 if(isset($_POST['cerca']) && isset($_POST['ID_Reparto']) ){
                $anno = $_POST['anno'];
                $Filtro=$_POST['Filtro'];
                $cerca = $_POST['cerca'];
                $ID_Reparto = $_POST['ID_Reparto'];

                $query=$pdo->query("SELECT * , date_format(Data_protocollo,'%d/%m/%Y') as Data_protocollo FROM Registro_PDS WHERE $Filtro like '%".$cerca."%' and ID_Reparto=$ID_Reparto and anno= $anno");
                  while($cicle=$query->fetch()){
                

                  echo"
                  <tr class='select_tr' id=".$cicle['ID_PDS']." '>
                
                  <td>".$cicle['num_PDS']." </td>
                  <td>".$cicle['Data_protocollo']."</td>
                  <td>".$cicle['Oggetto']."</td>
                  <td>".$cicle['n_Protocollo']."</td>
                  <td>".$cicle['Capitolo']."</td>
                  <td>".$cicle['Art']."</td>
                  <td>".$cicle['Prog']."</td>
                  <td>".$cicle['Fascicolo']."</td>
                  <td>".$cicle['ID_Reparto']."</td>
                  <td>".$cicle['Reparto']."</td>
                  <td id='valoreProg'>".number_format($cicle["Valore_progetto"],2,',','.')."</td>
                  <td id='prevImpegno'>".number_format($cicle["previsto_impegno"],2,',','.')."</td>
                  <td id='impegnato'>".number_format($cicle["Impegnato"],2,',','.')."</td>
                  <td id='contabilizzato'>".number_format($cicle["Contabilizzato"],2,',','.')."</td>
                  </tr>";  
                  
                }
               



                      
// Recupero per totali tabella//
$query=$pdo->query("SELECT SUM(Valore_progetto) as Valore_progetto, SUM(previsto_impegno) as previsto_impegno, SUM(Impegnato) as Impegnato, SUM(Contabilizzato) AS Contabilizzato FROM Registro_pds WHERE $Filtro like '%".$cerca."%' and ID_Reparto='$ID_Reparto' and anno=2024");
while($cicle=$query->fetch()){ 
    echo"
<tr class='tot-evidenza'>
<td colspan=10>
<td>".number_format($cicle["Valore_progetto"],2,',','.')."</td>
<td>".number_format($cicle["previsto_impegno"],2,',','.')."</td>
<td>".number_format($cicle["Impegnato"],2,',','.')."</td>  
<td>".number_format($cicle["Contabilizzato"],2,',','.')."</td></tr>";
}          
}

?> 



</table>
</div>






</body>

</html>