<head>
    <title>Catégories</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
<?php
  require_once("header.php");
  ?>
    <section class="hero">
      <div class="container">
        <div class="hero__image"></div>

        <div class="hero__text container--pall">
          <h2 class="purpleNeon">Des milliers de films et séries disponibles !</h2>
          <p>
            Visitez notre catalogue et découvrez ou redécouvrez toutes les séries
            et films les plus populaires de tous les temps, ou essayez nos recommandations
            les plus originales !
          </p>
          <a href="/category" class="button hero__cta">Voir Catégories</a>
        </div>
      </div>
    </section>

    <section class="feature">
      <div class="feature__content container container--pall">
        <div class="feature__intro">
          <h2>Pourquoi choisir MovieTime ?</h2>
          <p>
            Nous complétons notre catalogue chaque semaine et
            vous recommandons les contenus les plus suceptibles de vous intéresser.
          </p>
        </div>

        <div class="feature__grid">
          <div class="feature__item">
            <div class="feature__icon">
              <img src="/images/.svg" />
            </div>
            <div class="feature__title">Streaming Illimité</div>
            <div class="feature__description">
              Toutes nos offres vous font bénéficier d'un accès illimité
              à l'ensemble de notre catalogue depuis n'importe où dans le monde.
            </div>
          </div>

          <div class="feature__item">
            <div class="feature__icon">
              <img src="/images/.svg" />
            </div>
            <div class="feature__title">Multi Ecrans</div>
            <div class="feature__description">
              Avec la possibilité de regarder sur plusieurs écrans en
              simultané, vous pourrez satisfaire facilement toute la famille.
            </div>
          </div>

          <div class="feature__item">
            <div class="feature__icon">
              <img src="/images/.svg" />
            </div>
            <div class="feature__title">Qualité 4K</div>
            <div class="feature__description">
              Profitez d'une expérience visuelle inoubliable grâce à la
              disponibilité en 4K de l'ensemble de notre catalogue.
            </div>
          </div>

          <div class="feature__item">
            <div class="feature__icon"><img src="/images/.svg" /></div>
            <div class="feature__title">Paiement facilité</div>
            <div class="feature__description">
              Plusieurs moyens de paiements sont disponibles via les système de paiements les plus utilisés.
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="articles">
      <div class="article__content container container--pall">
        <h2>Derniers ajouts</h2>

        <div class="article__grid">
          <?php foreach($movies as $movie){
            echo '<a href="/movie?id=' . $movie["content_id"] . '" class="article__item">
                    <div
                      class="article__image"
                      style="background-image: url(' . $movie["cover_path"] .')"
                    ></div>
                    <div class="article__text">
                      <div class="article__author">De ' . $movie["director"] . '</div>
                      <div class="article__title">
                        ' . $movie["content_name"] . '
                      </div>
                      <div class="article__description">
                        ' . $movie["content_desc"] . '
                      </div>
                    </div>
                  </a>';
          }
        ?>

        </div>
      </div>
    </section>
  </body>