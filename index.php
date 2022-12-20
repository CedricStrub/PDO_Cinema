<?php

use Controller\CinemaController;
use Controller\HomeController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$ctrlHome = new HomeController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]){
        
        case "listFilms" : $ctrlCinema->listFilms(); break;
        
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;

        case "addFilm":
            if(isset($_POST["titre"])){
                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sortie = filter_input(INPUT_POST, "sortie", FILTER_SANITIZE_NUMBER_INT);
                $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
                $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT );
                $affiche = filter_input(INPUT_POST, "affiche", FILTER_SANITIZE_URL);
                $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_SPECIAL_CHARS);
                $real = filter_input(INPUT_POST, "real", FILTER_SANITIZE_NUMBER_INT);

                
                $film = [
                    "titre" => $titre,
                    "sortie" => $sortie,
                    "duree" => $duree,
                    "note" => $note,
                    "affiche" => $affiche,
                    "synopsis" => $synopsis,
                    "real" => $real
                ];
                if($titre != "" && $real != ""){
                    $ctrlCinema->addFilm($film);
                }else {
                    $ctrlCinema->addFilm(null);
                }
            } else {
                $ctrlCinema->addFilm(null);
            }
            break;
        
        case "listRealisateurs" : $ctrlCinema->listRealisateurs(); break;
        
        case "detailRealisateur" : $ctrlCinema->detailRealisateur($id); break;

        case "addRealisateur":
            if(isset($_POST["nom"])){
                $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
                $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
                $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
                $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_EMAIL );
                $portrait = filter_input(INPUT_POST, "portrait", FILTER_SANITIZE_URL);

                $realisateur = [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "sexe" => $sexe,
                    "date" => $date,
                    "portrait" => $portrait
                ];
                if($nom != "" && $prenom != "" && $sexe != "" && $date != ""){
                    $ctrlCinema->addRealisateur($realisateur);
                }else {
                    $ctrlCinema->addRealisateur(null);
                }
            } else {
                $ctrlCinema->addRealisateur(null);
            }
            break;
        
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
        
        case "detailActeur" : $ctrlCinema->detailActeur($id); break;
        
        case "addActeur":
            if(isset($_POST["nom"])){
                $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
                $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
                $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
                $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_EMAIL );
                $portrait = filter_input(INPUT_POST, "portrait", FILTER_SANITIZE_URL);

                $acteur = [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "sexe" => $sexe,
                    "date" => $date,
                    "portrait" => $portrait
                ];
                if($nom != "" && $prenom != "" && $sexe != "" && $date != ""){
                    $ctrlCinema->addActeur($acteur);
                }else {
                    $ctrlCinema->addActeur(null);
                }
            } else {
                $ctrlCinema->addActeur(null);
            }
            break;
        
        case "listGenres" : $ctrlCinema->listGenres(); break;
        
        case "detailGenre" : $ctrlCinema->detailGenre($id); break;

        case "addGenre":
            if(isset($_POST["genre"])){
                $nom = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_SPECIAL_CHARS);
                if($nom != ""){
                    $ctrlCinema->addGenre($nom);
                }else{
                    $ctrlCinema->addGenre(null);
                }
            } else {
                $ctrlCinema->addGenre(null);
            }
            break;
        
        case "listRoles" : $ctrlCinema->listRoles(); break;
        
        case "detailRole" : $ctrlCinema->detailRole($id); break;
        
        case "addRole":
            if(isset($_POST["role"])){
                $nom = filter_input(INPUT_POST, "role", FILTER_SANITIZE_SPECIAL_CHARS);
                if($nom != ""){
                    $ctrlCinema->addRole($nom);
                }else {
                    $ctrlCinema->addRole(null);
                }
            } else {
                $ctrlCinema->addRole(null);
            }
            break;

        case "addCasting":
            if(isset($_POST["film"])){
                $film = filter_input(INPUT_POST, "film", FILTER_SANITIZE_SPECIAL_CHARS);
                $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_SPECIAL_CHARS);
                $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_SPECIAL_CHARS);
                if($film != "" || $role != "" || $acteur != ""){
                    $casting = [
                        "id_film" => $film,
                        "id_role" => $role,
                        "id_acteur" => $acteur
                    ];
                    $ctrlCinema->addCasting($casting);
                }else {
                    $ctrlCinema->addCasting(null);
                }
            } else {
                $ctrlCinema->addCasting(null);
            }
            break;
        
        case "home": $ctrlHome->index(); break;
    }
}else{
    $ctrlHome->index();
}


?>