<?php


class Avion
{

    private $avion;


    public function getAvion()
    {
        return $this->avion;
    }

    /**
     * @param mixed $avion
     */
    public function AfficherAvion($avion)
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT nom FROM avion ');
        $req->execute(array());

        $donnee = $req->fetchAll();
        return $donnee;
    }

}