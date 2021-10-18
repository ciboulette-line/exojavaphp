<?php

Class Bdd {

    private $bdd;

    // Constructeur
    function __construct(){

        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=exo_random_java;charset=utf8','root','');

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    }

    //N'est pas protégée
    function affichageUtilisateurNonProtege($username) {

        $sql = "SELECT u.username FROM users u WHERE username = :username;";
        $sth = $sql;
        $sth->execute(array(':username' => $username));
        return $sth -> fetchAll();

    }

    function affichageUtilisateurProtege($username){
        $sql = "SELECT u.username
                FROM users u
                WHERE u.username = :username";
        $sth = $this -> bdd->prepare($sql);
        $sth->execute(array(':username'=> $username));
            return $sth -> fetch();
    }