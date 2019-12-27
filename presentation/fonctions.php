<?php
 function getTitre($titre){
     echo "<title> $titre</title>";
 }


 function toString($string){
     echo $string;
 }

 function getFooter(){
     include("footer.inc.php");
 }

function getHeader(){
    include("header.inc.php");
}

function getAside1(){
    include("aside1.inc.php");
}

function getAside2(){
    include("aside2.inc.php");
}


?>