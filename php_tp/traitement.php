<?php
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<h1>Accès interdit</h1>";
    echo '<a href="index.html">Retour</a>';
    exit;
}
 
$villes_autorisees = ['Paris', 'Lyon', 'Marseille', 'Lille'];
$loisirs_autorises = ['sport', 'lecture', 'cinema'];
$animaux_autorises = ['chien', 'chat', 'aucun'];
 
$errors = [];
$data = [];
 
if (empty($_POST['nom']) || strlen($_POST['nom']) < 2) {
    $errors[] = "Le nom est requis (2 caractères min).";
} else {
    $data['nom'] = htmlspecialchars($_POST['nom']);
}
 
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email est invalide.";
} else {
    $data['email'] = htmlspecialchars($_POST['email']);
}
 
if (empty($_POST['password']) || strlen($_POST['password']) < 8) {
    $errors[] = "Le mot de passe est requis (8 caractères min).";
}
 
if (empty($_POST['sexe']) || !in_array($_POST['sexe'], ['H', 'F'])) {
    $errors[] = "Le sexe est invalide.";
} else {
    $data['sexe'] = $_POST['sexe'];
}
 
if (empty($_POST['ville']) || !in_array($_POST['ville'], $villes_autorisees)) {
    $errors[] = "La ville est invalide.";
} else {
    $data['ville'] = $_POST['ville'];
}
 
$data['loisirs'] = [];
if (!empty($_POST['loisirs'])) {
    foreach ($_POST['loisirs'] as $loisir) {
        if (in_array($loisir, $loisirs_autorises)) {
            $data['loisirs'][] = htmlspecialchars($loisir);
        }
    }
}
 
$data['animaux'] = [];
if (!empty($_POST['animaux'])) {
    foreach ($_POST['animaux'] as $animal) {
        if (in_array($animal, $animaux_autorises)) {
            $data['animaux'][] = htmlspecialchars($animal);
        }
    }
}
 
if (!empty($errors)) {
    echo '<h1 class="text-danger">Erreurs</h1>';
    echo '<div class="alert alert-danger"><ul>';
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo '</ul></div>';
 
} else {
   
    echo '<h1 class="text-success">Merci !</h1>';
    echo '<div class="card mb-4">';
    echo '<div class="card-header">Vos informations</div>';
    echo '<ul class="list-group list-group-flush">';
    echo '<li class="list-group-item"><strong>Nom :</strong> ' . $data['nom'] . '</li>';
    echo '<li class="list-group-item"><strong>Email :</strong> ' . $data['email'] . '</li>';
    echo '<li class="list-group-item"><strong>Sexe :</strong> ' . $data['sexe'] . '</li>';
    echo '<li class="list-group-item"><strong>Ville :</strong> ' . $data['ville'] . '</li>';
   
    echo '<li class="list-group-item"><strong>Loisirs :</strong> ' . implode(', ', $data['loisirs']) . '</li>';
    echo '<li class="list-group-item"><strong>Animaux :</strong> ' . implode(', ', $data['animaux']) . '</li>';
    echo '</ul></div>';
 
    echo '<h2>Profils similaires...</h2>';
 
    $profils_serveur = [
        ['nom' => 'Alice', 'ville' => 'Paris', 'loisirs' => ['lecture']],
        ['nom' => 'Bob', 'ville' => 'Lyon', 'loisirs' => ['sport', 'cinema']],
        ['nom' => 'Claire', 'ville' => 'Paris', 'loisirs' => ['sport', 'lecture']],
    ];
   
    $resultats = [];
    foreach ($profils_serveur as $profil) {
        if ($profil['ville'] == $data['ville']) {
            $resultats[] = $profil;
        }
        elseif (!empty(array_intersect($profil['loisirs'], $data['loisirs']))) {
            $resultats[] = $profil;
        }
    }
 
    if (empty($resultats)) {
        echo "<p>Aucun profil trouvé.</p>";
    } else {
        foreach ($resultats as $res) {
            echo '<div class="card card-body mb-2">';
            echo '<strong>' . $res['nom'] . '</strong> (' . $res['ville'] . ')';
            echo '<small>Loisirs: ' . implode(', ', $res['loisirs']) . '</small>';
            echo '</div>';
        }
    }
}
 
echo '<a href="index.html" class="btn btn-secondary mt-4">Retour au formulaire</a>';
 
?>