<?php
require_once("../models/db.php");

class MainController{
    
    // Récupérer les catégories depuis la base de données
    $query = "SELECT category_id, category_name FROM mvtm_category";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>