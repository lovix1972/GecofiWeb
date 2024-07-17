<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inserimento PDS</title>
  <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
        <link rel="stylesheet" href="./CSS/form_inserimento.css">
        <script src="./CSS/js/dettaglioPDS.js" defer ></script>
        <script src="./css/js/jquery.min.js"></script>

        </head>
            <body>
            <?php
            session_start();
            include ("Connect.php"); 
            if(!isset($_SESSION['utente']) ){
            header('location:session.php');
            } 
           
            if($_SESSION['codente'] !=1){

              include("./header/header.html"); 
              $filtra_Amm="WHERE ID_Reparto ='".$_SESSION['codente']."'";
             
            
            }else{


            include("./header/headerAmm.html"); 
         
            $filtra_Amm="";
           
              }
            
         
            
            ?>
                  <div class="modaleSalvaSfondo">
                    <button class="btn-modaleSalvataggio">X</button>

                    <div class="modaleSalvaCont">
                      <p>Salvataggio effettuato!</p>
                  </div>
                   </div>
                   
                   


            <div class="container">
            
                <div class="box" id="box1">
                  
                <form class ="datipds" id="datipds" action="RegistraPDS.php" method="POST" >
                <h1>Acquisizione Progetto di Spesa</h1>
                <div id="principali">

                <label for="Anno">Anno</label>
                <input type="number" name="Anno" id="anno" value='2024'>
                <label for="num_PDS">n. PDS</label>
                <input type="text" name="num_PDS" id="num_pds" style="width: 10rem;">
                <label for="Data_protocollo">Data Protocollo</label>
                <input type="date" name="Data_protocollo" id="data_prot" value=""  style="width: 10rem;" >

                <label for="n_protocollo">n.Protocollo</label>
                <input type="text" name="n_Protocollo" id="n_pro" >

                           
              
                  <label for="ID_Reparto">Codice Reparto</label>
                  <select type="text" name="id_Reparto" id="id_Reparto" onchange="popolaid()" style ="width: 16rem;" >
                  <option value="" placeholder="Scegli il Reparto"></option>
                    <?php
                    $sql="SELECT ID_Reparto, Reparto from Reparti $filtra_Amm";
                    $stmt=$pdo->query($sql);
                    while($row=$stmt->fetch()){
                    echo '<option value ="'.$row['ID_Reparto'].'">'.$row["ID_Reparto"].' - '.$row["Reparto"].'</option>';
                    }?>


                <label for="Reparto">Reparto</label>
                <input type="text" name="Reparto" id="Reparto" style ="width: 1rem;" >

                <script>
                  function popolaid(){
                          let valore_selezionato = document.querySelector('#id_Reparto').value;
                          document.querySelector('#Reparto').value = valore_selezionato;
                          console.log(valore_selezionato)
                  };
                </script>


              <label for="capitolo">Codice Capitolo</label>
              <select type="number" name="ID_Capitolo" id="ID_Capitolo"  ></select>


              <script>

                $(document).ready(function(){
                  $('#id_Reparto').click(function(){
                    var Stdid=$('#Reparto').val();
                  
                    $.ajax({
                      type:'POST',
                      url:'FiltraIdReparto.php',
                      data:{id:Stdid},
                      success:function(data)
                  {
                    $('#ID_Capitolo').html(data);
                  
                  
                  }
                });
                });
              });

              </script>

              <label for="capitolo">Capitolo</label>
              <select type="number" name="Capitolo" id="Capitolo"  >
              </select>

              <label for="art">Art</label>
              <select type="number" name="Art" id="Art"></select>

              <label for="prog">Prt</label>
              <select type="number" name="Prog" id="Prog"></select>
              <script>

                $('#ID_Capitolo').change(function(){
                  var id_capitolo=$('#ID_Capitolo').val();
                
              
                  $.ajax({
                    type:'POST',
                    url:'FiltraCapitolo.php',
                    data:{id:id_capitolo},
                    success:function(data)
                {
                  $('#Capitolo').html(data);
                
                }
                
                  });
                  $.ajax({
                    type:'POST',
                    url:'FiltraArt.php',
                    data:{id:id_capitolo},
                    success:function(data)
                  {

                  $('#Art').html(data);
              
                  }
                  });
                    $.ajax({
                    type:'POST',
                    url:'FiltraProg.php',
                    data:{id:id_capitolo},
                    success:function(data)
                  {

                  $('#Prog').html(data);
              
                  }
                });
              });


            </script>
            <label for="decreto">Decreto</label>
            <select type="text" name="Decreto" id="Decreto"  ><br>
            </select>
            <label for="Oggetto">Oggetto</label>
            <input type="text" name="Oggetto" id="Oggetto" >

            <script>

                $('#ID_Capitolo').change(function(){
                  var id_capitolo=$('#ID_Capitolo').val();
                  
                  $.ajax({
                    type:'POST',
                    url:'FiltraDecreto.php',
                    data:{id:id_capitolo},
                    success:function(data)
                {
                  $('#Decreto').html(data);
                
                }
                
                  });
                });
                </script>

          
      </div>
 

