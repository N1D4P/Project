<?php


class MovieController extends Controller{
    public function index(){
        $url = $_SERVER['REQUEST_URI'];
        if(str_contains($url, "?id=") && (int)explode("=", $url)[1]){
            try{
                // On vérifie si l'utilisateur a déjà laissé un avis sur ce film, pour l'ajout d'un nouvel avis et afficher la note de base sur la page
                $query = "SELECT * from mvtm_rating WHERE mvtm_content_content_id=:content_id AND mvtm_customer_customer_id=:customer_id";
                $ratingFromUser = self::getPdo()->prepare($query);
                $ratingFromUser->execute([":content_id"=>explode("=",$url)[1],
                                            ":customer_id"=>$_SESSION["id"]]);
                $ratingFromUserData = $ratingFromUser->fetch(PDO::FETCH_ASSOC);

                
                // Gestion de la notation
                if(isset($_POST['rating'])){
                    // Si aucun avis n'a été laissé par l'utilisateur, on l'ajoute
                    if(!$ratingFromUserData){
                        // On insère notre avis dans la db
                        $query = "INSERT INTO mvtm_rating(value, mvtm_content_content_id, mvtm_customer_customer_id) VALUES (:value, :content_id, :customer_id)";
                        $rating = self::getPdo()->prepare($query);
                        $rating->execute([":value"=>$_POST["rating"],
                                            ":content_id"=>explode("=", $url)[1],
                                            ":customer_id"=>$_SESSION["id"]]);
                    }
                    // Sinon, s'il est différent de la note précédente, on le modifie
                    else if($_POST['rating'] !== $ratingFromUserData["value"]){
                        $query = "UPDATE mvtm_rating SET value=:value, mvtm_content_content_id=:content_id, mvtm_customer_customer_id=:customer_id WHERE mvtm_content_content_id=:content_id AND mvtm_customer_customer_id=:customer_id";
                        $rating = self::getPdo()->prepare($query);
                        $rating->execute([":value"=>$_POST["rating"],
                                            ":content_id"=>explode("=", $url)[1],
                                            ":customer_id"=>$_SESSION["id"]]);
                    }
                    // On met à jour la valeur manuellement pour ne pas avoir à refresh la page
                    $ratingFromUserData["value"] = $_POST["rating"];
                }


                // Récupérer les catégories depuis la base de données, ainsi que les ratings et le nombre de notes
                $query = "SELECT c.content_name, c.content_desc, c.cover_path, c.content_path, c.mvtm_category_category_id category_id, ca.category_name category, ROUND(AVG(r.value),2) rating, count(r.value) votes, c.new, d.name director 
                        FROM mvtm_content c LEFT JOIN mvtm_rating r ON c.content_id = r.mvtm_content_content_id 
                        INNER JOIN mvtm_category ca ON c.mvtm_category_category_id = ca.category_id
                        INNER JOIN mvtm_director d ON d.id=c.director_id
                        WHERE c.active=1 AND content_id = " . explode("=",$url)[1] . " 
                        GROUP BY c.content_name, c.content_desc, c.cover_path, c.content_path, new, c.mvtm_category_category_id, ca.category_name, d.name";
                    // On récupère la connexion à la db depuis la classe Db
                    $stmt = self::getPdo()->prepare($query);
                    // On exécute la requête
                    $stmt->execute();
                    // On stocke le résultat dans un tableau associatif
                    $movie = $stmt->fetch(PDO::FETCH_ASSOC);
                    // Si aucun résultat n'est trouvé, on renvoie vers la page 404
                    if(!$movie) $this->header("/404");
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }

            require_once(__DIR__ . "\..\..\..\\views\movie.php");
        }
        else{
            $this->header("/404");
        }
    }
}
?>