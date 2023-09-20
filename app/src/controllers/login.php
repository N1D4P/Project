<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // Vérifier le compte
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = $pdo->quote($username);
        $password = stripslashes($_REQUEST['password']);
        $password = $pdo->quote($password);
        $query = "SELECT * FROM `mvtm_customer` WHERE username=:username AND password=:password";
        $statement = $pdo->prepare($query);
        $statement->execute(['username' => $username, 'password' => md5($password)]);
        $rows = $statement->rowCount();
        if ($rows == 1) {
            $_SESSION['id'] = $username;
            // Redirigez vers la page du tableau de bord de l'utilisateur (à créer)
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Identifiant/Mot de passe incorrect.</h3><br/>
                  <p class='link'>Cliquez ici pour <a href='login.php'>se connecter</a> à nouveau.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Connexion</h1>
        <input type="text" class="login-input" name="username" placeholder="Nom d'utilisateur" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Mot de passe"/>
        <input type="submit" value="Se connecter" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">Créer un compte</a></p>
  </form>
<?php
    }
?>
</body>
</html>