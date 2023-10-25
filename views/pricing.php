<head>
    <title>Catégories</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
<?php
  require_once("header.php");
  ?>
    <section class="pricing">
        <article class="pricing_card">
            <h2>Abonnement standard</h2>
            <img class="pricing_poster" src="/assets/images/haute-definition.png" />
            <ul>
                <li>1080p</li>
                <li>Films disponibles 1 semaine après sortie en salle</li>
            </ul>
            <p class="price"><span>5€</span>/mois</p>
            <button>S'abonner</button>
        </article>
        <article class="pricing_card">
            <h2>Abonnement premium</h2>
            <img class="pricing_poster" src="/assets/images/television-4k.png" />
            <ul>
                <li>4k</li>
                <li>Films disponibles 48h après sortie en salle</li>
            </ul>
            <p class="price"><span>14€</span>/mois</p>
            <button>S'abonner</button>
        </article>
    </section>

    <?php
    require_once("footer.php");
    ?>
  </body>