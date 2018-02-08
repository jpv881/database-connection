$(document.body).on("click", ".check", function () {
  var miC = $(this);
    //console.log($(this).val());
    //console.log($(this).prop("checked"));
    //console.log($(this).attr("cod"));
    if ($(this).prop("checked") == true) {
            $.ajax({
        url: "em.php",
        data: {
            codAl: miC.attr("codAl"),
            codMo: miC.attr("codMo")

    },
    type:"GET",
    dataType: "html",

    success: function (data) {
       // $("<h1>").text(json.title).appendTo("body");
        //$("<div class=\"content\">").html(json.html).appendTo("body");
        //$("#cuerpo").append(data);
        alert("Módulo insertado");
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
    } else {
                    $.ajax({
        url: "bm.php",
        data: {
            codAl: $(this).attr("codAl"),
            codMo: $(this).attr("codMo")

    },
    type:"GET",
    dataType: "html",

    success: function (data) {
       // $("<h1>").text(json.title).appendTo("body");
        //$("<div class=\"content\">").html(json.html).appendTo("body");
        //$("#cuerpo").append(data);
        alert("Módulo Borrado");
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

$(document.body).on("click", ".glyphicon.glyphicon-remove", function(){

        if (confirm("¿Eliminar Matrícula?") ) {

              $.ajax({
        url: "borrarmatricula.php",
        data: {
            codAl: $(this).attr("codal")
            

    },
    type:"GET",
    dataType: "html",

    success: function (data) {

        alert("Matrícula Eliminada");
        window.location.href = ("http://javierperez.tk/servidor/conexionbbdd/matriculas.php");
 
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

$(document.body).on("click", "#btnFinalizar", function(){
    window.location.href = ("http://javierperez.tk/servidor/conexionbbdd/matriculas.php");
});

$(document.body).on("click", "#btnVerAlumnos", function(){
        $("#divAl").show();
                      $.ajax({
        url: "buscaralumnos.php",
        data: {
            
            

    },
  
    dataType: "html",

    success: function (data) {

        $("#divAl").append(data);
 
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
});

$(document.body).on("click", ".fila", function(){
        //console.log($(this).attr("cod"));

window.location.href = ("http://javierperez.tk/servidor/conexionbbdd/editarmatricula2.php?cod="+ $(this).attr("cod"));
});

$(document.body).on("click", "#btnCrearAlumno", function(){
console.log("ok");
        window.location.href = ("http://javierperez.tk/servidor/conexionbbdd/crearalumno.php");
});