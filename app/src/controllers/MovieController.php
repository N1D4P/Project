<?php


class MovieController extends Db{
    public function index(){
        $url = $_SERVER['REQUEST_URI'];
        if(str_contains($url, "?id=") && (int)explode("=", $url)[1]){
            // Récupérer les catégories depuis la base de données
            $query = "SELECT c.content_name, c.content_desc, c.cover_path, c.content_path, c.mvtm_category_category_id category_id, ca.category_name category, ROUND(AVG(r.value),2) rating, new 
                    FROM mvtm_content c LEFT JOIN mvtm_rating r ON c.content_id = r.mvtm_content_content_id 
                    INNER JOIN mvtm_category ca ON c.mvtm_category_category_id = ca.category_id
                    WHERE c.active=1 AND content_id = " . explode("=",$url)[1] . " 
                    GROUP BY c.content_name, c.content_desc, c.cover_path, c.content_path, new, c.mvtm_category_category_id, ca.category_name";
            // On récupère la connexion à la db depuis la classe Db
            $stmt = self::getPdo()->prepare($query);
            // On exécute la requête
            $stmt->execute();
            // On stocke le résultat dans un tableau associatif
            $movie = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo "<pre>",var_dump($movie),"</pre>";

            require_once(__DIR__ . "\..\..\..\\views\movie.php");
        }
    }
}
?>