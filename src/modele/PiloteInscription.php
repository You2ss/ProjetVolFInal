<?php

class PiloteInscription
{
    private $nom;
    private $prenom;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function setInsert()
    {
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('INSERT INTO pilote (nom,prenom)VALUES (:nom,:prenom)');
        $req->execute(array(
            'nom' => $this->nom,
            'prenom' => $this->prenom,
        ));
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

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

}