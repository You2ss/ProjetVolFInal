<?php


class Pilote
{

    private $pilote;

    /**
     * @return mixed
     */
    public function getPilote()
    {
        return $this->pilote;
    }

    /**
     * @param mixed $pilote
     */
    public function AfficherPilote($pilote)
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM pilote');
        $req->execute(array());

        $pilote = $req->fetchAll();
        return $pilote;
    }



}