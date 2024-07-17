
let mytable=document.querySelector('table');


fetch('fetchPreavvisi.php')
.then((informazioni) => {

    let test = informazioni.json();
    return test
    })

  .then((dato) => {
 
    let valore=document.querySelector('#valore');
    valore.addEventListener('keyup',(e)=>{

    let filtra=dato.filter(id => {
 

      return id.Capitolo == valore.value ;

   })

    console.log(dato)
      filtra.forEach(row => {
      let newRow = document.createElement('tr');
      newRow.innerHTML= `<td>${row.Capitolo}</td><td>${row.Art}</td><td>${row.prog}</td><td>${row.totPreavvisi}</td>`
      mytable.append(newRow);


      });

    });

});

 
  



 



