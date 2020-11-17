<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>


  <?php
session_start();
$visitas=1;

if(isset($_COOKIE["visitas"])){
$visitas=$_COOKIE["visitas"];

}
if(!isset($_SESSION["dinero"])){
  
  if(empty($_POST["cantidad"])){
  
?>

<h1>visitas <?= $visitas ?>

<form method="post">
cuanto dinero ? 
<input name="cantidad" type="number">
</form>
</body>
</html>
<?php
exit();

  
  }else{
      $_SESSION["dinero"]=$_SESSION["cantidad"];
      header("Refresh:0");
  }
  }


  if(isset($_POST["apostar"])){
    $apostado=$_POST["apostado"];

    if($apostado > $_SESSION["dinero"]){
     
      echo " la cantidad apostada supera la que tienes";
      
      }else{

        $apuesta=$_POST["apuesta"];
        $resultado=(rand(1,10)%2==0)?"par" : "impar";
        echo "resultado es elsiguiente : .$resultado.";
        
        if($apostado==$apuesta){

          echo "gano";
          $_SESSION["dinero"] += $apostado;


        }else{

          echo "perdio";
          $_SESSION["dinero"] -= $apostado;
        }

      }
    
    }

if(isset($_POST["dejar"]) ||  $_SESSION["dinero"]==0){

echo"hasta otra maquina";
echo"dinero".$_SESSION["dinero"];
$visitas++;
setcookie("visitas",$visitas,time()+300000);
session_destroy();
exit();


}

  ?>


<form method="post">
cuanto dinero quieres apostar? 
<input name="apostado" type="number">
<input name="apuesta" type="radio" value="par"> 
<input name="apuesta" type="radio" value="impar"> 
<buton  name="apostar" value="apostar">
<buton  name="dejar" value="dejar">
</form>
</body>
</html>