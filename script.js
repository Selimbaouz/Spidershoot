$(function(){

    /** VARIABLES **/
    var $carrousel = $('#carrousel_first_img'), // on cible le bloc du carrousel
        $img = $('#carrousel_first_img img'), // on cible les images contenues dans le carrousel
        $imgMin = $('#carrousel_second_img img'),
        $thisImg = $('#carrousel_second_img ul').children('li'),
        indexImg = $img.length - 1, // on définit l'index du dernier élément
        i = 0, // on initialise un compteur
        $currentImg = $img.eq(i), // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)
        $currentImgMin = $imgMin.eq(i), // on cible l'index de l'image miniature
        $blackProduct = $('.Black'), //Boutton produit noir
        $blueProduct = $('.Blue'), //Boutton produit bleu
        $redProduct = $('.Red'), //Boutton produit rouge
        $closeCard = $('.close_card'), // x fermeture du panier à droite
        $menuNav = $('#menu_logo'), //Boutton ouverture navigation version mobile
        $closeMenuNav = $('.close_menu_nav'); //x fermeture navigation version mobile

    /** INTRODUCTION **/
    $img.css('display', 'none'); // on cache les images
    $currentImg.css('display', 'block'); // on affiche seulement l'image courante
    $imgMin.css('opacity','0.4'); //On met toutes les images miniatures en opacité 0.4
    $imgMin.eq(i).css('opacity','1'); //On met l'image miniature courante (la 1ère) sans opacité

    /** MENU LEFT MOBILE NAV CLICK **/
    // Permet d'afficher le menu version mobile sur la gauche
    $menuNav.click(function () {
        $('.menu_nav').css('display','block');
    })

    // Permet de fermer le menu version mobile sur la gauche grâce à la croix "x"
    $closeMenuNav.click(function () {
        $('.menu_nav').css('display','none');
    });

    /** BUTTON CARD CLICK **/
    //Button qui permet d'afficher le panier sur la droite
    $('.button2, #cart').click(function () {
        $('#card_add').css('display','block');
    });

    //permet de montrer que le panier est vide
    //$('#cart').click(function () {
        //$('.no-product').show();
    //});

    //Button qui permet de cacher les indications du panier vide
    //$('.button2').click(function () {
        //$('.no-panier').hide();
    //});

    //Button qui permet de fermer le panier sur la droite grâce à la croix "x"
    $closeCard.click(function () {
        $('#card_add').css('display','none');
    });

    //Fonction AJAX qui agit sur le formulaire choice
    /**$('#choice-form').submit(function (e) {
        e.preventDefault(); //Annule le comportement par défaut du formulaire
        //$('.no-product').hide();
        //Va chercher toutes les infos qui a dans le formulaire et mettre dans la variable postdata
        var postdata = $('#choice-form').serialize();

        $.ajax({
            type: 'GET',
            url: 'admin/addcard.php',
            data: postdata,
            dataType: 'json',
            success:function (result) {

            }

        });
    });**/

    /** IMAGE HOVER NEXT CLICK PRODUCT **/
    $('.next, .next_min').click(function(){ // image suivante

        i++; // on incrémente le compteur

        if( i <= indexImg ){
            $img.css('display', 'none'); // on cache les images
            $currentImg = $img.eq(i); // on définit la nouvelle image
            $currentImg.css('display', 'block'); // puis on l'affiche

            $currentImgMin.css('display', 'none'); // on cache les images miniatures
            $currentImgMin = $imgMin.eq(i); // on définit l'image miniatures
            $imgMin.eq(i).css('opacity','1'); // on lui met l'opacité au max à chaque changement d'image
            $currentImgMin.css('display', 'block');  //puis on l'affiche

        }
        else{
            i = indexImg; //Le dernier élèment s'arrête à i = 11
        }
    });

    /** IMAGE HOVER PREV CLICK PRODUCT **/
    $('.prev, .prev_min').click(function(){ // image précédente

        i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"

        if( i >= 0 ){
            $img.css('display', 'none');
            $currentImg = $img.eq(i);
            $currentImg.css('display', 'block');

            $imgMin.css('opacity','0.4');
            $currentImgMin = $imgMin.eq(i);
            $imgMin.eq(i).css('opacity','1');
            $currentImgMin.css('display', 'block');
        }
        else{
            i = 0;
        }

    });

    /** IMAGE MIN CLICK PRODUCT **/
    $thisImg.children().click(function () { //Dès qu'on clique sur l'image miniature

        var newIndex = $(this).parent().index(); // on récupère l'index de li
        var indexThisImgMin = $imgMin.eq(newIndex); //on récupère l'index de l'image miniature cliquée

        $img.css('display', 'none'); // on cache les images principales
        $img.eq(newIndex); // on définit l'image principale cliqué grâce à l'index de l'image miniature
        $img.eq(newIndex).css('display','block'); // on affiche l'image miniature sur l'image principale

        $imgMin.slice(0,newIndex).css('display','none'); //on efface toutes les images miniatures précédent l'image miniature cliquée
        $imgMin.css('opacity','0.4'); //on rend toutes les opacity à 0.4
        i = newIndex; // i est remplacé par le nouvel index li
        $currentImgMin = indexThisImgMin; // on remplace maintenant l'index de la première image miniature de i par le nouvel index de l'image miniature cliquée
        $currentImgMin; //On définit cette image
        $currentImgMin.css('opacity','1'); //On rend l'opacité à 1 de l'index 0 'i'
        $currentImgMin.css('display', 'block'); //Puis on l'affiche
    });

    /** BUTTON PRODUCT BLACK BLUE RED **/
    $blackProduct.click(function () {
        $img.css('display', 'none');
        $currentImgMin = $img.eq(9);
        $img.eq(9).css('display', 'block');

        $imgMin.slice(0,9).css('display','none');
        $imgMin.css('opacity','0.4');
        i = 9;
        $currentImgMin = $imgMin.eq(i);
        $currentImgMin;
        $currentImgMin.css('opacity','1');
        $currentImgMin.css('display', 'block');
        // Quand on clique sur le produit rouge puis noir, le bleu ne s'affichait pas alors :
        $imgMin.slice(9,11).css('display','block'); //Affiche le produit bleu et le produit rouge
    });
    $blueProduct.click(function () {
        $img.css('display', 'none');
        $currentImgMin = $img.eq(10);
        $img.eq(10).css('display', 'block');

        $imgMin.slice(0,10).css('display','none');
        $imgMin.css('opacity','0.4');
        i = 10;
        $currentImgMin = $imgMin.eq(i);
        $currentImgMin;
        $currentImgMin.css('opacity','1');
        $currentImgMin.css('display', 'block');
    });
    $redProduct.click(function () {
        $img.css('display', 'none');
        $currentImgMin = $img.eq(11);
        $img.eq(11).css('display', 'block');

        $imgMin.slice(0,11).css('display','none');
        $imgMin.css('opacity','0.4');
        i = 11;
        $currentImgMin = $imgMin.eq(i);
        $currentImgMin;
        $currentImgMin.css('opacity','1');
        $currentImgMin.css('display', 'block');
    });

});
