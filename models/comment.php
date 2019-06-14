<?php

require_once 'models/database.php';

class comment extends database {

    public $id = 0;
    public $date = '';
    public $content = '';
    public $id_mkiu2_user = 0;
    public $id_mkiu2_content = 0;
    public $id_mkiu2_typeOfComment = 0;

    public function __construct() {
        parent::__construct();
    }

    public function addComment() {
        $query = 'INSERT INTO `mkiu2_comments`(`date`, `content`, `id_mkiu2_user`, `id_mkiu2_typeOfComment`,`id_mkiu2_content`) '
                . 'VALUES (NOW(), :content, :id_mkiu2_user , :id_mkiu2_typeOfComment, :id_mkiu2_content)';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryExecute->bindValue(':id_mkiu2_user', $this->id_mkiu2_user, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_mkiu2_typeOfComment', $this->id_mkiu2_typeOfComment, PDO::PARAM_INT);
        $queryExecute->bindValue(':id_mkiu2_content', $this->id_mkiu2_content, PDO::PARAM_INT);
        return $queryExecute->execute();
    }

    public function getCommentList() {
        $query = 'SELECT `date`, `content`'
                . 'FROM `mkiu2_comments`';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }


    public function __destruct() {
        $this->db = NULL;
    }

}
