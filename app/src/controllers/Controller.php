<?php


abstract class Controller extends Db{
    // Je centralise l'url utilisée dans la fonction header de manière à ne devoir la modifier qu'ici si je passe mon site en ligne ou que je change de nom de domaine
    public function header($location){
        header("Location: http://localhost:8000" . $location);
    }

    // Je force les prochains collaborateurs et moi-même à écrire la fonction index dans leurs controlleurs afin de m'assurer du bon fonctionnement de mon code
    abstract public function index();
}
?>