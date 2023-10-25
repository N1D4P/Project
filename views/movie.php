<head>
    <title><?php echo $movie[""]; ?></title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    <section id="movie" style=<?= "\"background-image:url('" . $movie["cover_path"] . "')\"" ?>>
        <div id="content">
            <div>
                <h1><?php echo $movie["content_name"]; ?></h1>
                <?php if($movie["new"] === 1 ) echo "<p>NEW</p>"; ?>
            </div>
            <a href=<?php echo "/category?id=" . $movie["category_id"]; ?>><?php echo $movie["category"]; ?></a>
            <p><strong>Réalisateur :</strong> <?php echo $movie["director"]; ?></p>
            <p><?php echo $movie["content_desc"]; ?></p>
            <p class="no_margin"><strong>Note globale :</strong> <?php echo $movie["rating"] ?></p>
            <p class="no_margin">De <?= $movie["votes"] ?> avis</p>
        
        
        <?php 
        // Seuls les utilisateurs connectés peuvent laisser un avis et voir le film
            if(isset($_SESSION["id"])){
                echo "<form action='' method='post'><p class='no_margin'>Votre note : </p><div>";
                for($i=1; $i<6; $i++){
                    $star = $i<=$ratingFromUserData["value"] ? "star_full.png" : "star.png";
                    echo "<img class='star' style='width:30px;height:30px;' 
                            onClick='selectStar($i)' 
                            src='./assets/images/$star' />" ;
                }
                // On affiche la notation
                echo "</div><button type='submit' id='rating' name='rating' value='". $ratingFromUserData["value"] ."'>Valider</button>
                    </form></div>";
                // On affiche la vidéo du film
                echo'<video controls width="500">
                        <source src=<?php echo $movie["content_path"] ?> >
                    </video>';
            }
            else echo '</div><div id="not_connected">
                            <img src="./assets/images/declin.png" alt="Not allowed to see the video"/>
                            <p>Vous ne pouvez pas visionner ce film sans être connecté.</p>
                        </div>';
        ?>
    </section>
    <?php
    require_once("footer.php");
    ?>
    <script src="./assets/js/rate.js" ></script>
</body>
