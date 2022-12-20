<?php ob_start(); ?>


<h1>HOME PAGE</h1>

<?php

$titre = "Acceuil";
$titre_secondaire = "Bienvenue";
$contenu = ob_get_clean();
require "view/template.php";