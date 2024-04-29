<!DOCTYPE html>
<html lang="IT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Progetto di spesa</title>
    <link rel="shortcut icon" href="9719OIP.ico" type="image/x-icon">
    <script src="./CSS/js/fontawesome.js" crossorigin="anonymous"></script>
    <script src="./CSS/js/jquery.min.js"></script>
<script src="./CSS/JS/modal.js" defer></script>
</head>

<link rel="stylesheet" type="Text/css" href="./CSS/Style.css"> 

<body>

<p id="intestazione-modale">Modifica PDS</p>

<?php

session_start();
   
 
if(!isset($_SESSION['utente']) ){

  header('location:session.php');
  } 
 
  if($_SESSION['codente'] !=1){

   

    $filtra_Amm="WHERE ID_Reparto ='".$_SESSION['codente']."'";
   
  
  }else{




  $filtra_Amm="";
 
    }


include_once("connect.php");


  if(isset($_POST['ID_PDS']) ){
   
    $ID_PDS = $_POST['ID_PDS'];
                   
               $query=$pdo->query("SELECT *, date_format(Data_protocollo,'%d/%m/%Y') as Data_protocollo FROM Registro_PDS where ID_PDS='$ID_PDS'");
               /*$query->fetchall();*/
              

               $cicle=$query->fetch();

                $ID_PDS=$cicle['ID_PDS'];
                $n_PDS=$cicle['num_PDS'];
                $Data_protocollo=$cicle['Data_protocollo'];
                $Oggetto = $cicle['Oggetto'];
                $ID_Reparto=$cicle['ID_Reparto'];
                $Reparto=$cicle['Reparto'];
                $ID_Capitolo=$cicle['id_capitolo'];
                $Capitolo=$cicle['Capitolo'];
                $Art=$cicle['Art'];
                $Prog=$cicle['Prog'];
                $Decreto=$cicle['Decreto'];
                $idv=$cicle['IDV'];
                $Valore_Progetto=$cicle['Valore_progetto'];
                $previsto_impegno=$cicle['previsto_impegno'];
                $Impegnato=$cicle['Impegnato'];
                $Contabilizzato=$cicle['Contabilizzato'];
                
     
            
              }     
        
?>

<div class="form1" name="form1">

<label for="ID PDS">ID PDS </label>
<input type="number" class="ID_PDS" name="ID_PDS" id="ID_PDS" style="width: 5em;" value="<?php echo $ID_PDS;?>" disabled>
<label for="N° PDS">N° PDS </label>

<input type="text" class="n_pds" name="n_PDS" id="num_PDS" style="width: 5em;" value='<?php echo $n_PDS;?>' >
<label for="data_protocollo">Data Protocollo </label>

<input type="text" id="Data_protocollo" name="Data_protocollo"  value="<?php echo $Data_protocollo;?>" ><br>
<label for="oggetto">Oggetto</label><br>
<input type="text" id="oggetto" name="Oggetto" value="<?php echo $Oggetto;?>" style ="width:30rem;"><br>

<label for="ID_Reparto">Reparto</label>
                  <select type="text" name="Reparto" id="Reparto" onchange="popolaid()"  style="width:16rem;" >
                 <option><?php echo $Reparto;?></option>
                    <?php
                 
                     $sql="SELECT ID_Reparto, Reparto from Reparti $filtra_Amm";
                  
                    
                     $stmt=$pdo->query($sql);
                     while($row=$stmt->fetch()){
                     echo '<option value ="'.$row['Reparto'].'"> '.$row["Reparto"].'</option>';
                     }?>
 
 
                 <label for="id_Reparto">Reparto</label>
                 <input type="text" name="id_Reparto" id="id_Reparto" style ="width: 1rem;" value='<?php echo $ID_Reparto;?>' >
 
                 <script>
                   function popolaid(){
                          let valore=document.getElementById('Reparto').value;
                        
                         document.querySelector('#id_Reparto').value = valore;
                        
                              
                   };
                 </script>


<div class="choosecap" name="choosecap">
<label for="ID_Capitolo">Codice Capitolo</label><br>
<input type="number" class="ID_Capitolo" name="ID_Capitolo" id="ID_Capitolo" value="<?php echo $ID_Capitolo;?>" style='width: 10%; text-align:center'>
  <label for="Capitolo">Capitolo</label>
<select type="number" class="Capitolo" name="Capitolo" id="Capitolo" style='width: 10%;' >
<option value="<?php echo $Capitolo;?>"><?php echo $Capitolo;?></option>
<?php
              
              $query=$pdo->query("SELECT capitolo  FROM capitoli group by capitolo ASC");
                  while($row=$query->fetch()){
  ?>
             <option value = "<?php echo $row['capitolo'];?>"><?php echo $row['capitolo'];?></option>
             <?php
               }  
  ?> 

</select>
<label for="Art">Articolo</label>
<select type="number" class="art" name="art" id="art" ><br>
<option value="<?php echo $Art;?>"><?php echo $Art;?></option>
<?php
              
              $query=$pdo->query("SELECT art  FROM capitoli group by art ASC");
                  while($row=$query->fetch()){
  ?>
             <option value = "<?php echo $row['art'];?>"><?php echo $row['art'];?></option>
             <?php
               }  
  ?> 

