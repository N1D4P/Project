<ul>
  <?php
  // Afficher les catégories
  foreach ($categories as $category) {
      echo "<li><a href='category.php?id=" . $category['category_id'] . "'>" . $category['category_name'] . "</a></li>";
  }
  ?>
</ul>