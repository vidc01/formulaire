
<?php

/*
function mirror($chaine) {
    $inverse = ""; // on initialise une chaîne vide
    
    // on parcourt la chaîne depuis la fin jusqu'au début
    for ($i = strlen($chaine) - 1; $i >= 0; $i--) {
        $inverse .= $chaine[$i]; // on ajoute chaque caractère à la fin de $inverse
    }

    return $inverse; // on retourne la chaîne inversée
}

// Exemple d'utilisation :
echo mirror("ici c paris"); // affiche "tset"
*/


$jour = "samedi";

switch ($jour) {
    case "lundi":
        echo "C'est chiant";
        break;
    case "mardi":
        echo "c chiant";
        break;
    case "mercredi":
        echo "c chiant le mercredi";
        break;
    case "jeudi":
        echo "Ptn c chiant ";
        break;
    case "vendredi":
        echo "c chiant";
        break;
    case "samedi":
    case "dimanche":
        echo "C'est le week-end !";
        break;
    default:
        echo "Jour inconnu.";
        break;
}
