<?php
require_once '../BDD/Bdd.php';
require_once '../Modele/Vol.php';

$ajouter = new Vol(array(   //setters

    'DateDepart'=>$_POST['date_depart'],
    'HeureArrivee'=>$_POST['heure_arrivee'],
    'HeureDepart'=>$_POST['heure_depart'],
    'RefPilote'=>$_POST['ref_pilote'],
    'RefAvion'=>$_POST['ref_avion']
));

$ajouter->addVol();
header('Location: ../../index-2.php');
$ajouter->Afficher();
?>

