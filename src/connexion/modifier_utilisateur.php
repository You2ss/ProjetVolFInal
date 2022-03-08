<?php
session_start();
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/ModifUtilisateur.php';
$modifier = new ModifUtilisateur(array(
    'id'=>$_POST['id'],
    'nom'=>$_POST['nom'],
    'email'=>$_POST['email'],
    'mdp'=>$_POST['mdp'],
));

$modifier->setUpdate();
header('Location: ../../../src/admin/admin.php');
