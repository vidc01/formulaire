<?php
/*echo $_POST ["vall"]+ $_POST ["vall2"];
echo "<br>";
echo $_POST ["vall"]- $_POST ["vall2"];
echo "<br>";
echo  $_POST ["vall"]* $_POST ["vall2"];*/
 
if ( isset($_POST["nombre1"])  ) {

    $a = $_POST["nombre1"];
    $b = $_POST["nombre2"];
    $op = $_POST["op"];
 
    if ($op == "addition") {
        echo "Le résultat de l'addition est : " . ($a + $b);
    } elseif ($op == "soustraction") {
        echo "Le résultat de la soustraction est : " . ($a - $b);
    } elseif ($op == "multiplication") {
        echo "Le résultat de la multiplication est : " . ($a * $b);
    }
 
}
     
 
 
