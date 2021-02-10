<?php
    require 'admin/_header.php';
?>
<!DOCTYPE>
<html>

    <head>
        <meta http-equiv= "content-type" content= "text/html; charset=UTF-8" >
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <title>Spidershoot™</title>
    </head>

    <body>

        <aside>
            <div id="card_add">
                <div class="basket">Panier</div>
                <div class="close_card">X</div>
                <hr class="card_band">
                <br>

                <div class="no-product">
                    <?php
                    $ids = array_keys($_SESSION['panier']);//Je récupère les clefs du tableau de la session
                    if(empty($ids)){ ?>
                        <p class="no-panier">Votre panier est vide.</p>
                        <?php $products = array();
                    } else {
                        //unset($_SESSION['panier']);
                        $products = $DB->query('SELECT * FROM products WHERE id IN (' . implode(',', $ids) . ')');
                    }//var_dump($products);
                    foreach ($products as $product):
                    ?>
                    <br>
                    <img src="images/<?= $product->image; ?>" class="imgCard">
                    <div class="txt-card">
                        <p class="titleCard"><?= $product->name; ?></p>
                        <p class="price"><?= number_format($product->price,2,',',' ');?> EUR  <span id="underline"><?= number_format($product->price + 10,2,',','');?> EUR</span></p>
                        <p class="color"><?= $product->color; ?></p>
                    </div>
                    <br>
                    <br>
                    <div class="product-again"><?= $_SESSION['panier'][$product->id]; ?></div>
                        <a href="index.php?delPanier=<?= $product->id; ?>">
                            <img src="images/corbeille.png" class="del" height="20px">
                        </a>
                    <br>
                    <hr class="hrCard">
                    <?php endforeach; ?>
                </div>
                <br><br>

                <p class="sous-total">Sous total <?= number_format($panier->total(),2,',',' ');?> EUR</p>
                <br>
                <p class="sous-total">Vous économisez <?= number_format($panier->total() / 2,2,',',' ');?> EUR</p>
                <br>
                <input type="button" class="button-card" value="Paiement Sécurisé">
                <img src="images/Secure_Cart.png" class="secure_img_min">
            </div>
        </aside>

            <div class="container">

                <div class="header">
                    <div class="header_container">
                        <div class="header_one">
                            <h3>Livraison Gratuite à partir de 25,00 EUR</h3>
                        </div>
                    </div>
                </div>

                <div class="nav">
                    <div class="nav_container">
                        <div class="nav-one-mobile">
                            <img src="images/menu.png" id="menu_logo">
                            <div class="menu_nav">
                                <div class="close_menu_nav">X</div>
                                <ul>
                                    <li><a href="index.php">Accueil</a></li>
                                    <li><a href="link/FAQ.php">Faq</a></li>
                                    <li><a href="https://www.laposte.fr/outils/suivre-vos-envois">Suivi de commande</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="nav-one">
                            <img src="images/Logo Spidershoot.png" id="logo">
                        </div>
                        <div class="nav-two">
                            <ul>
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="link/FAQ.php">Faq</a></li>
                                <li><a href="https://www.laposte.fr/outils/suivre-vos-envois">Suivi de commande</a></li>
                                <li><a href="link/contact.php">Contact</a></li>
                            </ul>
                        </div>
                        <div class="nav-three">
                            <img src="images/bag.png" id="cart"> <?= $panier->count(); ?>
                        </div>
                    </div>
                </div>

                <div class="home">
                    <div class="home_container">
                        <div class="home-one">
                            <img src="images/fondhome.jpg" id="logo_home">
                        </div>
                        <div class="home-two">
                            <h1>Spidershoot, le trépied le plus primé au monde !</h1>
                            <hr class="border_band">
                            <h4>Réglable en hauteur, pieds rotatifs et pliants avec une rotation à 360°,
                                <br>il capture les photos & vidéos sur n'importe quelle surface en un clic grâce à sa télécommande bluetooth !</h4>
                            <a href="#description_title" class="button1">Découvrez ></a>
                        </div>
                    </div>
                </div>

                <div class="description_title" id="description_title">
                    <h2>Vous êtes Blogger(euse), Photographe, Model(e) instagram ou encore Globtrotter(euse) ?</h2>
                    <hr class="border_band">
                    <br>
                </div>

                <div class="description">
                    <div class="description_container">
                        <div class="description-one">
                            <p class="description_text_p">
                                ➽ Vous souhaitez <span>capturer l'instant parfait</span> dans des lieux insolites en un seul clic ?
                                <br><br>
                                ➽ Vous voulez <span>réaliser des photos ou vidéos</span> vous-même et les partager sur les réseaux?
                                <br><br>
                                ➽ Vous avez <span>envie de devenir Influenceur</span> mais il vous manque des photos de vous, cadrés et de qualités ?
                                <br><br>
                                Le trépied <span>Spidershoot</span> répondra parfaitement à toutes vos attentes grâce à ses <strong>pieds flexible</strong> et sa <strong>télécommande bluetooth !</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="information_title">
                    <h2>Pourquoi le trépied Spidershoot est indispensable ?</h2>
                    <hr class="border_band">
                    <br>
                </div>

                <div class="information">
                    <div class="information_container">
                        <div class="information-one">
                            <h5><span class="color">✔</span> Flexible</h5>
                            <br>
                            <p class="info">
                                Grâce à ses jambes flexibles, vous pouvez enrouler le trépied autour d'une chaise, branche ou pilier où vous le souhaitez .
                                <br><br>
                            </p>

                            <h5><span class="color">✔</span> Super Léger & Compact</h5>
                            <br>
                            <p class="info">
                                Le trépied Spidershoot est si petit et léger qu'il peut être facilement transporté à la fois dans la valise, dans le sac ou dans votre poche, il prend vraiment très peu de place, il est parfait pour vos randonnées !
                                <br>
                                Vous allez l’adorer !
                                <br><br>
                            </p>
                        </div>
                        <div class="information-two">
                            <img src="images/header.jpeg" id="info_img">
                        </div>
                        <div class="information-three">
                            <h5><span class="color">✔</span> Ajustez l'angle à volonté</h5>
                            <br>
                            <p class="info">
                                Réglable en hauteur avec une rotation à 360°, vous pouvez tourner votre appareil dans votre position préférée et régler l'altitude pour une meilleure prise de vue.
                            </p>
                            <br><br>
                            <h5><span class="color">✔</span> Télécommande Bluetooth</h5>
                            <br>
                            <p class="info">
                                La télécommande Bluetooth convient à la plupart des smartphones iOS / Android
                                <br>
                                Vous pouvez facilement contrôler votre appareil à une distance de 10 Mètres Maximum.
                                <br>
                                Plus besoin de retardateur grâce à sa télécommande Bluetooth, vous êtes sûr d'être sur la photo !
                            </p>
                        </div>
                    </div>
                </div>


                <div class="performance_title">
                    <h2>Performances</h2>
                    <hr class="border_band">
                    <br>
                </div>

                <div class="performance">
                    <div class="performance_container">
                        <div class="performance-one">
                            <img src="images/performance.jpg" id="perfo_img">
                        </div>
                        <div class="performance-two">
                            <p class="performance_p">
                                <span>✔ Matériaux de haute qualité</span> et mousses de haute densité
                                <br><br>
                                <span>✔ Forte adhérence</span> pour assurer la <span>stabilité</span> de l'équipement
                                <br><br>
                                <span>✔</span> Conçu pour être <span>hautement fonctionnel et durable</span> pour des <span>performances de haut niveau</span>.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="compatibility_title">
                    <h2>Compatibilités</h2>
                    <hr class="border_band">
                    <br>
                </div>

                <div class="compatibility">
                    <div class="compatibility_container">
                        <div class="compatibility-one">
                            <p class="compatibility_p">
                                    <span>✔ Smartphones
                                    <br><br>
                                    ✔ Appareils photo numériques
                                    <br><br>
                                    ✔ GoPro
                                    <br><br>
                                    ✔ Webcams jusqu'à 3,35 pouces de large
                                    <br><br>
                                    ✔ Autres appareils photos qui sont moins lourds que 2KG
                                    </span>
                            </p>
                        </div>
                        <div class="compatibility-two">
                            <img src="images/compatibility.jpg" id="compa_img">
                        </div>
                    </div>
                </div>

                <div class="caution_title">
                    <h2>Notre garantie</h2>
                    <hr class="border_band">
                    <br>
                </div>

                <div class="caution">
                    <div class="caution_container">
                        <div class="caution-one">
                            <p class="caution_text_p">
                                <span>Votre satisfaction est notre priorité</span>, c'est pour cela que même si nous somme sûr de notre produit, dès réception, nous vous garantissons le <span>satisfait ou rembourser pendant 14 jours</span>, et si vous n'êtes pas satisfait vous serez <span>remboursé à 100%.</span>
                                <br><br>
                                En cas de difficulté à utiliser Spidershoot si vous avez des questions, <span>n'hésitez surtout pas à nous contacter</span> nous répondrons à vos questions dans les 24h maximum.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="columns_icons">
                    <div class="columns_icons_container">
                        <div class="columns-one">
                            <img src="images/Support.png" class="columns_img">
                            <h6>Support Français</h6>
                            <br>
                            <p class="columns_text_p">Une équipe dédiée au Support pour répondre à toutes vos questions.</p>
                        </div>
                        <div class="columns-two">
                            <img src="images/Retour.png" class="columns_img">
                            <h6>Garantie</h6>
                            <br>
                            <p class="columns_text_p">Satisfait ou Remboursé pendant 14 jours après réception des articles !</p>
                        </div>
                        <div class="columns-three">
                            <img src="images/Livraison.png" class="columns_img">
                            <h6>Livraison Suivie</h6>
                            <br>
                            <p class="columns_text_p">Votre commande sera livrée à votre domicile et sera expédiée en 72 heures sous réserve de stocks disponible!</p>
                        </div>
                        <div class="columns-four">
                            <img src="images/Secure.png" class="columns_img">
                            <h6>Paiement Sécurisé</h6>
                            <br>
                            <p class="columns_text_p">Nous confions la gestion de nos paiements en ligne à Stripe & Paypal 100% Sécurisés.</p>
                        </div>
                    </div>
                </div>

                <div class="product_title">
                    <h2>Notre produit</h2>
                    <hr class="border_band">
                    <br>
                </div>

                <div class="product">
                    <div class="product_container">
                        <div class="product-one">
                            <div id="carrousel_first_img">
                                <ul>
                                    <li><img src="images/1.jpg"/></li>
                                    <li><img src="images/2.jpg"/></li>
                                    <li><img src="images/3.jpg"/></li>
                                    <li><img src="images/4.jpg"/></li>
                                    <li><img src="images/5.jpg"/></li>
                                    <li><img src="images/6.jpg"/></li>
                                    <li><img src="images/7.jpg"/></li>
                                    <li><img src="images/8.jpg"/></li>
                                    <li><img src="images/9.jpg"/></li>
                                    <?php
                                    $products = $DB->query('SELECT * FROM products');
                                    foreach ($products as $product) {
                                        echo '<li><img src="images/' . $product->image . '"/></li>';
                                    } ?>
                                </ul>
                                <div class="prev"><p class="p_carrousel"> < </p></div>
                                <div class="next"><p class="p_carrousel"> > </p></div>
                            </div>
                            <div id="carrousel_second_img">
                                <ul>
                                    <li><img src="images/1.jpg"/></li>
                                    <li><img src="images/2.jpg"/></li>
                                    <li><img src="images/3.jpg"/></li>
                                    <li><img src="images/4.jpg"/></li>
                                    <li><img src="images/5.jpg"/></li>
                                    <li><img src="images/6.jpg"/></li>
                                    <li><img src="images/7.jpg"/></li>
                                    <li><img src="images/8.jpg"/></li>
                                    <li><img src="images/9.jpg"/></li>
                                    <?php foreach ($products as $product) {
                                        echo '<li><img src="images/' . $product->image . '"/></li>';
                                    } ?>
                                </ul>
                                <div class="prev_min"><p class="p_carrousel_min"> < </p></div>
                                <div class="next_min"><p class="p_carrousel_min"> > </p></div>
                            </div>
                        </div>
                        <div class="product-two">
                            <h1 class="product_h1">
                                <?= $product->name; ?>
                            </h1>
                            <p class="product_p">
                                <?= $product->price . " EUR " . '<span id="underline">' . $product->soldeprice . " EUR" . '</span>'; ?>
                                <br>
                                <small>Vous économisez 10,00 EUR (33 %)</small>
                            </p>
                            <br>
                            <p class="color_p"><small>Couleurs</small></p>

                            <?php
                                    $products = $DB->query('SELECT * FROM products ORDER BY id LIMIT 0,1');
                                    foreach ($products as $id1){
                                        $id1->id;
                                    }

                                    $products = $DB->query('SELECT * FROM products ORDER BY id LIMIT 1,1');
                                    foreach ($products as $id2){
                                        $id2->id;
                                    }

                                    $products = $DB->query('SELECT * FROM products ORDER BY id LIMIT 2,1');
                                    foreach ($products as $id3){
                                        $id3->id;
                                    }

                                    ?>

                            <form id="choice-form" method="POST" action="admin/addcard.php?id=<?= $product->id; ?>">
                                <input type="radio" class="Black" value="<?= $id1->id; ?>" name="choice">
                                <label for="productBlack">Black</label>
                                <input type="radio" class="Blue" value="<?= $id2->id; ?>" name="choice">
                                <label for="productBlue">Bleu</label>
                                <input type="radio" class="Red" value="<?= $id3->id; ?>" name="choice">
                                <label for="productRed">Rouge</label>
                                <br>
                                <input class="button2" type="submit" value="Ajouter au panier" name="envoi" />
                            </form>

                            <img src="images/Secure_Cart.png" class="secure_img">
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div class="footer_container">
                        <div class="footer-one">
                            <h1>Informations</h1>
                            <br>
                            <a href="link/legalMention.php">Mention légale</a>
                            <br>
                            <a href="#">Politique de remboursement</a>
                            <br>
                            <a href="#">Politique d'expédition</a>
                            <br>
                            <a href="#">Politique de confidentialité</a>
                            <br>
                            <a href="#">Conditions générales de ventes</a>
                            <br>
                            <a href="link/FAQ.php">FAQ</a>
                        </div>
                        <div class="footer-two">
                            <h1>Une question ?</h1>
                            <br>
                            <a href="mailto:shopspidershoot@gmail.com">shopspidershoot@gmail.com</a>
                            <br>
                            <p>Lun - Dim 10H00 - 20H00</p>
                        </div>
                        <div class="footer-three">
                            <h1>Suivez-nous</h1>
                            <br>
                            <p>Inscrivez-vous et obtenez des offres et réductions régulières</p>
                            <br>
                            <form>
                                <input type="email" name="mail" class="mail" placeholder="Inscrivez-vous ici pour recevoir nos offres commerciales">
                                <input type="submit" value="Je m'inscris !" class="valid">
                                <br><br><p>
                                    <input type="checkbox" value="accept">
                                    Je déclare être âgé(e) de 16 ans ou plus et accepter de recevoir des offres commerciales et personnalisées de Spidershoot™.</p>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
    </body>
</html>
