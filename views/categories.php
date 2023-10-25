  <head>
    <title>Catégories</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <?php
      require_once("header.php");
    ?>
    <section class="articles" id="categories">
      <div class="article__content container">
        <h1>Catégories</h1>
        <ul class="article__grid categories__grid">
          <?php
          // Afficher les catégories
          foreach ($categories as $category) {
            echo '<li class="article__item">
                    <a href="/category?id=' . $category["category_id"] . '">
                      <div class="article__image" style="background-image: url(' . $category["cover_path"] .')"></div>
                        <div class="article__text">
                          <div class="article__title">
                            ' . $category["category_name"] . '
                          </div>
                          <div class="article__description">
                            ' . $category["category_desc"] . '
                          </div>
                        </div>
                    </a>
                  </li>';
          }
          ?>
        </ul>
        </div>
    </section>

        <?php
    require_once("footer.php");
    ?>
    </body>