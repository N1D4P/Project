<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Catégories</title>
        <link rel="stylesheet" href="/css/style.css">
        <title>MovieTime</title>
    </head>
    <body>
        <?php
            require_once("header.php");
        ?>
        <h1 id="admin_title">Administrez vos films et catégories !</h1>
        <section id="movies" class="articles admin_section">
            <div class="article__content container">
                <div class="add">
                    <h2>Films</h2>
                    <form method="post">
                        <button name="action" value="create" type="submit">
                            <img class="icon" src="/assets/images/add.png" />
                        </button>
                    </form>
                </div>
                <!-- Si on a cliqué sur le bouton ajouter ou modifier -->
                <?php if(isset($_POST["action"])) { ?>
                    <form id="movie_form" method="post">
                        <input type="name" name="content_name" placeholder="Titre">
                        <textarea name="content_desc" placeholder="Description"></textarea>
                        <input type="file" name="cover_path" placeholder="Poster">
                        <input type="file" name="content_path" placeholder="Film">
                        <label for="new">Ancienneté</label>
                        <select name="new">
                            <option value="1">Nouveau</option>
                            <option value="0">Ancien</option>
                        </select>
                        <label for="new">Visibilité</label>
                        <select name="active">
                            <option value="1">Actif</option>
                            <option value="0">Désactivé</option>
                        </select>   
                        <label for="new">Catégorie</label>
                        <select name="mvtm_category_category_id">
                            <option value="1">Nouveau</option>
                        </select>
                        <input type="text" name="director_id" placeholder="Réalisateur">
                        <?php 
                            if($_POST["action"] === "create")
                                echo '<button type="submit" name="create">Créer</button>';
                            else
                                echo '<button type="submit" name="update">Créer</button>';
                        ?>
                    </form>
                <?php } ?>
                <ul class="article__grid categories__grid">
                    <?php 
                            // var_dump($movies);
                        foreach($movies as $movie){
                            echo "<li class='article__item article__editable'>
                                        <div class='icons_actions'>
                                            <form method='post'>
                                                <button name='delete' value='" . $movie["content_id"] . "' type='submit'>
                                                    <img class='icon' src='/assets/images/delete.png' />
                                                </button>
                                            </form>
                                            <form action='' method='post'>
                                                <button type='submit' name='action' value='update'>
                                                    <img class='icon' src='/assets/images/edit.png' />
                                                </button>
                                            </form>
                                        </div>
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

        <section id="categories" class="articles admin_section">
            <div class="article__content container">
                <div class="add">
                    <h2>Catégories</h2>
                    <form method="post">
                        <button name="action_category" value="create" type="submit">
                            <img class="icon" src="/assets/images/add.png" />
                        </button>
                    </form>
                </div>

                <?php if(isset($_POST["action_category"])) { ?>
                    <form id="movie_form" method="post">
                        <input type="text" name="category_name" placeholder="Nom de la catégorie" <?php if($_POST["action_category"]!=="create") echo "value='" . htmlspecialchars($categoryUpdated['category_name']) . "'"; ?> >
                        <input type="text" name="category_desc" placeholder="Description" <?php if($_POST["action_category"]!=="create") echo "value='" . htmlspecialchars($categoryUpdated['category_desc']) . "'"; ?>>
                        <label for="new">Visibilité</label>
                        <select name="active" >
                            <option value="1" <?php if($_POST["action_category"]!=="create") echo $categoryUpdated['active']===1 ? "selected='selected'" : ""; ?>>Actif</option>
                            <option value="0" <?php if($_POST["action_category"]!=="create") echo $categoryUpdated['active']===0 ? "selected='selected'" : ""; ?>>Désactivé</option>
                        </select>   
                        <?php 
                            if($_POST["action_category"] === "create")
                                echo '<button type="submit" name="create_category">Créer</button>';
                            else
                                echo '<button type="submit" name="update_category" value="' . $categoryUpdated['category_id'] . '">Modifier</button>';
                        ?>
                    </form>
                <?php } ?>

                <ul class="article__grid categories__grid">
                    <?php 
                        foreach ($categories as $category) {
                            echo '<li class="article__item article__editable">
                                    <div class="icons_actions">
                                        <form method="post">
                                            <button type="submit" name="delete_category" value=' . $category["category_id"] . '>
                                                <img class="icon" src="/assets/images/delete.png" />
                                            </button>
                                        </form>
                                        <form method="post">
                                            <button name="action_category" value="' . $category["category_id"] . '" type="submit">
                                                <img class="icon" src="/assets/images/edit.png" />
                                            </button>
                                        </form>
                                    </div>
                                    <a href="/category?id=' . $category["category_id"] . '">
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
</html>