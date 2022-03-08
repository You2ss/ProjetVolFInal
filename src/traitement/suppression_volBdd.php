<?php
require_once 'src/modele/Delete.php';
$delete = new Delete(array(
    'IdVol'=>$_POST['id_vol'],

));

$delete->getDelete();
header('Location: ../../index-2.php');