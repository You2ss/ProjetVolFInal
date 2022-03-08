<?php

class PiloteConnexion
{
    private $id_pilote;
    private $nom;
    private $prenom;


    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function setConnexion()
    {
        session_start();
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('SELECT * FROM pilote WHERE nom = :nom AND prenom = :prenom');
        $req->execute(array(
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom()
        ));
        $res = $req->fetch();
        if($res){
            $_SESSION['id_pilote'] = $res['id_pilote'];
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['prenom'] = $res['prenom'];
        }
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

}