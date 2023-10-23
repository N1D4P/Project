<?php
// Afin de modifier la variable globale $_SESSION, j'ouvre la session
session_start();

class RegisterController extends Controller{
    public function index(){
        // Si l'utilisateur souhaite s'inscrire
        if (isset($_REQUEST['username'])) {
            // On récupère tous les champs renseignés par l'utilisateur, en supprimant les caractères spéciaux
            // L'idéal serait de faire des regex sur chaque champs
            $firstname = htmlspecialchars($_REQUEST['firstname']);
            $lastname = htmlspecialchars($_REQUEST['lastname']);
            $username = htmlspecialchars($_REQUEST['username']);
            $email    = htmlspecialchars($_REQUEST['email']);
            $password = htmlspecialchars($_REQUEST['password']);
            // On récupère la date d'aujourd'hui dans le fuseau horaire français
            $creation_date = new DateTime("now", new DateTimeZone("Europe/Paris"));

            // Si l'utilisateur n'a pas rempli un des champs, on lui demande de le faire
            if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)){
                echo "<h3>Merci de compléter tous les champs";
            }
            // Sinon, on crée l'utilisateur
            else{
                $query    = "INSERT into `mvtm_customer` (customer_firstname, customer_lastname, username, password, email, creation_date)
                             VALUES (:firstname, :lastname, :username, :password, :email, :creation_date)";
    
                try{
                    // On prépare la requête
                    $statement = self::getPdo()->prepare($query);
                    // On exécute la requête
                    $result   = $statement->execute([
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'username' => $username,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'email' => $email,
                        'creation_date' => $creation_date->format("Y-m-d H:i:s")
                    ]);
                    if ($result) {
                        $this->header("/login");
                    }
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
                // Si la requête s'est bien passée, on renvoie l'utilisateur sur la page de connexion
            }
        }
        // On affiche la vue de la page Register
        require_once(__DIR__ . "\..\..\..\\views\\register.php");
    }
}
?>