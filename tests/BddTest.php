<?php

    class BddTest extends \PHPUnit\Framework\TestCase {
         
    // Pour créer une fonction de test il faut qu'elle hérite de la classe TestCase.
    // le nom de la fonction doit débuter par test

    public function testAucunLoginEtMpd_connexion_DevraitRenvoyer0() {

        // Arrange

        $nom = "";
        $mdp = "";
        $bdd = new Bdd();

        // Act
        $utilisateur[] = $bdd->affichage($nom, $mdp);
        $obtenu = count($utilisateur);
        $attendu = 0;

        // Assert
        assertEquals($attendu, $obtenu, "Aucun utilisateur ne doit être retourner");
    }
    }