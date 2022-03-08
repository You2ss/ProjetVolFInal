<?php
require_once '../../src/bdd/Bdd.php';
require_once '../../src/modele/Vol.php';

$ajouter = new Vol(array(   //setters

    'DateDepart'=>$_POST['date_depart'],
    'HeureArrivee'=>$_POST['heure_arrivee'],
    'HeureDepart'=>$_POST['heure_depart'],
    'RefPilote'=>$_POST['ref_pilote'],
    'RefAvion'=>$_POST['ref_avion']
));

$ajouter->addVol();
header('Location: ../../src/admin/index-A.php');
$ajouter->Afficher();
?>

