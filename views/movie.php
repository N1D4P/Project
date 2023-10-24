<head>
    <title><?php echo $movie[""]; ?></title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    <h1><?php echo $movie["content_name"]; ?></h1>
    <a href=<?php echo "/category?id=" . $movie["category_id"]; ?>><?php echo $movie["category"]; ?></a>
    <p><?php if($movie["new"] === 1 ) echo "NEW"; ?></p>
    <p>Réalisateur : <?php echo $movie["director"]; ?></p>
    <p><?php echo $movie["content_desc"]; ?></p>
    <p>Rating : <?php echo $movie["rating"] ?></p>
    <p>De <?= $movie["votes"] ?> avis</p>
    <p>Votre note : 
        <?php 
            echo "<form action='' method='post'>";
            for($i=1; $i<6; $i++){
                $star = $i<=$ratingFromUserData["value"] ? "star_full.png" : "star.png";
                echo "<img class='star' style='width:30px;height:30px;background-color:white;' 
                        onClick='selectStar($i)' 
                        src='./assets/images/$star' />" ;
            }
            echo "<button type='submit' id='rating' name='rating' value='". $ratingFromUserData["value"] ."'>Valider</button>
                </form>";
        ?>
    </p>
    <?php
        if(!empty($_SESSION["id"])){
            echo'<video controls width="500">
                    <source src=<?php echo $movie["content_path"] ?> >
                </video>';
        }
        else echo '<div>
                        <img src="./assets/images/declin.png" alt="Not allowed to see the video"/>
                        <p>Vous ne pouvez pas visionner ce film sans être connecté.</p>
                    </div>';
    ?>
    <script src="./assets/js/rate.js" ></script>
</body>
