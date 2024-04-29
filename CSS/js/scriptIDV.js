

document.addEventListener("DOMContentLoaded", function() {
    
  
  var selectElement = document.getElementById("ID_Capitolo");
    var casellaDiTestoElement = document.getElementById("IDV");
  
    
    selectElement.addEventListener("value", function() {
      var valoreSelezionato = selectElement.value;
      casellaDiTestoElement.value = valoreSelezionato;

    });
  });
  
  

    
  