<?php
/**
 * Je crée une classe database qui me permettra de me connecter à la base de données
 * Toutes mes autres classes hériteront de cette classe grâce au mot-clé extends
 * L'avantage est qu'on ne répète pas ce bout de code, que si l'on a une modification à effectuer
 * on ne devra la faire que dans ce fichier
 */
class database {
    //Mon attribut database est en visibilité protected pour que les classes qui héritent de database puissent y avoir accès
    protected $db;
    public function __construct() {
        //Je me connecte à ma base de donnée comme d'habitude
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=project;charset=utf8', 'admin', 'admin');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}
