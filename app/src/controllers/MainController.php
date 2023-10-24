<?php
class MainController extends Controller{
    public function index(){
        try{
            $query = "SELECT c.content_name, c.content_desc, c.content_id, c.cover_path, d.name director FROM mvtm_content c INNER JOIN mvtm_director d ON d.id=c.director_id WHERE c.active=1 ORDER BY c.content_id DESC LIMIT 4";
            // On récupère la connexion à la db depuis la classe Db
            $stmt = self::getPdo()->prepare($query);
            // On exécute la requête
            $stmt->execute();
            // On stocke le résultat dans un tableau associatif
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }


        require_once(__DIR__ . "\..\..\..\\views\main.php");
    }
}
?>