<?php

require_once '../../src/modele/Update.php';
$modifier = new Update(array(
    'IdVol'=>$_POST['id_vol'],
    'DateDepart'=>$_POST['date_depart'],
    'HeureDepart'=>$_POST['heure_depart'],
    'HeureArrivee'=>$_POST['heure_arrivee'],
    'RefPilote'=>$_POST['ref_pilote'],
    'RefAvion'=>$_POST['ref_avion']
));

$modifier->getUpdate();
header('Location: ../../index.php');
