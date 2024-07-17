<?php
   include('connect.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
<style>
    p{
background-color: white;

   }

</style>
<p>Prova</p>

<script>
   const paragraph =document.querySelector('p');
   paragraph.addEventListener('click',updatename);
   function updatename(){
let name=prompt('Inserire un nome');
paragraph.textContent='Prova:' + name;


   }

</script>

<h1>Welcome</h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>