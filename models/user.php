<?php

require_once 'models/database.php';

class user extends database {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $mail = '';
    public $passwordInput = '';
    public $phoneNumber = '';
    public $address = '';
    public $nationality = '';

    public function __construct() {
        parent::__construct();
    }

    public function addUser() {
        $query = 'INSERT INTO `mkiu2_user`(`lastname`, `firstname`, `mail`, `passwordInput`, `phoneNumber`, `address`, `nationality`, `id_mkiu2_userGroup`) VALUES (:lastname, :firstname, :mail, :passwordInput, :phoneNumber, :address, :nationality, 2)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':passwordInput', $this->passwordInput, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':address', $this->address, PDO::PARAM_STR);
        $queryExecute->bindValue(':nationality', $this->nationality, PDO::PARAM_STR);
        return $queryExecute->execute();
    }

    /**
     * Méthode permettant de voir si l'utilisateur existe dans la base de données
     * Je l'utilise à l'inscription pour ne pas inscrire deux fois le même utilisateur
     * et dans la connexion pour vérifier si l'utilisateur existe dans la base de données
     * @return object
     */
    public function checkUser() {
        $query = 'SELECT COUNT(`id`) as `number` '
                . 'FROM `mkiu2_user` '
                . 'WHERE `mail` = :mail';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode permettant de récupérer le hash du mot de passe, on pourra le 
     * comparer à celui tapé lors de la connexion
     * @return object
     */
    public function getUserByMail() {
        $query = 'SELECT `id`, `passwordInput`, `lastname`, `firstname`, `mail`, `passwordInput`, `phoneNumber`, `address`, `nationality` '
                . 'FROM `mkiu2_user` '
                . 'WHERE `mail` = :mail';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
        public function showSelectUser() {
        $query = 'SELECT `id`, `lastname`, `firstname`, `phoneNumber`, `mail`'
                . 'FROM `mkiu2_user`'
                . 'WHERE `id` = :id ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function modifyUser() {
        $query = 'UPDATE `mkiu2_user` '
                . 'SET `lastname` = :lastname, `firstname` = :firstname,`phoneNumber` = :phoneNumber, `mail` = :mail '
                . 'WHERE `id` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryExecute->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryExecute->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryExecute->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
