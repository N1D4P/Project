<?php


class AdminController extends Controller{
    public function index(){
        if(isset($_SESSION["id"])){
            // On récupère le rôle de l'utilisateur connecté
            $query = "SELECT r.role FROM `mvtm_customer` c INNER JOIN mvtm_role r ON c.role_id = r.id WHERE c.customer_id=:id";
            // On récupère la connexion à la db depuis la classe Db
            $stmt = self::getPdo()->prepare($query);
            // On exécute la requête
            $stmt->execute([":id"=>$_SESSION["id"]]);
            // On stocke le résultat dans un tableau associatif
            $user_role = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Si l'utilisateur n'est pas un admin, on le redirige sur la page d'accueil
            if($user_role["role"] !== "admin"){
                $this->header("/");
            }
            // Sinon on peut lui afficher la vue et effectuer les requêtes nécessaires
            else{
                if(isset($_POST["delete_movie"])){
                    $request = "DELETE FROM mvtm_content WHERE content_id=:id";
                    $action_request = self::getPdo()->prepare($query);
                    $action_request->execute([":id"=>$_POST["delete_movie"]]);
                }
                else if(isset($_POST["update_movie"])){
                    
                }
                else if(isset($_POST["create_movie"])){
                    
                }
                else if(isset($_POST["delete_category"])){
                    $request = "DELETE FROM mvtm_category WHERE category_id=:id";
                    $action_request = self::getPdo()->prepare($query);
                    $action_request->execute([":id"=>$_POST["delete_category"]]);
                }
                else if(isset($_POST["update_category"])){
                    
                }
                else if(isset($_POST["create_category"])){
                    
                }

                // On récupère les films
                $query = "SELECT * FROM mvtm_content";
                // On récupère la connexion à la db depuis la classe Db
                $movies_request = self::getPdo()->prepare($query);
                // On exécute la requête
                $movies_request->execute();
                // On stocke le résultat dans un tableau associatif
                $movies = $movies_request->fetchAll(PDO::FETCH_ASSOC);

                // On récupère les catégories
                $query = "SELECT * FROM mvtm_category";
                // On récupère la connexion à la db depuis la classe Db
                $categories_request = self::getPdo()->prepare($query);
                // On exécute la requête
                $categories_request->execute();
                // On stocke le résultat dans un tableau associatif
                $categories = $categories_request->fetchAll(PDO::FETCH_ASSOC);

                require_once(__DIR__ . "\..\..\..\\views\admin.php");
            }
        }
        // Si l'utilisateur n'est pas connecté, on le redirige sur la page d'accueil
        else{
            $this->header("/");
        }
    }
}
?>