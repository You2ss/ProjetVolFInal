<?php
class Vol
{
    private $select;


    public function getSelect()
    {
        return $this->select;
    }

    public function setSelect()
    {
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('SELECT * FROM vol ');
        $req->execute(array());

        $donnee = $req->fetchAll();
        return $donnee;
    }

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            //setNom
            if (method_exists($this, $method)){
                //On appelle le setter
                $this->$method($value);
            }
        }
    }

}