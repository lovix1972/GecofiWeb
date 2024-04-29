

 $(document).ready(function(){

    $('.select_tr').click(function(e){
   
      let modalWindow = document.querySelector('.modal'); 
      //let ID_PDS = modalWindow.querySelectorAll('.select_tr');
      let recordId = e.target.parentElement.id;
    
     
        $.ajax({
        type:'post', 
        url:'ModificaPDS.php',
        data:{ID_PDS: recordId},
        success:function(result)
        {       

        $('.modal-content').html(result);
          modalWindow.style.display = 'block';  
        }

  });  
    console.log(e)
    
  $(window).click(function(e) {
  if(e.target == modalWindow) {
    modalWindow.style.display = 'none';
    window.location.reload();
   }
  });

  $(window).keydown(function(e){
    if(e.key === 'Escape') {
    modalWindow.style.display = 'none';
    window.location.reload();
    }
  });
  });
});
      


      
