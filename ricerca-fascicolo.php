<?php


include('Connect.php');
if(isset($_POST['n_fascicolo']) ){


$n_fascicolo=$_POST['n_fascicolo'];

}



  $sql="SELECT  n_fascicolo, date_format(Data_Fascicolo,'%d/%m/%y') as Data_Fascicolo, Oggetto from Fascicolo where n_fascicolo like '%$n_fascicolo%'";
  $stmt=$pdo->query($sql);
  while($cicle=$stmt->fetch()){
    echo"
  <tr>
     <td>".$cicle['n_fascicolo']." </td>
     <td>".$cicle['Data_Fascicolo']." </td>
   
     <td style='text-align:left;'>".$cicle['Oggetto']."</td>
    
 
     </tr>";
  }



 ?>