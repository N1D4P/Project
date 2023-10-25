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
                    <a href="" >
                        <img class="icon" src="/assets/images/add.png" />
                    </a>
                </div>
                <ul class="article__grid categories__grid">
                    <?php 
                            // var_dump($movies);
                        foreach($movies as $movie){
                            echo "<li class='article__item article__editable'>
                                        <div class='icons_actions'>
                                            <form action='' method='post'>
                                                <button type='submit' name='delete_movie' value=" . $movie['content_id'] . ">
                                                    <img class='icon' src='/assets/images/delete.png' />
                                                </button>
                                            </form>
                                            <form action='' method='post'>
                                                <button type='submit' name='update_movie' value=" . $movie['content_id'] . ">
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
                    <a href="" >
                        <img class="icon" src="/assets/images/add.png" />
                    </a>
                </div>
                <ul class="article__grid categories__grid">
                    <?php 
                        foreach ($categories as $category) {
                            echo '<li class="article__item article__editable">
                                    <div class="icons_actions">
                                        <button type="submit" name="delete_category" value=' . $category["category_id"] . '>
                                            <img class="icon" src="/assets/images/delete.png" />
                                        </button>
                                        <button type="submit" name="update_category" value=' . $category["category_id"] . '>
                                            <img class="icon" src="/assets/images/edit.png" />
                                        </button>
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