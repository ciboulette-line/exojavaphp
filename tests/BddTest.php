<?php

    class BddTest extends \PHPUnit\Framework\TestCase {
         
    // Pour créer une fonction de test il faut qu'elle hérite de la classe TestCase.
    // le nom de la fonction doit débuter par test

    public function testAucunUsername_affichageUtilisateurs_DevraitRenvoyer0() {

        // Arrange
        $username = "";
        $bdd = new Bdd();

        // Act
        $utilisateur[] = $bdd->affichageUtilisateurs($username);
        $obtenu = count($utilisateur);

        // Assert
        assertEquals(0, $obtenu, "Aucun utilisateur ne doit être retourné");
    }

    public function testUsernameMultipleUser1_affichageUtilisateursNonProtege_DevraitRenvoyer2() {

        // Arrange
        $username = "user1";
        $bdd = new Bdd();

        // Act
        $utilisateur[] = $bdd->affichageUtilisateurs($username);
        $obtenu = count($utilisateur);

        // Assert
        assertEquals(2, $obtenu, "Deux utilisateurs doivent être retournés");
    }

    public function testUsernameUniqueEstAllan_affichageUtilisateursNonProtege_DevraitRenvoyer1() {

        // Arrange

        $username = "Allan";
        $bdd = new Bdd();

        // Act
        $utilisateur[] = $bdd->affichageUtilisateursNonProtege($username);
        $obtenu = count($utilisateur);

        // Assert
        assertEquals(1, $obtenu, "Un client doit être retourné");
    }

    public function testInjectionSQL_affichageUtilisateursNonProtege_DevraitRenvoyerCinqClients() {

        // Arrange

        $username = "Allan OR '1' = '1'";
        $bdd = new Bdd();

        // Act
        $utilisateur[] = $bdd->affichageUtilisateursNonProtege($username);
        $obtenu = count($utilisateur);

        // Assert
        assertEquals(5, $obtenu, "5 clients doivent être retournés");
    }

    }