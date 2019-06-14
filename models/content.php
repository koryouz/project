<?php

require_once 'models/database.php';

class content extends database {

    public $id = 0;
    public $title = '';
    public $date = '1970-01-01';
    public $content = '';
    public $id_mkiu2_user = 0;
    public $id_mkiu2_typeOfContent = 0;

    public function __construct() {
        parent::__construct();
    }

    public function addContent() {
        $query = 'INSERT INTO `mkiu2_content`(`title`, `date`, `image`, `content`, `id_mkiu2_user`, `id_mkiu2_typeOfContent`)'
                . 'VALUES (:title, NOW(), :image, :content, :id_mkiu2_user, :id_mkiu2_typeOfContent)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':image', $this->image, PDO::PARAM_STR);
        $queryExecute->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_mkiu2_user', $this->id_mkiu2_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_mkiu2_typeOfContent', $this->id_mkiu2_typeOfContent, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

       public function getContentArticleList() {
        $query = 'SELECT `id`, `title`, `date`, `image`, `content`, `id_mkiu2_typeOfContent`'
                . 'FROM `mkiu2_content`'
                . 'WHERE `id_mkiu2_typeOfContent` = 2';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getContentRealisationList() {
        $query = 'SELECT `id`, `title`, `date`, `image`, `content`, `id_mkiu2_typeOfContent`'
                . 'FROM `mkiu2_content`'
                . 'WHERE `id_mkiu2_typeOfContent` = 1';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
       public function getContentList() {
        $query = 'SELECT `id`, `title`, `date`, `image`, `content`, `id_mkiu2_typeOfContent`'
                . 'FROM `mkiu2_content`';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }

    public function showSelectContent() {
        $query = 'SELECT `id`, `title`, `date`, `content`, `id_mkiu2_typeOfContent`'
                . 'FROM `mkiu2_content`'
                . 'WHERE `id` = :id ';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryExecute->execute();
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }

    public function modifyContent() {
        $query = 'UPDATE `mkiu2_content`  '
                . 'SET `title` = :title, `date` = :date,`content` = :content, `id_mkiu2_typeOfContent` = :id_mkiu2_typeOfContent '
                . 'WHERE `id` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryExecute->bindValue(':date', $this->date, PDO::PARAM_STR);
        $queryExecute->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_mkiu2_typeOfContent', $this->id_mkiu2_typeOfContent, PDO::PARAM_INT);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }
    
        public function deleteContent() {
        $query = 'DELETE FROM `mkiu2_content` '
                . 'WHERE `id` = :id';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
