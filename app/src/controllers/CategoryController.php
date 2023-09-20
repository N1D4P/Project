<?php


class CategoryController extends Db{
    public function index(){
        // Récupérer les catégories depuis la base de données
        $query = "SELECT category_id, category_name FROM mvtm_category";
        // On récupère la connexion à la db depuis la classe Db
        $stmt = self::getPdo()->prepare($query);
        // On exécute la requête
        $stmt->execute();
        // On stocke le résultat dans un tableau associatif
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once(__DIR__ . "\..\..\..\\views\category.php");
    }
}
?>