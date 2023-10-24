<?php
// Afin de modifier la variable globale $_SESSION, j'ouvre la session

class LoginController extends Controller{
    public function index(){
            if (isset($_POST['username'])) {
                // On récupère le username rentré par l'utilisateur, on supprime les caractères spéciaux
                $username = htmlspecialchars($_REQUEST['username']);
                // On récupère le password rentré par l'utilisateur
                $password = htmlspecialchars($_REQUEST['password']);
                // On écrit notre requête
                $query = "SELECT * FROM `mvtm_customer` WHERE username=:username";
                // On insère dans le bloc try tout le code qui peut générer une erreur
                try{
                    // On prépare la requête
                    $verify = self::getPdo()->prepare($query);
                    // On l'exécute
                    $verify->execute(['username' => $username]);
                    // Si le résultat de la requête retourne quelque chose
                    if($result = $verify->fetch(PDO::FETCH_ASSOC)){
                        // On vérifie si le mot de passe dans la db est bien la version hash du mot de passe entré par l'utilisateur
                        if(password_verify($password, $result['password'])){
                            // Si c'est le cas, on stocke l'id de l'utilisateur et on le redirige vers la page d'accueil
                            $_SESSION['id'] = $result["customer_id"];
                            $this->header("/");
                        }
                        // Sinon, le mot de passe est mauvais et on affiche le message d'erreur
                        else{
                            echo "<h3>Mot de passe incorrect.</h3><br/>";
                        }
                    // Si la requête ne retourne rien, on affiche que l'identifiant est incorrect
                    }
                    else {
                        echo "<h3>Identifiant incorrect.</h3><br/>";
                    }
                // Si une erreur SQL ou autre a été soulevée, on affiche le message d'erreur
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
            // On affiche la vue de la page Login
            require_once(__DIR__ . "\..\..\..\\views\login.php");
    }
}
?>