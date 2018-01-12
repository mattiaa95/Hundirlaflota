<?php



//-------------variables por request
////error_reporting(0);-----------la arroba quita los errores de la variable
@$datos = $_REQUEST["datos"];
$jugador = $_REQUEST["jugador"];
//------------fin variables por request
//
$turno="jugador2";
//

//----------------------------array jugadores
$jugador1 = array();

$jugador2 = array();

//--------------------------fin array jugadores




//-----------------------------funcion para pintar tableros con jquery
function pintartableroa($jugadorcual,$mascara,$tablero){
  foreach ($jugadorcual as $key => $value) {
    if ($tablero == 1) {
      $posicion="'#".($key+1)."a'";
    }else {
      $posicion="'#".($key+1)."'";
    }

    if ($value == "0") {
      echo "<script>$($posicion).css('background-color','rgb(122, 198, 231)')</script>";
    }elseif ($value == "1" && $mascara == 1) {
      echo "<script>$($posicion).css('background-color','rgb(27, 93, 135)')</script>";
    }elseif ($value == "X") {
      echo "<script>$($posicion).css('background-color','rgb(214, 61, 13)')</script>";
    }elseif ($value == "D") {
        echo "<script>$($posicion).css('background-color','rgb(59, 15, 85)')</script>";
    }elseif ($value == "A") {
          echo "<script>$($posicion).css('background-color','rgb(50, 224, 63)')</script>";
        }else {
          echo "<script>$($posicion).css('background-color','rgb(122, 198, 231)')</script>";
        };
  }
};

//--------------fin pintar------------------------------



//-----------------------------------------------------------------------main----------------------------------------------


////--------------------------CHAT-------------------------
if ($datos == "") {
//nada de nada.XD
}else {
  if (($file = fopen("chat.txt", "a")) !== FALSE) {
    $linea = "<span class='".$jugador."'>".$jugador.": ".$datos."</span>\n";
      fwrite($file, $linea);
      fclose($file);
  }
}

  if (($file = fopen("chat.txt", "r")) !== FALSE) {
      while (($datos = fgets($file)) !== FALSE) {
        echo $datos." <br>";
      }
      fclose($file);
  }

///---------------------finchat--------------------------


if (($file = fopen("tablero1.txt", "r")) !== FALSE) {
    while (($datos = fgets($file)) !== FALSE) {
       $jugador1=explode(", ",$datos);
    }
    fclose($file);
}

if (($file = fopen("tablero2.txt", "r")) !== FALSE) {
    while (($datos = fgets($file)) !== FALSE) {
       $jugador2=explode(", ",$datos);
    }
    fclose($file);
}


//----------------seleccion de turnos.
if ($turno == "jugador1" && $jugador == "jugador1") {
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'none\');$(\'#tablero1\').css(\'opacity\', \'0.5\');</script>';
}elseif ($turno == "jugador2" && $jugador == "jugador2") {
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'none\');$(\'#tablero1\').css(\'opacity\', \'0.5\');</script>';
}else{
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'pointer\');$(\'#tablero1\').css(\'opacity\', \'1\');</script>';
};

//ejecutar funcion pintar tableros dependiendo del jugador

if ($jugador == "jugador2") {
  pintartableroa($jugador1,0,1);
  pintartableroa($jugador2,1,0);
}elseif ($jugador == "jugador1") {
  pintartableroa($jugador2,0,1);
  pintartableroa($jugador1,1,0);
}


?>
