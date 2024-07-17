
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Finanziaria</title>
   
    <script src="./CSS/js/jquery.min.js"></script>

    <link rel="stylesheet" href="./CSS/finanziaria.css">
     
<link rel="shortcut icon" href="IMG/9719OIP.ico" type="image/x-icon">
</head>
<body>
<
<div class="container">
<span>Gestione Finanziaria</span>  
    <div class="pds-da-elaborare">
   <span>PDS da Elaborare</span>    
      
  
        <div id ="filtro">
           
            <select name="anno" id="anno">
                <option value="2024" selected>2024</option>
                <option value="2024">2025</option>
            </select>
       
            <select name="id_reparto" id="id_reparto">
            <option value="" disabled selected>Sceglere il Reparto</option>
                <?php
                $sql="SELECT id_Reparto, Reparto from Reparti";
                $stmt=$pdo->query($sql);
                    while($row=$stmt->fetch()){
                echo '<option value ="'.$row['id_Reparto'].'">'.$row["Reparto"].'</option>';
                }?>
            </select>
            
            <select name="id_capitolo" id="id_capitolo">
            <option value="" disabled selected>Sceglere il Capitolo</option>
            <?php
                $sql="SELECT id_Capitolo, Capitolo, Art from Capitoli group by Capitolo";
                $stmt=$pdo->query($sql);
                    while($row=$stmt->fetch()){
                echo '<option value ="'.$row['Capitolo'].'">'.$row["Capitolo"].'</option>';
                }?>
            </select>
            <select name="art" id="art">
            <option value="" disabled selected>Sceglere l'Art</option>
            <?php
                $sql="SELECT id_capitolo, capitolo, art from Capitoli group by Art";
                $stmt=$pdo->query($sql);
                    while($row=$stmt->fetch()){
                echo '<option value ="'.$row['art'].'">'.$row["art"].'</option>';
                }?>
            </select>
        </div>

        <table>
            <div id="tbl-da-elaborare">
           
            </div>


        </table>

   </div>

    <div class="info-capitolo">
    <span>Info Capitolo</span>
    </div>
 
<div class="pds-da-validare">
<span>Scheda Capitolo</span>

        <div id="tbl-da-validare">
    
     
 </div>
</div>


<script>


  $('#art').change(function(){
    let id_reparto=$('#id_reparto').val();
    let anno=$('#anno').val();
    let capitolo=$('#id_capitolo').val();
    let art=$('#art').val();
if(id_reparto==null){
  alert("Scegliere Reparto")
return;
}
     $.ajax({
      type:'POST',
      url:'tbl-pds-elaborare.php',
      data:{anno:anno, id_reparto:id_reparto, capitolo:capitolo, art:art},
      success:function(data)
  {
   $('#tbl-da-elaborare').html(data);

  }
});

  $.ajax({
      type:'POST',
      url:'tbl-pds-validare.php',
      data:{anno:anno, id_reparto:id_reparto, capitolo:capitolo, art:art},
      success:function(data)
      
  {
   $('#tbl-da-validare').html(data);
 
  }

});
});



</script>


 </div>
</body>
</html>