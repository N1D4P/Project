<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Créez votre compte</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <form class="form" action="" method="post">
        <h1 class="login-title">Création de compte</h1>
        <input type="text" class="login-input" name="firstname" placeholder="Prénom" required />
        <input type="text" class="login-input" name="lastname" placeholder="Nom" required />
        <input type="text" class="login-input" name="username" placeholder="Nom d'utilisateur" required />
        <input type="text" class="login-input" name="email" placeholder="Adresse email">
        <input type="password" class="login-input" name="password" placeholder="Mot de passe">
        <input type="submit" name="submit" value="Enregistrer" class="login-button">
        <p class="link"><a href="login.php">Cliquez pour vous connecter</a></p>
    </form>
</body>
</html>