  <head>
    <title>Catégories</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <?php
      require_once("header.html");
    ?>
    <h1>Bienvenue sur la page Catégorie !</h1>
    <ul>
      <?php
      // Afficher les catégories
      foreach ($categories as $category) {
        echo "<li><a href='/category?id=" . $category['category_id'] . "'>" . $category['category_name'] . "</a></li>";
      }
      ?>
    </ul>
  </body>