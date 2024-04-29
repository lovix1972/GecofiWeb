
let mytable=document.querySelector('#table');

fetch('test.php')
.then((informazioni) => {

let test = informazioni.json();
return test
})

.then((dato) => {

const array=dato;
let idrep=document.querySelector('#idrep');
let capitolo=document.querySelector('#capitolo');
let art=document.querySelector('#art');

idrep.addEventListener('keyup',()=>{
capitolo.addEventListener('keyup',()=>{
art.addEventListener('keyup',()=>{


const filtraid = array.filter(id =>{


return id.id_Reparto ==idrep.value && id.capitolo==capitolo.value && id.art==art.value;

})
console.log(filtraid)
mytable.innerHTML="";
filtraid.forEach(row => {


let newRow = document.createElement('tr');


newRow.innerHTML= `<td>${row.id_Reparto}</td><td>${row.capitolo}</td><td>${row.art}</td><td>${row.prog}</td><td>${row.IDV}</td>`
mytable.append(newRow);

});
});
});

});

});




