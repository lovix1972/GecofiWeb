
        function validazione(){
            
            let user=document.getElementById('utente');
            let passwd=document.getElementById('password');
            let msgerr = document.getElementById('msgerr');
            let myform=document.querySelector('#form');
            let centroSpesa=document.getElementById('centro-spesa')
            
            user.style.border="1px solid #ccc";
            passwd.style.border="1px solid #ccc";
       
        
        
        
            if(user.value == ""){
                user.focus();
                user.style.border = "3px solid #990033";
            return false;
            
            }
            
            if(passwd.value == ""){
            
                passwd.focus();
                passwd.style.border = "3px solid #990033";
            return false;
            
            }

            if(passwd.value.length<8 ){
                msgerr.innerHTML ="Password almeno 8 caratteri!";
            
                passwd.focus();
                passwd.style.border = "3px solid #990033";
            return false; 
            }
                msgerr.innerHTML ="";
            
                passwd.focus();
                passwd.style.border = "3px solid #32CD32";
                return true; 
            }
                if(centroSpesa.value == ""){
            
                    centroSpesa.focus();
                    centroSpesa.style.border = "3px solid #990033";
                return false;
            

        
    }
 