<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sala</title>
  </head>
  <body>
    <h1>SALA</h1>
      <?php

      //error_reporting(0);

      $sala = $_REQUEST["nombre"];
      $jugador1 = $_REQUEST["jugador"];


      if (($file = fopen("salas.txt", "r")) !== FALSE) {
          while (($datos = fgets($file)) !== FALSE) {
            list($nada,$nada2,$numero) = explode(";", $datos);
            $ultimonum=(int)$numero;
          }
          fclose($file);
      }


      if (($file = fopen("salas.txt", "a")) !== FALSE) {
        $ultimonum++;
        $linea = $sala.";".$jugador1.";".$ultimonum."\n";
          fwrite($file, $linea);
          fclose($file);
          echo "<h2>SALA CREADA: ".$sala."</h2>";
      }else {
        echo "algo fallo";
      }


      $myfile = fopen($ultimonum.".php", "w");
      $txt = "Estas en la sala ".$ultimonum." con nombre: ".$sala."\n";
      fwrite($myfile, $txt);
      fclose($myfile);

      header( "refresh:1;url=".$ultimonum.".php" );
?>
<h2>Redirigiendo.......</h2>
  </body>


</html>
