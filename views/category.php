    <head>
        <title><?php echo $category["category_name"]; ?></title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <?php
            require_once("header.html");
        ?>
        <h1><?php echo $category["category_name"]; ?></h1>
        <p>
            <?php echo $category["category_desc"]; ?>
        </p>
        <h2>Films</h2>
        <ul>
            <?php 
                    // var_dump($movies);
                foreach($movies as $movie){
                    // Affiche une balise p "New" si le film est nouveau dans la db
                    $new = $movie['new']===1 ? "<p>New !</p>" : "";
                    echo "<a href='/movie?id=" . $movie['content_id'] . "'>
                            <li>
                                <h3>" . $movie['content_name'] . "</h3>
                                <p>" . $movie['content_desc'] ."</p>
                                <img src='" . $movie['cover_path'] . "'/>
                            </li>
                        </a>";
                }
            ?>
        </ul>
    </body>
