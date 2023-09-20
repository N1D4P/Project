<!-- category.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Catégorie</title>
</head>
<body>
    <?php
    // Vérifier si un ID de catégorie est passé en paramètre d'URL
    if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
        $categoryId = $_GET['category_id'];

        // Récupérer les informations de la catégorie à partir de la base de données
        $query = "SELECT category_name, contenu FROM categories WHERE category_id = :category_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si la catégorie existe
        if ($category) {
            echo "<h1>" . $category['category_name'] . "</h1>";
            echo "<p>" . $category['contenu'] . "</p>";
        } else {
            echo "<p>Catégorie non trouvée.</p>";
        }
    } else {
        echo "<p>Aucune catégorie sélectionnée.</p>";
    }
    ?>
</body>
</html>
