<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    <form class="authentification_form container" action="" method="post">
        <h1 class="login-title">Création de compte</h1>
        <input type="text" class="login-input" name="lastname" placeholder="Nom" required />
        <input type="text" class="login-input" name="firstname" placeholder="Prénom" required />
        <input type="text" class="login-input" name="username" placeholder="Nom d'utilisateur" required />
        <input type="text" class="login-input" name="email" placeholder="Adresse email" required>
        <input type="password" class="login-input" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="submit" value="Enregistrer" class="login-button">Enregistrer</button> 
    </form>
    <?php
        require_once("footer.php");
    ?>
</body>
</html>