</select>
<label for="Art">Prt</label>
<select type="number" class="prog" name="art" id="prog" ><br>
<option value="<?php echo $Prog;?>"><?php echo $Prog;?></option>
<?php
              
              $query=$pdo->query("SELECT prog  FROM capitoli group by prog ASC");
                  while($row=$query->fetch()){
  ?>
             <option value = "<?php echo $row['prog'];?>"><?php echo $row['prog'];?></option>
             <?php
               }  
  ?> 



</select>
<label for="IDV">IDV </label>
<input type="number" id="IDV" name="IDV"  value='<?php echo $idv;?>'><br>

<label for="Decreto">Decreto</label><br>
 <select type="text" class="Decreto" name="Decreto" id="Decreto"  style ="width:390px">
 <option value="<?php echo $Decreto;?>"><?php echo $Decreto;?></option>

 <?php
              
              $query=$pdo->query("SELECT Decreto  FROM capitoli group by Decreto ASC");
                  while($row=$query->fetch()){
  ?>
             <option value = "<?php echo $row['Decreto'];?>"><?php echo $row['Decreto'];?></option>
             <?php
               }  
  ?> 
 
   </select><br>
</div>


<label for="Valore_progetto">Valore progetto</label><br>
<input type="number" id = "valoreprogetto" name="Valore_progetto" style="text-align: right" value="<?php echo $Valore_Progetto;?>"><br>
<label for="Previsto_impegno">Previsto Impegno</label><br>
<input type="number" id="PI" name="Previsto_impegno" style="text-align: right" value="<?php echo $previsto_impegno;?>"><br>
<label for="Impegnato">Impegnato</label><br>
<input type="number" id="IMP" name="Impegnato" style="text-align: right" value="<?php echo $Impegnato?>"><br>
<label for="Contabilizzato" >Contabilizzato </label><br>
<input type="number" id="CONT" name="Contabilizzato" style="text-align: right" value="<?php echo $Contabilizzato;?>"><br>
 

<div class ="modifica" style="position:relative; top:10px;"> 
  

<button type="submit" class="btn" id="update"><i class="fa-regular fa-pen-to-square"></i>Modifica</button>
<button type="reset" class="btn" id="annulla"><i class="fa-solid fa-xmark"></i>Annulla</button>
<button type="elimina" class="btn" id="elimina"><i class="fa-solid fa-xmark"></i>Elimina</button>
      
      <script>
        let update=document.querySelector('#update');
        let annulla=document.querySelector('#annulla');
        let msgUpdate=document.querySelector('#barra-err');
        let modalWindow = document.querySelector('.modal'); 
              update.addEventListener('click', (e)=>{
              msgUpdate.style.display='block';

        });


        annulla.addEventListener('click', (e)=>{
        modalWindow.style.display='none';
        location.reload();

        });


        </script>

  </div>
<div id="barra-err">
    <p>Modifica Salvata correttamente!</p>
</div> 

</div>

<script>
                let va_Prog=document.querySelector('#valoreprogetto');
                let prev_Impegno=document.querySelector('#PI');
                let Imp=document.querySelector('#IMP');
                let contab=document.querySelector('#CONT');
                va_Prog.addEventListener('change', (e)=>{

                prev_Impegno.value=va_Prog.value;
                prev_Impegno.style.color='green';
                Imp.value=0;
                contab.value=0;
                
                });

                Imp.addEventListener('change', (e)=>{
                prev_Impegno.value=0;

                });

                contab.addEventListener('change', (e)=>{
                Imp.value=0;


                });


             




$('#update').click(function(e){
       
    
  let id_pds = document.querySelector('#ID_PDS').value; 
  let data_protocollo = document.querySelector('#Data_protocollo').value; 
  let oggetto = document.querySelector('#oggetto').value; 
  let reparto = document.querySelector('#Reparto').value; 
  let id_reparto = document.querySelector('#id_Reparto').value;
  let id_capitolo = document.querySelector('#ID_Capitolo').value;  
  let capitolo = document.querySelector('#Capitolo').value; 
  let art = document.querySelector('#art').value; 
  let idv = document.querySelector('#IDV').value; 
  let decreto = document.querySelector('#Decreto').value; 
  let valore_progetto = document.querySelector('#valoreprogetto').value; 
  let previsto_impegno = document.querySelector('#PI').value; 
  let impegnato = document.querySelector('#IMP').value; 
  let contabilizzato = document.querySelector('#CONT').value; 

    $.ajax({
    type:'post', 
    url:'ModificadaModale.php',
    data:{id_pds: id_pds,
      data_protocollo:data_protocollo,
      oggetto:oggetto,
      reparto:reparto,
      id_reparto:id_reparto,
      id_capitolo:id_capitolo,
      capitolo:capitolo,
      art:art,
      idv:idv,
      decreto:decreto,
      valore_progetto:valore_progetto,
      previsto_impegno:previsto_impegno,
      impegnato:impegnato,
      contabilizzato:contabilizzato
     },
       success: function(data,result){
     console.log( data_protocollo,reparto, decreto, valore_progetto, previsto_impegno, impegnato, contabilizzato)

     }
   
});  
});  

//Elimna PDS

  let elimina=document.querySelector('#elimina');
  let id_pds = document.querySelector('#ID_PDS').value; 
  elimina.addEventListener('click', (e) =>{
  console.log(id_pds)
    $.ajax({
    type:'get', 
    url:'EliminaPDS.php',
    data:{ID_PDS: id_pds},
       success: function(data,result){
        location.reload();

     }

  });

  });




</script>     
               

</body>
</html>