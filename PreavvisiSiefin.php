<?php

/*include("./footer/footer.html");*/   

include ("Connect.php"); 
session_start();

if(!isset($_SESSION['utente']) && !isset($_SESSION['codente']))
{
header('location:session.php');

} 

if($_SESSION['codente'] !=1){

   include("./header/header.html"); 

   $filtra_Amm="where id_Reparto=".$_SESSION['codente']."";
 }else{
 include("./header/headerAmm.html");
 $filtra_Amm=""     ;
 }
 

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Situazione Reparti</title>

<link rel="stylesheet" href="./CSS/preavvisi.css"> 
   <link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">
 
</head>

   <body>
<div class='container'>
<div class="Filtra">
<form action="PreavvisiSiefin.php" class ="form-select" method="GET">

Anno: <select name ="Anno" ><?php
$sql="SELECT Anno from capitoli group by Anno";
$stmt=$pdo->query($sql);
while($row=$stmt->fetch()){
echo '<option value ="'.$row['Anno'].'">'.$row["Anno"].'</option>';;
}

?>
</select>  

Reparto: <select name ="id_Reparto"  required><?php
$sql="SELECT id_Reparto, reparto from reparti $filtra_Amm ";
echo '<option></option>';
$stmt=$pdo->query($sql);
while($row=$stmt->fetch()){
echo '<option value ='.$row['id_Reparto'].'>'.$row["reparto"].'</option>';
}?>
</select> 
Capitolo: 
<select name="cpt" id="cpt">
<?php
$sql="SELECT  capitolo from capitoli group by capitolo ";
echo '<option value =""></option>';
$stmt=$pdo->query($sql);
while($row=$stmt->fetch()){
echo '<option value ="'.$row['capitolo'].'">'.$row["capitolo"].'</option>';
}
?>
</select>
Articolo: 
<select name="art" id="art">
<?php
$sql="SELECT Art from capitoli group by Art ";
echo '<option value =""></option>';
$stmt=$pdo->query($sql);
while($row=$stmt->fetch()){
echo '<option value ="'.$row['Art'].'">'.$row["Art"].'</option>';
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
        <th>Prog</th>
        <th>Descrizione</th>
        <th>Contrattualizzabile</th>
        <td>Cod. Attività</th>
        <th>PDC</th>
        <th>IDV</th>
        <th>Preavvisi</th>
     
       </thead>
            
      
      <?php





 if(isset($_GET['id_Reparto']) && isset($_GET['Anno']) && isset($_GET['cpt']) && isset($_GET['art']) )    
 
 {

  $ID_Reparto = $_GET['id_Reparto'];
  $Anno = $_GET['Anno'];
  $cpt = $_GET['cpt'];
  $art = $_GET['art'];

  if(!empty($cpt) && !empty($art)){

         $capitolo ="and capitoli.capitolo=$cpt and capitoli.art=$art"   ;
         $capitolosum ="and Capitoli.Capitolo=$cpt and Capitoli.Art=$art"   ;
         
         }else{

         $capitolo =""   ;
         $capitolosum="";
         }


                 $query=$pdo->query("SELECT capitoli.IDV, capitoli.Anno, capitoli.id_Reparto, reparti.Reparto, capitoli.capitolo, capitoli.art, capitoli.prog, sum(capitoli.Preavvisi) as Preavvisi, capitoli.Descrizione, capitoli.Contrattualizzabile, capitoli.CODATTIVITA, capitoli.PDC, capitoli.IDV FROM capitoli right JOIN Reparti ON capitoli.id_Reparto = reparti.id_Reparto where  capitoli.id_Reparto=$ID_Reparto and capitoli.Anno=$Anno $capitolo  group by capitoli.IDV"); 

                 while($cicle=$query->fetch()){
                 echo"
                 <tr>";
                 echo"<td>".$cicle['reparto']."</td>";
                 echo"<td>".$cicle['capitolo']."</td>";
                 echo"<td>".$cicle['art']."</td>";
                 echo"<td>".$cicle['prog']."</td>";
                 echo"<td>".$cicle['Descrizione']."</td>";
                 echo"<td>".$cicle['Contrattualizzabile']."</td>";
                 echo"<td>".$cicle['CODATTIVITA']."</td>";
                 echo"<td>".$cicle['PDC']."</td>";
                 echo"<td>".$cicle['IDV']."</td>";
            
                 echo"<td>".number_format($cicle["Preavvisi"],2,',','.')."</td>
                </tr>";

                }                                                    
          
                $query1=$pdo->query("SELECT sum(Preavvisi) as totalepreavvisi FROM capitoli where id_Reparto=$ID_Reparto and Anno=$Anno $capitolosum "); 

                while($cicle1=$query1->fetch()){ 
                echo"
                <tr>
                <td colspan=9>";
                echo"<td colspan=1 id='tottd'>".number_format($cicle1["totalepreavvisi"],2,',','.')."</td></tr>";
                }        


}



 ?>

    </table>
    </div>
</body>
</html>