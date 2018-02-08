$(document.body).on("click", "#btnEditarProf", function(){
    var b = $(this).attr("cod");
    var n = $("#inNomProf").val();
    var a = $("#inApProf").val();

    if(n == ""){
      alert("Debes introducir un nombre.")
    }else if(a == ""){
      alert("Debes introducir un apellido.")
    }else{
      $.ajax({
url: "edprofajax.php",
data: {
  cod: b,
  nom: n,
  ap: a


},
type:"GET",
dataType: "html",

success: function (data) {

  alert("Nombre del profesor actualizado");
  window.location.href = ("http://javierperez.tk/servidor/conexionbbdd/modulos.php");
},
error: function (xhr, status, errorThrown) {
alert("Sorry, there was a problem!");
console.log("Error: " + errorThrown);
console.log("Status: " + status);
console.dir(xhr);
},

// Code to run regardless of success or failure
complete: function (xhr, status) {
//alert("The request is complete!");
}

});
    }


});
