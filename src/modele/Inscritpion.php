<?php

class Inscription
{
    private $nom;
    private $email;
    private $mot_de_passe;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function setInsert()
    {
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('INSERT INTO client (nom,email,mot_de_passe)VALUES (:nom,:email,:mot_de_passe)');
        $req->execute(array(
            'nom' => $this->nom,
            'email' => $this->email,
            'mot_de_passe' => $this->mot_de_passe,
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }


}