<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Créez votre compte</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // Insertion des valeurs dans la bdd
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = $pdo->quote($username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = $pdo->quote($email);
        $password = stripslashes($_REQUEST['password']);
        $password = $pdo->quote($password);
        $creation_date = date("Y-m-d H:i:s");
        
        $query    = "INSERT into `mvtm_customer` (username, password, email, creation_date)
                     VALUES (:username, :password, :email, :creation_date)";
        $statement = $pdo->prepare($query);
        $result   = $statement->execute([
            'username' => $username,
            'password' => md5($password),
            'email' => $email,
            'creation_date' => $creation_date
        ]);
        
        if ($result) {
            echo "<div class='form'>
                  <h3>Votre compte a bien été créé.</h3><br/>
                  <p class='link'>Cliquez ici pour vous connecter <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Les champs requis sont nécessaires.</h3><br/>
                  <p class='link'>Cliquez ici pour créer un autre compte <a href='registration.php'>registration</a> .</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Création de compte</h1>
        <input type="text" class="login-input" name="username" placeholder="Nom d'utilisateur" required />
        <input type="text" class="login-input" name="email" placeholder="Adresse email">
        <input type="password" class="login-input" name="password" placeholder="Mot de passe">
        <input type="submit" name="submit" value="Enregistrer" class="login-button">
        <p class="link"><a href="login.php">Cliquez pour vous connecter</a></p>
    </form>
<?php
    }
?>
</body>
</html>