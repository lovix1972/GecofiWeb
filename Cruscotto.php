
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashborad</title>



<script type="text/javascript" src="./CSS/js/loader.js"  ></script>

<link rel="stylesheet" type="Text/css" href="./CSS/card.css"> 
<link rel="shortcut icon" href="./IMG/9719OIP.ico" type="image/x-icon">

</head>
<body>
<?php
session_start();
if(!isset($_SESSION['utente']) && !isset($_SESSION['codente'])){
  header ('location:session.php');
}
include("connect.php");

if($_SESSION['codente'] !=1){

	include("./header/header.html"); 
  }else{
  include("./header/headerAmm.html");     
  }

?>





<div class ="ContainerCard">
  
  	<div class="card" id ="Card1">
    <h4><b>N° PDS Totali</b></h4>
    <h3><b><?php 
	$sql="SELECT COUNT(ID_PDS) as contapds FROM Registro_PDS where Annullato=False and Registrato=True";
	$stmt=$pdo->query($sql);
	$tot_pds=$stmt->fetch();
	echo $tot_pds['contapds'];?></b></h3>
  </div>

  <div class="card" id ="Card2">
    <h4><b>F.A. Completamento</b></h4>
	<h3><b><?php 
	$sql="SELECT COUNT(ID_PDS) as contapds FROM Registro_PDS where Annullato=False and Registrato=True and Decreto='Fuori Area 2023 - Completamento'";
	$stmt=$pdo->query($sql);
	$tot_pds=$stmt->fetch();
	echo $tot_pds['contapds'];?></b></h3></b></h3>
  </div>

  <div class="card" id ="Card3">
 
    <h4><b>F.A. Anticipazione</b></h4>
	<h3><b><?php 
	$sql="SELECT COUNT(ID_PDS) as contapds FROM Registro_PDS where Annullato=False and Registrato=True and Decreto='Fuori Area 2024 - Anticipazione'";
	$stmt=$pdo->query($sql);
	
	$tot_pds=$stmt->fetch();
	echo $tot_pds['contapds'];?></b></h3>

  </div>


  <div class="card" id ="Card4">
  
    <h4><b>Spesa Economale</b></h4>
	<h3><b><?php 
	$sql="SELECT COUNT(ID_PDS) as contapds, Data_protocollo FROM Registro_PDS where Annullato=False and Registrato=True and Tipologia_Impegno='Spesa Economale'";
	$stmt=$pdo->query($sql);
	$tot_pds=$stmt->fetch();
	echo $tot_pds['contapds'];?></b></h3>
	</div>

  <div class="card" id ="Card5">
    <h4><b>PDS Annullati</b></h4>
	<h3><b><?php 
	$sql="SELECT COUNT(ID_PDS) as contapds  FROM Registro_PDS where Annullato=True and Registrato=True";
	$stmt=$pdo->query($sql);
	$tot_pds=$stmt->fetch();
	echo $tot_pds['contapds'];?></b></h3>
  </div>

  <div class="card" id ="Card6">
	<h4><b>Bilancio Ordinario</b></h4>
	<h3><b><?php 
	$sql="SELECT COUNT(ID_PDS) as contapds  FROM Registro_PDS where Annullato=False and Registrato=True And Decreto='Bilancio Ordinario 2023'";
	$stmt=$pdo->query($sql);
	$tot_pds=$stmt->fetch();
	echo $tot_pds['contapds'];?></b></h3>
  </div>

  <div class="card" id ="Card7">
  
  <h4></b>Preavvisi Globali</h4>
  <h3><?php 
  $sql="SELECT sum(preavvisi) as assegnato  FROM Capitoli where Anno=2024";
  $stmt=$pdo->query($sql);
  
  $tot_pds=$stmt->fetch();
  echo number_format($tot_pds['assegnato'],2,',','.');?></b> €</h3>

</div>

<div class="card" id ="Card8">
  
  <h4>//</h4>
  <h3><?php 
  $sql="SELECT COUNT(ID_PDS) as contapds  FROM Registro_PDS where Annullato=False and Registrato=True ";
  $stmt=$pdo->query($sql);
  
  $tot_pds=$stmt->fetch();
  /*echo  number_format($tot_pds['contapds']);*/?></b> </h3>

</div>


<div class="card" id ="Card9">
  
  <h4>//</h4>
  <h3><?php 
  $sql="SELECT COUNT(ID_PDS) as contapds  FROM Registro_PDS where Annullato=False and Registrato=True ";
  $stmt=$pdo->query($sql);
  
  $tot_pds=$stmt->fetch();
  /*echo  number_format($tot_pds['contapds']);*/?></b> </h3>

</div>





<!--Grafici-->
<div class="Grafici">

<div id="chart_div">

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(Grafico1);

      function Grafico1() {
        // Some raw data (not necessarily accurate)
		var data = google.visualization.arrayToDataTable([
			
		['Reparto','totpds'],
		<?php

		$query="SELECT Reparto, count(ID_PDS) as totpds FROM Registro_PDS where Annullato=0 and Registrato=1 and impegno=1 group by Reparto";
		$risultato=$pdo->query($query);
	

		while($row=$risultato->fetch()){

		echo "['".$row['Reparto']."',".$row['totpds']."],";
		
		}

		?>


		]);
    		
        var options = {
          title : 'N° PDS Registrati',
		 

		legend:'none',
		hAxis: {
				textStyle:{
				fontSize:10},
			   },
		};

        var chart = new 
		google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

  
    </script>
	</div>


	<div id="chart2_div">

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(Grafico1);

  function Grafico1() {
	// Some raw data (not necessarily accurate)
	var data = google.visualization.arrayToDataTable([
		
['Reparto','totpds'],
	<?php

	$query="SELECT Reparto, count(ID_PDS) as totpds FROM Registro_PDS where Annullato=0 and Registrato=1 and impegno=1 group by Reparto";
	$risultato=$pdo->query($query);


	while($row=$risultato->fetch()){

	echo "['".$row['Reparto']."',".$row['totpds']."],";
	
	}

	?>
	

	]);

		
	var options = {
	  title : 'Percentuale  %',
	 pieHole:0.5,
	 pieSliceTextStyle:{
		color:'black',
	 },
	 
	legend:'yes',
	fontSize:12
	};

	var chart = new 
	google.visualization.PieChart(document.getElementById('chart2_div'));
	chart.draw(data, options);
  }


</script>
</div>


<div id="chart3_div">

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(Grafico1);

  function Grafico1() {
	// Some raw data (not necessarily accurate)
	var data = google.visualization.arrayToDataTable([
	['Data_protocollo','totpds'],

	<?php
	$query="SELECT Reparto, date_format(Data_protocollo,'%d/%m/%y') as Data_protocollo, date_format(Data_protocollo,'%Y') as anno, count(ID_PDS) as totpds FROM Registro_PDS where Annullato=0 and Registrato=1 and impegno=1 group by  Data_protocollo order by Data_protocollo ASC";
	$risultato=$pdo->query($query);
	while($row=$risultato->fetch()){

	echo "['".$row['Data_protocollo']."',".$row['totpds']."],";
	}
	?>
	
	]);

		
	var options = {
	
	  title : 'Andamento Mese',
		legend:'none',
		hAxis: {title: 'Mese' , 
				textStyle:{
				fontSize:10},
			   },

		vAxis: {
			title: 'n. PDS',
			scaleType: 'linear'
	},
       
       
	
	};

	var chart = new 
	google.visualization.LineChart(document.getElementById('chart3_div'));
	chart.draw(data, options);
  }


</script>
</div>
</div>
</div>


</body>
</html>                           