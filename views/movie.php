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
    <p><?php echo $movie["content_desc"]; ?></p>
    <p>Rating : <?php echo $movie["rating"] ?></p>
    <video controls width="500">
        <source src=<?php echo $movie["content_path"] ?> >
    </video>
    <?php 
        // echo "<img src='" . $movie['cover_path'] . "'/>";
    ?>
</body>
