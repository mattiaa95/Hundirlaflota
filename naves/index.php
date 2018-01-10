<!DOCTYPE html>
<html>
<head>
	<title>naves</title>
	<style>
</style>
<h1>SALAS PARA JUGAR</h1>
<ul>


  <?php
//array de salas donde iran los objetos sala
$salas = array();
//clase sala
  class Sala {
    //porahora no cumplo la encapsulacion para pruebas
    public $nombre = 'NULL';
    public $jugador1 = 'NULL';
    public $jugador2 = 'NULL';
    public $numero;

//metodo listar
    function Listar() {
        echo "<h2><li>".$this->nombre." ".$this->jugador1." ".$this->numero."</li></h2>";
    }
//__constructor para rescatar los datos d ela base ddatos.
    public function __construct($nombre,$jugador1,$jugador2,$numero) {
        $this->numero=$numero;
        $this->nombre = $nombre;
        $this->jugador1 = $jugador1;
        $this->jugador2 = $jugador2;
    }
}



//metemos la base de datos(un txt cutre) en el objeto sala y lo mandamos al array de salas
  if (($file = fopen("salas.txt", "r")) !== FALSE) {
      while (($datos = fgets($file)) !== FALSE) {
        list($sala, $jugador,$numero) = explode(";", $datos);
        //y aqui esta , instanciamos el objeto con el contructor.
        $sala = new Sala($sala,$jugador,"Esperando...",$numero);
        //y pal array
        array_push($salas, $sala);
      }
      fclose($file);
  }



//a listar los objetos ahora con su metodo de listar
  foreach ($salas as &$sala) {
    $sala->Listar();
}


  ?>
</ul>

<br>
<h2>Crear Sala</h2>
<form class="" action="crearsala.php" method="post">
<input id="nombre" name="nombre" type="text" placeholder="Nombre sala"/><br/>
<input type="text" id="jugador" name="jugador" placeholder="Tunombre"/>
<button type="submit" name="enviar">Crear</button>
</form>

</body>
</html>
