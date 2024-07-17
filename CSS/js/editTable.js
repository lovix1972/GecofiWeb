<script>
let table=document.querySelector('.table');
let cells=table.getElementsByTagName('td');
 
for(let i=0 ; i < cells.length;i++){
  cells[i].onclick =function(){
 
    if(this.hasAttribute('data-clicked')){ 
      return;
     
    }
this.setAttribute('data-clicked', 'yes');
this.setAttribute('data-text', this.innerHTML);
 
    let input=document.createElement('input');
    input.setAttribute('type', 'text');
    input.value=this.innerHTML;
    input.style.width=this.offsetWidth - (this.clientLeft ) + "px";
input.style.height=this.offsetHeight-(this.clientTop ) + "px";
input.style.border="0px";
input.style.fontFamily="inherit";
 
input.style.textAlign="inherit";
input.style.backgroundColor="LightGrey";
input.onblur=function(){
let td=input.parentElement;
let orig_text=input.parentElement.getAttribute('data-text');
let current_text=this.value;
if(orig_text != current_text){
 
  //qui salvare i cambiamenti cella su db
  
 
$('.tr-select').change(function(e){
 
 
let table = document.querySelectorAll('.select-tr');//
let recordId = e.target.id; 
 
$.ajax({
  url: '',
  type: 'post',
  data: {ID_PDS: recordId},
  success: function(response){
 
 console.log(response)
 
  
}
  
});
});
   
  td.removeAttribute('data-clicked');
  td.removeAttribute('data-text');
  td.innerHTML=current_text;
 
} else{
  td.removeAttribute('data-clicked');
  td.removeAttribute('data-text');
  td.innerHTML=orig_text;
  console.log('no change');
}
}
 
  this.innerHTML='';
this.style.cssText='padding: 0px 0px';
this.append(input);
this.firstElementChild.select();
  }
}
  
    </script>