<?php
////error_reporting(0);-----------la arroba quita los errores de la variable-------------------
//-------------variables por request----------------------------------------
@$chat = $_REQUEST["datos"];
@$posi = $_REQUEST["pos"];
$jugador = $_REQUEST["jugador"];
//------------fin variables por request-----------------------------
//----------------------------array jugadores----------------------
$jugador1 = array();
$jugador2 = array();
//--------------------------fin array jugadores----------------------------------
function arrayrand($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
//-----------------------------funcion para pintar tableros con jquery--------------------------
function pintartableroa($jugadorcual,$mascara,$tablero){
  //la mascara es para activar lque no se vean los barcos en el jugador opuesto
  //selecciona el tablero 1 para el a y 0 para el segundo
  //el foreach recorre el array del jugador dpenediendo del indice pone la posiocion del tablero y dependiedo del valor
  // le asigna colo por el momento.
  foreach ($jugadorcual as $key => $value) {
    //el 1 es el a se puede ver aqui.
    if ($tablero == 1) {
      $posicion="'#".($key+1)."a'";
      //si no es 1 pues salta al b o el siguiente tablero.
    }else {
      $posicion="'#".($key+1)."'";
    }
//equivalecias de valores y colores el 0 es lo mismo que el else es para pruebas se podria quitar.
    if ($value == "0") {
  //aver si no cambia pa que lo actualizo de azul... cosas que se te ocurren despues. MEJORA DE 9KB sec a 751 B
      //pinta de azul
      //echo "<script>$($posicion).css('background-color','rgb(122, 198, 231)')</script>";
    }elseif ($value == "1" && $mascara == 1) {// si esta activada la mascara en 1 se veran los barcos
      //el 1 es que hay un barco
      echo "<script>$($posicion).css('background-color','rgb(27, 93, 135)')</script>";
    }elseif ($value == "X") {
      //pinta de rojo con la X
      echo "<script>$($posicion).css('background-color','rgb(214, 61, 13)')</script>";
    }elseif ($value == "D") {
      //pinta de violeta el disparo
        echo "<script>$($posicion).css('background-color','rgb(59, 15, 85)')</script>";
    }elseif ($value == "A") {
      //pinta de verde el acierto.
          echo "<script>$($posicion).css('background-color','rgb(50, 224, 63)')</script>";
        }else {
  //aver si no cambia pa que lo actualizo de azul... cosas que se te ocurren despues. MEJORA DE 9KB sec a 751 B
          //pinta de azul lo mismo que el if primero. que el 0.
          //echo "<script>$($posicion).css('background-color','rgb(122, 198, 231)')</script>";
        };
  }
};
//-------------------------------fin pintar------------------------------
//--------------------------CHAT-------------------------
//cuantos mensajes quieres que s emuestren , siempre del final del archivo chat.txt
function actualizarchat($historial,$archivo,$mensaje,$usuario){
$chathistorial=$historial;
if ($mensaje == "") {
//nada de nada.XD si no hay datos no hace nada.
}else {
  if (($file = fopen($archivo, "a")) !== FALSE) {
    echo "string";
    $linea = "<span class='".$usuario."'>".$usuario.": ".$mensaje."</span>\n";
      fwrite($file, $linea);
      fclose($file);
  }
}
  if (($file = fopen($archivo, "r")) !== FALSE) {
    //imprime el chat con un limite de historial.
    $lineas=count(file($archivo));
    $conta=0;
      while (($mensaje = fgets($file)) !== FALSE) {
              if ($lineas >= $chathistorial) {
                      if ($conta >= ($lineas-$chathistorial)) {
                      echo $mensaje." <br>";
                      }
            }else {
              echo $mensaje." <br>";
            }
            $conta++;
        }
    fclose($file);
      }
}
//---------------------fin CHAT--------------------------

//----------------------------------------------------------main------------------------------------------------------

if (($file = fopen("partida.txt", "r")) !== FALSE) {
    while (($datos = fgets($file)) !== FALSE) {
       list($turno,$numtur)=explode(";",$datos);
    }
    fclose($file);
}

actualizarchat(14,"chat.txt",$chat,$jugador);

//----------------seleccion de turnos.-------------------
if ($turno == "jugador1" && $jugador == "jugador1") {
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'pointer\');$(\'#tablero1\').css(\'opacity\', \'1\');</script>';
  echo "<script>$('#tablero1').children().children().children().attr('onclick', 'enviarpos(this)');</script>";
}elseif ($turno == "jugador2" && $jugador == "jugador2") {
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'pointer\');$(\'#tablero1\').css(\'opacity\', \'1\');</script>';
  echo "<script>$('#tablero1').children().children().children().attr('onclick', 'enviarpos(this)');</script>";
}else{
  echo '<script>$(\'#tablero1\').css(\'cursor\', \'none\');$(\'#tablero1\').css(\'opacity\', \'0.5\');</script>';
  echo "<script>$('#tablero1').children().children().children().attr('onclick', '');</script>";
};
//-------------cargar los arrays vacios------------------
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
//------------fin cargar los arrays--------------

if ($numtur == 0) {
  $valores=arrayrand(0,64,16);
  if (($file = fopen("tablero1.txt", "w")) !== FALSE) {

      foreach ($jugador1 as $key => $value) {
          $imprime=0;
        foreach ($valores as $keyV => $valueV) {
          if ($key == $valueV) {
            $imprime=1;
          }
        }
        if ($imprime == 1) {
            $jugador1[$key]='1';
        }else {
            $jugador1[$key]='0';
        }

        }

         $jugador1concomas=implode(", ",$jugador1);
         fwrite($file, $jugador1concomas);
      fclose($file);
    }


    if (($file = fopen("partida.txt", "w")) !== FALSE) {
      @$numtur+=1;
      $meterdatos=$turno.";".$numtur;
        fwrite($file, $meterdatos);
        fclose($file);
    }
  }

//-----------escribir posicion------------

if ($posi == "") {
//nda de nada
}else{
    if ($turno == "jugador1") {
      if (($file = fopen("tablero2.txt", "w")) !== FALSE) {
        //buscamos posi y colocamos
          foreach ($jugador2 as $key => $value) {
            if ((intval($posi)-1) == $key) {
              if ($value == "1") {
                $jugador2[$key]='X';
                $yaclicado=0;
              }elseif ($value == "0"){
                $jugador2[$key]='D';
                $yaclicado=0;
              }else {
              $yaclicado=1;
              }

            }
          }
             $jugador2concomas=implode(", ",$jugador2);

             fwrite($file, $jugador2concomas);
             fclose($file);
          }

          if ($yaclicado == 0) {
            if (($file = fopen("partida.txt", "w")) !== FALSE) {
              $numtur+=1;
              $meterdatos="jugador2;".$numtur;
                fwrite($file, $meterdatos);
                fclose($file);
            }
          }
    }elseif ($turno == "jugador2") {
      if (($file = fopen("tablero1.txt", "w")) !== FALSE) {
        //buscamos posi y colocamos
          foreach ($jugador1 as $key => $value) {
            if ((intval($posi)-1) == $key) {
              if ($value == "1") {
                $jugador1[$key]='X';
                $yaclicado=0;
              }elseif ($value == "0"){
                $jugador1[$key]='D';
                $yaclicado=0;
              }else {
              $yaclicado=1;
              }

            }
          }
             $jugador1concomas=implode(", ",$jugador1);
             fwrite($file, $jugador1concomas);
          fclose($file);
        }
        if ($yaclicado == 0) {
          if (($file = fopen("partida.txt", "w")) !== FALSE) {
            $numtur+=1;
            $meterdatos="jugador1;".$numtur;
              fwrite($file, $meterdatos);
              fclose($file);
          }
        }
    }
}

//-------------

//----------------

//ejecutar funcion pintar tableros dependiendo del jugador
if ($jugador == "jugador2") {
  pintartableroa($jugador1,0,1);
  pintartableroa($jugador2,1,0);
}elseif ($jugador == "jugador1") {
  pintartableroa($jugador2,0,1);
  pintartableroa($jugador1,1,0);
}

?>
