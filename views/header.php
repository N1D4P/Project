<header class="header">
    <div class="overlay has-fade"></div>

    <nav class="container container--pall flex flex-jc-sb flex-ai-c">
      <a href="/" class="header__logo">
        <img id="logo" src="./assets/images/Logo_movietime.gif" alt="MovieTime" />
      </a>

      <a id="btnHamburger" href="#" class="header__toggle hide-for-desktop">
        <span></span>
        <span></span>
        <span></span>
      </a>

      <div class="header__links hide-for-mobile">
        <a href="/">Accueil</a>
        <a href="/pricing">Offres</a>
        <a href="/category">Catégories</a>
        <?php 
        // Si l'utilisateur est connecté, j'affiche Déconnexion, sinon Connexion
          if($_SESSION["id"] !== null) echo "<a href='/logout'>Déconnexion</a>";
          else echo "<a href='/login'>Connexion</a>";
        ?>
      </div>

      <a href="/register" class="button header__cta hide-for-mobile">S'inscrire</a>
    </nav>

    <div class="header__menu has-fade">
      <a href="/">Accueil</a>
      <a href="/pricing">Offres</a>
      <a href="/category">Catégories</a>
      <?php 
        // Si l'utilisateur est connecté, j'affiche Déconnexion, sinon Connexion
        if(isset($_SESSION["id"])) echo "<a href='/logout'>Déconnexion</a>";
        else echo "<a href='/login'>Connexion</a>";
      ?>
    </div>
    <script src="./assets/js/script.js"></script>
  </header>