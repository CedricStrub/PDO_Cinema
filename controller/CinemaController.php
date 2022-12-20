<?php

namespace Controller;
use Model\Connect;

class CinemaController
{

    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        $requeteFilms = $pdo->query("
            SELECT f.id_film, f.id_realisateur, f.titre, f.annee_sortie_france, TIME_FORMAT(SEC_TO_TIME(f.duree_minutes*60),'%hh %im') duree, f.note, p.prenom, p.nom, p.portrait, f.synopsis, f.affiche
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
        ");
        require "view/film/listFilms.php";
    }

    public function detailFilm($id)
    {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("
            SELECT f.id_realisateur, f.titre, f.annee_sortie_france annee, TIME_FORMAT(SEC_TO_TIME(f.duree_minutes*60),'%hh %im') duree, f.note, f.synopsis, f.affiche, p.portrait, p.nom, p.prenom
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE id_film = :id
        ");
        $requeteFilm->execute(["id" => $id]);
        $requeteCasting = $pdo->prepare("
            SELECT r.id_role, p.nom, p.prenom, r.nom_role, r.portrait
            FROM jouer c
            INNER JOIN acteur a ON c.id_acteur = a.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            INNER JOIN role r ON c.id_role = r.id_role
            WHERE c.id_film = :id;
        ");
        $requeteCasting->execute(["id" => $id]);
        require "view/film/detailFilm.php";
    }

    public function addFilm($film)
    {
        if ($film != null) {
            $pdo = Connect::seConnecter();
            $requeteFilm = $pdo->prepare("
            INSERT INTO film
            VALUES (0, :titre, :sortie, :duree, :note, :affiche, :synopsis, :real)
            ");
            $requeteFilm->execute([
                "titre" => $film["titre"],
                "sortie" => $film["sortie"],
                "duree" => $film["duree"],
                "note" => $film["note"],
                "affiche" => $film["affiche"],
                "synopsis" => $film["synopsis"],
                "real" => $film["real"]
            ]);
            
        }
        $pdo = Connect::seConnecter();
        $requeteReal = $pdo->query("
        SELECT r.id_realisateur, p.prenom, p.nom
        FROM realisateur r
        INNER JOIN personne p ON r.id_personne = p.id_personne
        ");
        require "view/film/addFilm.php";
    }

    public function listRealisateurs()
    {
        $pdo = Connect::seConnecter();
        $requeteReal = $pdo->query("
            SELECT r.id_realisateur, p.prenom, p.nom, p.sexe, p.date_naissance, p.portrait
            FROM realisateur r
            INNER JOIN personne p ON r.id_personne = p.id_personne
        ");
        require "view/real/listRealisateurs.php";
    }

    public function detailRealisateur($id)
    {
        $pdo = Connect::seConnecter();
        $requeteReal = $pdo->prepare("
            SELECT p.nom, p.prenom, p.sexe, p.sexe, YEAR(now()) - YEAR(p.date_naissance) age
            FROM realisateur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
            WHERE a.id_realisateur = :id;
        ");
        $requeteReal->execute(["id" => $id]);
        $requeteFilm = $pdo->prepare("
        SELECT f.id_film, f.titre, f.affiche, TIME_FORMAT(SEC_TO_TIME(f.duree_minutes*60),'%hh %im') duree, f.note, f.annee_sortie_france annee
        FROM film f
        WHERE f.id_realisateur = :id;
        ");
        $requeteFilm->execute(["id" => $id]);
        require "view/real/detailRealisateur.php";
    }

    public function addRealisateur($real)
    {
        if ($real != null) {
            $pdo = Connect::seConnecter();
            $requeteReal = $pdo->prepare("
            INSERT INTO personne
            VALUES (0, :nom, :prenom, :sexe, :date, :portrait)
            ");
            $requeteReal->execute([
                "nom" => $real["nom"],
                "prenom" => $real["prenom"],
                "sexe" => $real["sexe"],
                "date" => $real["date"],
                "portrait" => $real["portrait"],
            ]);
            $requeteReal = $pdo->prepare("
            INSERT INTO realisateur
            SELECT 0, p.id_personne
            FROM personne p
            WHERE p.nom = :nom AND p.prenom = :prenom AND p.date_naissance = :date 
            ");
            $requeteReal->execute([
                "nom" => $real["nom"],
                "prenom" => $real["prenom"],
                "date" => $real["date"],
            ]);
        }
        require "view/real/addRealisateur.php";
    }

    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        $requeteActeurs = $pdo->query("
            SELECT a.id_acteur, p.prenom, p.nom, p.sexe, p.date_naissance, p.portrait
            FROM acteur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
        ");
        require "view/acteur/listActeurs.php";
    }

    public function detailActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requeteActeur = $pdo->prepare("
            SELECT p.nom, p.prenom, p.sexe, YEAR(now()) - YEAR(p.date_naissance) age
            FROM acteur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
            WHERE a.id_acteur = :id;
        ");
        $requeteActeur->execute(["id" => $id]);
        $requeteFilm = $pdo->prepare("
            SELECT f.id_film, f.titre, f.affiche, TIME_FORMAT(SEC_TO_TIME(f.duree_minutes*60),'%hh %im') duree, f.note, f.annee_sortie_france annee
            FROM jouer c
            INNER JOIN film f ON c.id_film = f.id_film
            WHERE c.id_acteur = :id;
        ");
        $requeteFilm->execute(["id" => $id]);
        require "view/acteur/detailActeur.php";
    }

    public function addActeur($acteur)
    {
        if ($acteur != null) {
            $pdo = Connect::seConnecter();
            $requeteActeur = $pdo->prepare("
            INSERT INTO personne
            VALUES (0, :nom, :prenom, :sexe, :date, :portrait)
            ");
            $requeteActeur->execute([
                "nom" => $acteur["nom"],
                "prenom" => $acteur["prenom"],
                "sexe" => $acteur["sexe"],
                "date" => $acteur["date"],
                "portrait" => $acteur["portrait"],
            ]);
            $requeteActeur = $pdo->prepare("
            INSERT INTO acteur
            SELECT 0, p.id_personne
            FROM personne p
            WHERE p.nom = :nom AND p.prenom = :prenom AND p.date_naissance = :date 
            ");
            $requeteActeur->execute([
                "nom" => $acteur["nom"],
                "prenom" => $acteur["prenom"],
                "date" => $acteur["date"],
            ]);
        }
        require "view/acteur/addActeur.php";
    }

    public function listGenres()
    {
        $pdo = Connect::seConnecter();
        $requeteGenres = $pdo->query("
        SELECT g.id_genre, g.nom_genre, f.affiche
        FROM genre g
        INNER JOIN associer_genre ag ON g.id_genre = ag.id_genre
        INNER JOIN film f ON ag.id_film = f.id_film
        ORDER BY RAND()
        ");
        require "view/genre/listGenres.php";
    }

    public function detailGenre($id)
    {
        $pdo = Connect::seConnecter();
        $requeteGenre = $pdo->prepare("
            SELECT f.id_film, f.titre, f.affiche, TIME_FORMAT(SEC_TO_TIME(f.duree_minutes*60),'%hh %im') duree, f.note, f.annee_sortie_france annee, g.nom_genre
            FROM associer_genre ag
            INNER JOIN film f ON ag.id_film = f.id_film
            INNER JOIN genre g ON ag.id_genre = g.id_genre
            WHERE ag.id_genre = :id;
        ");
        $requeteGenre->execute(["id" => $id]);
        $Genre = $pdo->prepare("
            SELECT g.nom_genre
            FROM genre g
            WHERE g.id_genre = :id;
        ");
        $Genre->execute(["id" => $id]);
        require "view/genre/detailGenre.php";
    }

    public function addGenre($nom)
    {
        if ($nom != null) {
            $pdo = Connect::seConnecter();
            $addGenre = $pdo->prepare("
            INSERT INTO genre
            VALUES(0,:n)
            ");
            $addGenre->execute(["n" => $nom]);
        }
        require "view/genre/addGenre.php";
    }

    public function listRoles()
    {
        $pdo = Connect::seConnecter();
        $requeteRoles = $pdo->query("
            SELECT r.id_role, r.nom_role, r.portrait
            FROM role r
        ");
        require "view/role/listRoles.php";
    }

    public function detailRole($id)
    {
        $pdo = Connect::seConnecter();
        $requeteRole = $pdo->prepare("
        SELECT a.id_acteur, f.titre, f.annee_sortie_france annee, p.portrait, p.nom, p.prenom
        FROM jouer j
        INNER JOIN film f ON j.id_film = f.id_film
        INNER JOIN acteur a ON j.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        INNER JOIN role r ON j.id_role = r.id_role
        WHERE j.id_role = :id
        ");
        $requeteRole->execute(["id" => $id]);
        $Role = $pdo->prepare("
            SELECT r.nom_role
            FROM role r
            WHERE r.id_role = :id;
        ");
        $Role->execute(["id" => $id]);
        require "view/role/detailRole.php";
    }


    public function addRole($nom)
    {
        if ($nom != null) {
            $pdo = Connect::seConnecter();
            $addRole = $pdo->prepare("
            INSERT INTO role
            VALUES(0,:n)
            ");
            $addRole->execute(["n" => $nom]);
        }
        require "view/role/addRole.php";
    }

    public function addCasting($cast)
    {
        if($cast != null){
            $pdo = Connect::seConnecter();
            $addCast = $pdo->prepare("
            INSERT INTO jouer
            VALUES(:f,:a,:r)
            ");
            $addCast->execute(["f" => $cast["id_film"],"a" => $cast["id_acteur"],"r" => $cast["id_role"]]);
        }
        $pdo = Connect::seConnecter();
        $requeteRoles = $pdo->query("
        SELECT r.id_role, r.nom_role
        FROM role r
    ");
        $pdo = Connect::seConnecter();
        $requeteActeurs = $pdo->query("
        SELECT a.id_acteur, p.nom, p.prenom
        FROM acteur a
        INNER JOIN personne p ON a.id_personne = p.id_personne
    ");
        $pdo = Connect::seConnecter();
        $requeteFilms = $pdo->query("
        SELECT f.id_film, f.titre, f.annee_sortie_france annee
        FROM film f
    ");
        
    require "view/addCasting.php";
    }

}