

document.addEventListener("DOMContentLoaded", function() {
    
  
  var selectElement = document.getElementById("Reparto");
    var casellaDiTestoElement = document.getElementById("ID_Reparto");
    

    selectElement.addEventListener("change", function() {
      var valoreSelezionato = selectElement.value;
      casellaDiTestoElement.value = valoreSelezionato;
    });
  });

