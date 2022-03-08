<?php
require_once '../BDD/Bdd.php';
require_once 'src/modele/Vol.php';


$vol = new Vol(array(
    'DateDepart' =>$_POST['date_depart'],
    'HeureDepart' =>$_POST['heure_depart'],
    'HeureArrivee' =>$_POST['heure_arrivee'],
    'RefPilote' =>$_POST['ref_pilote'],
    'RefAvion' =>$_POST['ref_avion']

));
$bdd = new Bdd();
$vol->addVol();
header('Location: ../../index-2.php');
?>

