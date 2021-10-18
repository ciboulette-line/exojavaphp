<?php

Class Bdd {

    private $bdd;

    // Constructeur
    function __construct(){

        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=php_cours;charset=utf8','root','');

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    function getAllArticles() {
        $sql = "SELECT id, titre, contenu, date_add, idusers FROM article INNER JOIN users ON fk_user = idusers";
        $sth = $this->bdd->prepare($sql);
        $sth->execute();
        return $sth -> fetchAll();

    }

    function getUnArticle($id) {
        $sql = "SELECT titre, contenu, date_add, idusers FROM article INNER JOIN users ON fk_user = idusers WHERE id = :id";
        $sth = $this->bdd->prepare($sql);
        $sth->execute(array(':id' => $id));
        return $sth -> fetchAll();
    }

    function checkConnexion($username, $password){
        $sql = "SELECT u.username
                FROM users u
                WHERE u.username = :username AND u.password = :pwd";
        $sth = $this -> bdd->prepare($sql);
        $sth->execute(array(':username'=> $username, ':pwd' => $password));
            return $sth -> fetch();
    }
}