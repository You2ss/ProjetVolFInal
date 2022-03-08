<?php

class AvionCRUD
{
    private $id_avion;
    private $nom;
    private $capacite;
    private $fournisseur;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function setInsert()
    {
        $bdd = new Bdd();
        $req = $bdd->setPdo()->prepare('INSERT INTO avion (nom,capacite,fournisseur)VALUES (:nom,:capacite,:fournisseur)');
        $req->execute(array(
            'nom' => $this->nom,
            'capacite' => $this->capacite,
            'fournisseur' => $this->fournisseur,
        ));
    }

    public function setUpdate(){
        $bdd = new Bdd();
        $req = $bdd->setPdo()->prepare('Update avion set nom = :nom,capacite = :capacite,fournisseur = :fournisseur where id= :id');
        $req->execute(array(
            'id_avion' => $this->getIdAvion(),
            'nom' => $this->getNom(),
            'capacite' => $this->getCapacite(),
            'fournisseur' => $this->getFournisseur(),
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
    public function getIdAvion()
    {
        return $this->id_avion;
    }

    /**
     * @param mixed $id_avion
     */
    public function setIdAvion($id_avion)
    {
        $this->id_avion = $id_avion;
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
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param mixed $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    }

    /**
     * @return mixed
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * @param mixed $fournisseur
     */
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;
    }

}