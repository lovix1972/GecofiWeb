

document.addEventListener("DOMContentLoaded", function() {
    
  
  var selectElement = document.getElementById("cpt");
    var casellaDiTestoElement = document.getElementById("ID_Capitolo");
 
    selectElement.addEventListener("change", function() {
      var valoreSelezionato = selectElement.value;
      casellaDiTestoElement.value = valoreSelezionato;

    });
  });
  
  

    
  