<?php
    class panier{

        private $DB;

        public function __construct($DB){
            if(!isset($_SESSION)){
                session_start(); //Création de la session
            }
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = array();//Création de panier vide
            }
            $this->DB = $DB;
            if(isset($_GET['delPanier'])){
                $this->del($_GET['delPanier']);
            }
        }

        public function count()
        {
            return array_sum($_SESSION['panier']);
        }

        public function total()
        {
            $total = 0;
            $ids = array_keys($_SESSION['panier']);//Je récupère les clefs du tableau de la session
            if(empty($ids)){
                $products = array();
            }  else {
                $products = $this->DB->query('SELECT id, price FROM products WHERE id IN ('.implode(',',$ids).')');
            }
            foreach ($products as $product)
            {
                $total += $product->price * $_SESSION['panier'][$product->id];
            }
            return $total;
        }

        public function add($product_id)
        {
            if(isset($_SESSION['panier'][$product_id]))
            {
                $_SESSION['panier'][$product_id]++;
            }
            else {
                $_SESSION['panier'][$product_id] = 1;
            }
        }

        public function del($product_id)
        {
                unset($_SESSION['panier'][$product_id]);
        }
    }
?>