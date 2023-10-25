<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    <form class="authentification_form container" method="post" name="login">
        <h1 class="login-title">Connexion</h1>
        <input type="text" class="login-input" name="username" placeholder="Nom d'utilisateur" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Mot de passe"/>
        <button type="submit" value="Se connecter" name="submit" class="login-button">Se connecter</button>
        <p class="link"><a href="registration.php">Créer un compte ?</a></p>
  </form>
    <?php
        require_once("footer.php");
    ?>
</body>
</html>