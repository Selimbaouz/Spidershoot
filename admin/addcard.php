<?php
    require '_header.php';

    //Si l'utilisateur à cliqué sur le bouton ajouter au panier
    if(isset($_POST['envoi']))
    {   //Si l'utilisateur à choisi une couleur alors :
        if(isset($_POST['choice']) AND $_POST['choice'] == 1 OR $_POST['choice'] == 2 OR $_POST['choice'] == 3)
        { //On associe l'id de la couleur avec l'id de la base de donnée
            $product = $DB->query('SELECT id FROM products WHERE id=:id', array('id' => $_POST['choice']));
            //var_dump($product);
            $panier->add($product[0]->id); //On ajoute l'id sélectionné au panier
        }
    }



    echo json_encode($_POST['choice']); //Pour l'ajax
    header('Location: ../index.php');
?>