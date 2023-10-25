    <head>
        <title><?php echo $category["category_name"]; ?></title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <?php
            require_once("header.php");
        ?>
        <div class="title_section">
            <h1><?php echo $category["category_name"]; ?></h1>
            <p>
                <?php echo $category["category_desc"]; ?>
            </p>
        </div>
        <section id="categories" class="articles">
            <div class="article__content container">
                <h2>Films</h2>
                <ul class="article__grid categories__grid">
                    <?php 
                            // var_dump($movies);
                        foreach($movies as $movie){
                            // Affiche une balise p "New" si le film est nouveau dans la db
                            $new = $movie['new']===1 ? "<p>New !</p>" : "";
                            echo "<a href='/movie?id=" . $movie['content_id'] . "' class='article__item'>
                                    <li>
                                        <div class='article__image' style='background-image: url(" . $movie['cover_path'] .")'></div>
                                        <div class='article__text'>
                                            <h3 class='article__title'>" . $movie['content_name'] . "</h3>
                                            <p class='article__description'>" . $movie['content_desc'] ."</p>
                                        </div>
                                    </li>
                                </a>";
                        }
                    ?>
                </ul>
            </div>
        </section>
        <?php
    require_once("footer.php");
    ?>
    </body>
