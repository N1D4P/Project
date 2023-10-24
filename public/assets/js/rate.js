const selectStar = (value) => {
    // On récupère le bouton submit du formulaire de vote
    let ratingButton = document.getElementById("rating");
    // On optimise la fonction pour que les instructions ne soient lues que si l'utilisateur clique sur une valeur différente de celle sélectionnée
    if(value !== ratingButton.value){
        // On récupère toutes les étoiles
        let stars = document.querySelectorAll(".star");
        // On attribue à chaque étoile l'étoile pleine si on est en dessous de la note de l'utilisateur, vide sinon
        for(let i=0; i<5; i++){
            if(i<value)
                stars[i].src = "./assets/images/star_full.png"
            else
                stars[i].src = "./assets/images/star.png"
        }
        // On change la value du bouton submit pour qu'à la validation du formulaire on puisse effectuer notre requête avec la bonne note
        ratingButton.value = value;
    }
}