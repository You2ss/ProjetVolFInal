<?php
require_once '../../src/bdd/Bdd2.php';
class Avions
{
    private $avion;

    public function getAvion()
    {
        return $this->avion;
    }

    public function setAvion()
    {
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('SELECT nom FROM avion ');
        $req->execute(array());

        $donnee = $req->fetchAll();
        return $donnee;
    }


}
