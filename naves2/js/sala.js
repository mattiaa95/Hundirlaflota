var datos = "";
$(document).ready(function(){
  setInterval( "actualizar()", 800 );
  setInterval(updateScroll,800);
});

function updateScroll(){
    var element = document.getElementById("entrada");
    element.scrollTop = element.scrollHeight;
}

///-----------------------------CHAT enviar mensajes
function enviar() {
        var xmlhttp = new XMLHttpRequest();
        var datos=document.getElementById("jugador").value;
        xmlhttp.open("POST", "getdatos.php?datos=" + datos + "&jugador=" + jugador, true);
        xmlhttp.send();
    }
//-----------------------------
function enviarpos(pos) {
        var xmlhttp = new XMLHttpRequest();
        pos=$(pos).attr('id');
        xmlhttp.open("POST", "getdatos.php?jugador=" + jugador + "&pos=" + pos, true);
        xmlhttp.send();
    }
//-------------------actualizar
function actualizar(){
$('#entrada').load('getdatos.php?jugador='+jugador);
}
