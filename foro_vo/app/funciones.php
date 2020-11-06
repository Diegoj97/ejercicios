<?php
function usuarioOk($usuario, $contraseña) :bool {
  
      if(strlen($usuario) < 8){
         return false;
      }if($contraseña==strrev($usuario)){

         return true;
      }else{

         return false;
      }

   //return ($usuario == "pepe" && $contraseña == 123);
    
}

function letrarepetida($comentario){
   $max=0;
   $letra=null;
   $letrarepetida=null;
   for($i=0;$i<strlen($comentario);$i++){
       $letra=$comentario[$i];
       if($letra!=" " && substr_count($comentario, $letra)>$max){
           $max=substr_count($comentario, $letra);
           $letrarepetida=$letra;
       }
   }return $letrarepetida;
}

function palabrarepetida($comentario){
   $max=0;
   $palabra=null;
   $palabrarepetida=null;
   for($i=0;$i<strlen($comentario);$i++){
       
       if($comentario[$i]!=" " && $comentario[$i]!=","){
           $palabra=$palabra.$comentario[$i];
           
       }else{
           if(substr_count($comentario, $palabra)>$max){
               $max=substr_count($comentario, $palabra);
               $palabrarepetida=$palabra;
           }
           
       }
   }return $palabrarepetida;
}