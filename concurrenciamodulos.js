$.ajax({
url: "bloquearmodulos.php",
data: {
cod: $(".btn.btn-success").attr("cod")

},
type:"GET",
dataType: "html",

success: function (data) {
// $("<h1>").text(json.title).appendTo("body");
//$("<div class=\"content\">").html(json.html).appendTo("body");
//$("#cuerpo").append(data);
$(".container").append('<h4><span class="glyphicon glyphicon-alert" style="color:red"></span> Mientras permanezcas en esta página bloqueas la edición de este módulo a los demás usuarios.</h4>');
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
