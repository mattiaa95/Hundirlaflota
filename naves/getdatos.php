<?php

error_reporting(0);
$datos = $_REQUEST["datos"];
$jugador = $_REQUEST["jugador"];
$turno="jugador1";



$jugador1 = array("0", "0", "0", "0", "0", "0", "0","0",
                  "0", "0", "0", "0", "0", "0", "0","0",
                  "0", "0", "0", "0", "0", "0", "0","0",
                  "0", "0", "0", "0", "0", "0", "0","0",
                  "0", "0", "0", "0", "0", "0", "0","0",
                  "0", "0", "0", "0", "0", "0", "0","0",
                  "0", "0", "0", "0", "0", "0", "0","0",
                  "0", "0", "0", "0", "0", "0", "0","0",);

$jugador1disparado = array("0", "0", "0", "0", "0", "0", "0","0",
                            "0", "0", "D", "0", "0", "0", "0","0",
                            "0", "0", "0", "0", "0", "0", "0","0",
                            "0", "0", "0", "D", "0", "0", "0","0",
                            "0", "0", "0", "0", "0", "0", "0","0",
                            "0", "0", "0", "0", "0", "0", "0","0",
                            "0", "0", "0", "D", "0", "0", "0","0",
                            "0", "0", "0", "0", "0", "0", "0","0",);


$jugador2 = array("0", "0", "0", "0", "0", "1", "0", "0",
                  "0", "0", "1", "1", "0", "0", "0", "0",
                  "0", "0", "0", "0", "0", "0", "0", "0",
                  "0", "0", "0", "0", "1", "0", "0", "0",
                  "0", "1", "0", "0", "1", "0", "0", "0",
                  "0", "1", "0", "0", "1", "0", "0", "0",
                  "0", "0", "1", "0", "1", "0", "0", "0",
                  "0", "0", "0", "0", "0", "0", "0", "X",);

$jugador2disparado = array("D", "0", "0", "A", "0", "0", "0","0",
                          "0", "0", "D", "A", "0", "0", "0","0",
                          "0", "0", "D", "A", "0", "0", "0","0",
                          "0", "0", "0", "0", "0", "0", "0","0",
                          "0", "0", "0", "0", "0", "0", "0","0",
                          "0", "0", "D", "0", "0", "0", "0","0",
                          "0", "0", "0", "0", "D", "0", "0","0",
                          "0", "0", "0", "0", "0", "0", "0","D",);





function pintartableroa($jugadorcual){
  foreach ($jugadorcual as $key => $value) {
    $posicion="'#".($key+1)."a'";
    if ($value == "0") {
      echo "<script>$($posicion).css('background-color','rgb(122, 198, 231)')</script>";
    }elseif ($value == "1") {
      echo "<script>$($posicion).css('background-color','rgb(27, 93, 135)')</script>";
    }elseif ($value == "X") {
      echo "<script>$($posicion).css('background-color','rgb(214, 61, 13)')</script>";
    }elseif ($value == "D") {
        echo "<script>$($posicion).css('background-color','rgb(59, 15, 85)')</script>";
    }elseif ($value == "A") {
          echo "<script>$($posicion).css('background-color','rgb(50, 224, 63)')</script>";
        };
  }
};

function pintartablerob($jugadorcual){
  foreach ($jugadorcual as $key => $value) {
    $posicion="'#".($key+1)."'";
    if ($value == "0") {
      echo "<script>$($posicion).css('background-color','rgb(122, 198, 231)')</script>";
    }elseif ($value == "1") {
      echo "<script>$($posicion).css('background-color','rgb(27, 93, 135)')</script>";
    }elseif ($value == "X") {
      echo "<script>$($posicion).css('background-color','rgb(214, 61, 13)')</script>";
    }elseif ($value == "D") {
        echo "<script>$($posicion).css('background-color','rgb(59, 15, 85)')</script>";
    }elseif ($value == "A") {
            echo "<script>$($posicion).css('background-color','rgb(50, 224, 63)')</script>";
          };
  }
}



if ($turno == "jugador1") {
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'pointer\');$(\'#tablero1\').css(\'opacity\', \'1\');</script>';
  echo '<script>$(\'#tablero2\').css(\'cursor\', \'none\');$(\'#tablero2\').css(\'opacity\', \'0.5\');</script>';
}elseif ($turno == "jugador2") {
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'none\');$(\'#tablero1\').css(\'opacity\', \'0.5\');</script>';
  echo '<script>$(\'#tablero2\').css(\'cursor\', \'pointer\');$(\'#tablero2\').css(\'opacity\', \'1\');</script>';
};


////
if ($datos == "") {
//nada de nada.XD
}else {
  if (($file = fopen("prueba.txt", "a")) !== FALSE) {
    $linea = "<span class='".$jugador."'>".$jugador.": ".$datos."</span>\n";
      fwrite($file, $linea);
      fclose($file);
  }
}

  if (($file = fopen("prueba.txt", "r")) !== FALSE) {
      while (($datos = fgets($file)) !== FALSE) {
        echo $datos." <br>";
      }
      fclose($file);
  }

///

if ($jugador == "jugador2") {
  pintartableroa($jugador2disparado);
  pintartablerob($jugador2);
}elseif ($jugador == "jugador1") {
  pintartableroa($jugador1disparado);
  pintartablerob($jugador1);
}


?>
