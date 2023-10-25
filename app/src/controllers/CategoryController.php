<?php


class CategoryController extends Controller{
    public function index(){
        $url = $_SERVER['REQUEST_URI'];
        // Si on affiche une catégorie en particulier
        if(str_contains($url, "?")){
            // Récupérer les catégories depuis la base de données
            $query = "SELECT category_desc, category_name FROM mvtm_category WHERE category_id = " . explode("=",$url)[1];
            // On récupère la connexion à la db depuis la classe Db
            $stmt = self::getPdo()->prepare($query);
            // On exécute la requête
            $stmt->execute();
            // On stocke le résultat dans un tableau associatif
            $category = $stmt->fetch(PDO::FETCH_ASSOC);

            // Récupérer les catégories depuis la base de données
            $query = "SELECT content_id, content_name, content_desc, cover_path, new FROM mvtm_content WHERE active=1 AND  mvtm_category_category_id = " . explode("=",$url)[1];
            // On récupère la connexion à la db depuis la classe Db
            $stmt = self::getPdo()->prepare($query);
            // On exécute la requête
            $stmt->execute();
            // On stocke le résultat dans un tableau associatif
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            require_once(__DIR__ . "\..\..\..\\views\category.php");
        }
        // Si on affiche toutes les catégories
        else{
            // Récupérer les catégories depuis la base de données, ainsi que l'image du dernier film inséré
            $query = "SELECT c.category_id, c.category_name, c.category_desc, content.cover_path FROM mvtm_category c INNER JOIN mvtm_content content ON mvtm_category_category_id = category_id ORDER BY content.content_id DESC";
            // On récupère la connexion à la db depuis la classe Db
            $stmt = self::getPdo()->prepare($query);
            // On exécute la requête
            $stmt->execute();
            // On stocke le résultat dans un tableau associatif
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            require_once(__DIR__ . "\..\..\..\\views\categories.php");
        }
    }
}
?>