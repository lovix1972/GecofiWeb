<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table></table>
</body>
</html>

<script>
let mytable=document.querySelector('table');
    
fetch('test.php')
.then((informazioni) => {

let test = informazioni.json();
return test

})

.then((dati) => {

    const array=dati;

    const Preavvisi = array.filter( importo =>{

       
return importo.capitolo == '1189' && importo.art =='3' && importo.id_Reparto=='1';


})

mytable.innerHTML="";

Preavvisi.forEach(row => {


let newRow = document.createElement('tr');


newRow.innerHTML= `<td>${row.capitolo}</td><td>${row.art}</td><td class='sommap'>${row.Preavvisi}</td>`;
mytable.append(newRow);
  
});
let sum=0;

let value=document.querySelectorAll('.sommap');

value.forEach(valore=>{


sum+=parseFloat(valore.innerHTML);


let totale=document.createElement('td');
totale.innerHTML=`${sum}`

   console.log(totale)

})


}) 



   
     
   

   





</script>