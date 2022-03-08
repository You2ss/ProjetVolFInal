<?php
require_once '../../src/bdd/Bdd2.php';
class Pilotes
{
    private $pilote;

    public function getPilote()
    {
        return $this->pilote;
    }

    public function setPilote()
    {
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('SELECT nom FROM pilote ');
        $req->execute(array());

        $donnee = $req->fetchAll();
        return $donnee;
    }
}