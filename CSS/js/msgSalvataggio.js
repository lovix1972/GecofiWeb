
       
        let modaleSalvaSfondo = document.querySelector('.modaleSalvaSfondo');
        let modaleSalvaCont = document.querySelector('modaleSalvaCont');
        let btnmodSalva = document.querySelector('.btn-modaleSalvataggio');
        let btnSalva=document.getElementById('invia');

        btnSalva.addEventListener('click', (e)=>{
     
       
            modaleSalvaSfondo.style.display= 'block'; 
   
              function chiudi() {
                  
              modaleSalvaSfondo.style.display= 'none'; 
             
              }

                setTimeout(chiudi, 1200);  
            
              });

          



            btnmodSalva.addEventListener('click',(e) =>{
         
                      modaleSalvaSfondo.style.display= 'none';
                        modaleSalvaCont.style.display =  'none'; 
                       
                     });
                     
                     
                     
                  

                      $(window).keydown(function(e){
            
                    
                     if(e.key === 'Escape' ){
                          modaleSalvaSfondo.style.display='none';
                      modaleSalvaCont.style.display = 'none'; 
                  
                
            }

          


            });         
