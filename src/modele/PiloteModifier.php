<?php

class PiloteModifier
{
    private $id_pilote;
    private $nom;
    private $prenom;
    private $rue;
    private $cp;
    private $ville;
    private $salaire;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function setUpdate(){
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('Update pilote set nom = :nom,prenom = :prenom,rue = :rue,cp = :cp,ville = :ville,salaire = :salaire where id= :id');
        $req->execute(array(
            'id' => $this->getIdPilote(),
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'rue' => $this->getRue(),
            'cp' => $this->getCp(),
            'ville' => $this->getVille(),
            'salaire' => $this->getSalaire(),
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
    public function getIdPilote()
    {
        return $this->id_pilote;
    }

    /**
     * @param mixed $id_pilote
     */
    public function setIdPilote($id_pilote)
    {
        $this->id_pilote = $id_pilote;
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

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * @param mixed $salaire
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

}