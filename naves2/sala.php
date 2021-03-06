<html>
<head>
<style media="screen">
*, *::before, *::after{
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -o-box-sizing: border-box;
}
.popup{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 50%;
  background-color: rgb(114, 244, 209);
  border-radius: 4px;
  padding: 20px;
}
h1{
  color: white;
  font-size: 40px;
}
h4{
  color: white;
  font-size: 25px;
}
body{
  background-image: url("fondo.jpg");
  background-position: center;
  background-repeat: no-repeat, repeat;
}

.tableros {
  width: 710px;
  margin: 0 auto;
}
#tablero1 {
  width: 410px;
  margin: 0;
  cursor: pointer;
}
#tablero2 {
  width: 410px;
  margin: 0;
  cursor: none;
}
#container {
border: 3px solid #000;
width: 406px;
height: 403px;
border-radius: 5px;
float: left;
}
.row {
  clear: both;
}
.row div {
  font-size: 3em;
  float: left;
  width: 50px;
  height: 50px;
  border-left: 1.5px solid #000;
  border-bottom: 1.5px solid #000;
  text-align: center;
  background-color: rgb(122, 198, 231);
}
.row div:hover {
  background-color: rgb(118, 190, 220);
}
.row div:first-child {
  border-left: 0;
}

#entrada {
    overflow-wrap: break-word;
    overflow-y: scroll;
    width: 235px;
    height: 300px;
    background-color: rgba(147, 152, 149 0.5);
}
.entrada{
  float: left;
  background-color: rgba(194, 195, 195 , 0.5);
}
span.jugador1{
  background-color: rgba(238, 134, 89, 0.5);

}
span.jugador2{
  background-color: rgba(166, 208, 246, 0.5);

}
</style>

<?php
$jugador = $_REQUEST["jugador"];
echo "<script>var jugador=\"$jugador\"</script>";
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/sala.js"></script>
</head>
<body>

  <div class="tableros">
      <h1>HUNDIR LA FLOTA</h1>
<div id="tablero1">
  <div id="container">
    <div class="row">
      <div id="1a" ></div>
      <div id="2a" ></div>
      <div id="3a"></div>
      <div id="4a"></div>
      <div id="5a"></div>
      <div id="6a"></div>
      <div id="7a"></div>
      <div id="8a"></div>
    </div>
    <div class="row">
      <div id="9a"></div>
      <div id="10a"></div>
      <div id="11a"></div>
      <div id="12a"></div>
      <div id="13a"></div>
      <div id="14a"></div>
      <div id="15a"></div>
      <div id="16a"></div>
    </div>
    <div class="row">
      <div id="17a"></div>
      <div id="18a"></div>
      <div id="19a"></div>
      <div id="20a"></div>
      <div id="21a"></div>
      <div id="22a"></div>
      <div id="23a"></div>
      <div id="24a"></div>
    </div>
    <div class="row">
      <div id="25a"></div>
      <div id="26a"></div>
      <div id="27a"></div>
      <div id="28a"></div>
      <div id="29a"></div>
      <div id="30a"></div>
      <div id="31a"></div>
      <div id="32a"></div>
    </div>
    <div class="row">
      <div id="33a"></div>
      <div id="34a"></div>
      <div id="35a"></div>
      <div id="36a"></div>
      <div id="37a"></div>
      <div id="38a"></div>
      <div id="39a"></div>
      <div id="40a"></div>
    </div>
    <div class="row">
      <div id="41a"></div>
      <div id="42a"></div>
      <div id="43a"></div>
      <div id="44a"></div>
      <div id="45a"></div>
      <div id="46a"></div>
      <div id="47a"></div>
      <div id="48a"></div>
    </div>
    <div class="row">
      <div id="49a"></div>
      <div id="50a"></div>
      <div id="51a"></div>
      <div id="52a"></div>
      <div id="53a"></div>
      <div id="54a"></div>
      <div id="55a"></div>
      <div id="56a"></div>
    </div>
    <div class="row">
      <div id="57a"></div>
      <div id="58a"></div>
      <div id="59a"></div>
      <div id="60a"></div>
      <div id="61a"></div>
      <div id="62a"></div>
      <div id="63a"></div>
      <div id="64a"></div>
    </div>
  </div>
</div>

<div class="entrada">
<h4>CHAT JUGADORES</h4>
<div id="entrada"></div>
<input type="text" id="jugador" name="jugador" value="" maxlength="144">
<button type="button" name="button" onclick="enviar()" >Enviar</button>
</div>

<div id="ganajugador1" class="popup">
       <div class="content"><h1>Gana Jugador 1</h1></div>
   </div>

<div id="ganajugador2" class="popup">
        <div class="content"><h1>Gana Jugador 2</h1></div>
    </div>


<div id="tablero2">
  <div id="container">
    <div class="row">
      <div id="1"></div>
      <div id="2"></div>
      <div id="3"></div>
      <div id="4"></div>
      <div id="5"></div>
      <div id="6"></div>
      <div id="7"></div>
      <div id="8"></div>
    </div>
    <div class="row">
      <div id="9"></div>
      <div id="10"></div>
      <div id="11"></div>
      <div id="12"></div>
      <div id="13"></div>
      <div id="14"></div>
      <div id="15"></div>
      <div id="16"></div>
    </div>
    <div class="row">
      <div id="17"></div>
      <div id="18"></div>
      <div id="19"></div>
      <div id="20"></div>
      <div id="21"></div>
      <div id="22"></div>
      <div id="23"></div>
      <div id="24"></div>
    </div>
    <div class="row">
      <div id="25"></div>
      <div id="26"></div>
      <div id="27"></div>
      <div id="28"></div>
      <div id="29"></div>
      <div id="30"></div>
      <div id="31"></div>
      <div id="32"></div>
    </div>
    <div class="row">
      <div id="33"></div>
      <div id="34"></div>
      <div id="35"></div>
      <div id="36"></div>
      <div id="37"></div>
      <div id="38"></div>
      <div id="39"></div>
      <div id="40"></div>
    </div>
    <div class="row">
      <div id="41"></div>
      <div id="42"></div>
      <div id="43"></div>
      <div id="44"></div>
      <div id="45"></div>
      <div id="46"></div>
      <div id="47"></div>
      <div id="48"></div>
    </div>
    <div class="row">
      <div id="49"></div>
      <div id="50"></div>
      <div id="51"></div>
      <div id="52"></div>
      <div id="53"></div>
      <div id="54"></div>
      <div id="55"></div>
      <div id="56"></div>
    </div>
    <div class="row">
      <div id="57"></div>
      <div id="58"></div>
      <div id="59"></div>
      <div id="60"></div>
      <div id="61"></div>
      <div id="62"></div>
      <div id="63"></div>
      <div id="64"></div>
    </div>
  </div>
</div>
</div>



</body>
</html>