<div id ="secondari">
<label for="Tipologia_Impegno">Tipo Impegno</label>
  <select type="text" name="Tipologia_Impegno" id="tipologia_impegno" >
    <option value="Beni-Servizi" selected>Beni-Servizi</option>
    <option value="Lavori">Lavori</option>
    <option value="Nota">Nota CdV</option>
    <option value="Titolo">Titolo CdV</option>
    <option value="Spesa economale">Spesa Economale</option>
  </select>

<div class="valutadx">
    <label for="Valore_progetto">Importo PDS</label><br>
    <input type="text" name="valore_progetto" id="valore_progetto" ><br>
    <label for="previsto_impegno">Previsto Impegno</label><br>
    <input type="text" name="previsto_impegno" id="previsto_impegno" ><br>
    <label for="Impegnato">Impegnato</label><br>
    <input type="text" name="Impegnato" id="Impegnato" ><br>
    <label for="Contabilizzato">Contabilizzato</label><br>
    <input type="text" name="Contabilizzato"  id="Contabilizzato" >
</div>



<label for="PDC">PDC</label>  
<input type="text" name="PDC" id="PDC" >

  <label for="IDV">IDV</label>
  <input type="number" name="IDV" id="IDV" >

  <label for="OPS">OPS</label>
  <input type="text" name="OPS" id="OPS" >

  <script>

    $('#ID_Capitolo').change(function(){
      var id_capitolo=$('#ID_Capitolo').val();
      
       $.ajax({
        type:'POST',
        url:'FiltraIDV.php',
        data:{id:id_capitolo},
        success:function(data)
    {
      $('#IDV').html(data);
    
    }
    
      });
      $.ajax({
        type:'POST',
        url:'FiltraPDC.php',
        data:{id:id_capitolo},
        success:function(data)
      {

      $('#PDC').html(data);
  
       }
      });
    });
    </script>

        <div class="button">
                  <label for="Conferma">Conferma Dati</label>
                  <input type="checkbox" name="Conferma" value="1" id="Conferma" > 
                  <button type="submit" id="invia" name="invia">Salva Inserimento</button>
                  <button type="reset" id="reset">Cancella</button><br><br>
                  <label for="opeatore">Operatore</label>
                  <input type="text" name="Operatore" id="Operatore" value='<?php echo strtoupper( $_SESSION['utente']);?>'>
     
                 
        </div>      
  </form>
 <div id="msg-registrato">
                    <h2>Inserimento registrato correttamente!</h2>
                  </div>

          <div id="opzioni">
              <div >
                <label for="Registrato">Registrato</label>
                <input type="checkbox" name="Registrato" id="Registrato" value="1" >
              </div> 
                              
              </div> 

          </div>

          <div id="note">

          <snap> Nota:</snap> 
          
          </div>
                  

          <div class=" elenco-registro">
            
            <div>
            <section>Ricerca - Progetti Registrati</section> <br>
            <select type="text" id="ricerca-reparto">
            <option value="" disabled selected>Scelta Reparto</option>
              <?php
            $sql="SELECT id_Reparto, Reparto from Reparti";
            $stmt=$pdo->query($sql);
            while($row=$stmt->fetch()){
            echo '<option value ="'.$row['id_Reparto'].'">'.$row["Reparto"].'</option>';
            }?>
          </select>
            <input type="text" id="ricerca-pds" placeholder="Ricerca n° PDS">

            </div>

              <table>
                <tr>   
                  <th>N° PDS</th>
                  <th>Reparto</th>
                  <th>Cpt</th>
                  <th>Art</th>
                  <th>Prog</th>
                  <th>Oggetto</th>
                  <th>Importo</th>
              </tr> 
              </table>
                </div>
</div>


</main>





<script>


  $('#ricerca-pds').keyup(function(){
    var pds=$('#ricerca-pds').val();
    var reparto=$('#ricerca-reparto').val();
    if(reparto==null){
      alert("Scegliere Reparto")
    return;
    }
        $.ajax({
          type:'POST',
          url:'ricerca-acq.php',
          data:{pds:pds, reparto:reparto},
          success:function(data)
      {
        $('table').html(data);

      
      }
    });
    });


</script>



<script>

let valoreProgetto=document.querySelector('#valore_progetto');

let previstoImpegno=document.querySelector('#previsto_impegno');
let Impegnato=document.querySelector('#Impegnato');
let contabilizzato=document.querySelector('#Contabilizzato');
let idCapitolo=document.querySelector('#capitolo');
let idReparto=document.querySelector('#Reparto');
let registrato=document.querySelector('#Registrato');


  valoreProgetto.addEventListener('change', (e)=>{




  previstoImpegno.value =valoreProgetto.value;  


  previstoImpegno.style.color='green';
  Impegnato.value=0;
contabilizzato.value=0;
  registrato.checked=true;
  });
  Impegnato.addEventListener('change', (e)=>{
  previstoImpegno.value=0;
  });
  contabilizzato.addEventListener('change', (e)=>{
  Impegnato.value=0;

  });

 </script> 

<script>
  let msgSalva=document.querySelector('#invia');
  let msg=document.querySelector('#msg-registrato');

  msgSalva.addEventListener('click', (e) => {

    msg.style.display="block";
  })
</script>


</body>
</html>