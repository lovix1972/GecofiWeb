
let formAcquisizione= document.querySelector('#datipds');

let submitBtn=document.querySelector('#salva');
submitBtn.addEventListener('click', (e) =>{
    e.preventDefault();

    let dati= new FormData(formAcquisizione);
dati.forEach((key, value) =>{
console.log(key, value);

})

});

