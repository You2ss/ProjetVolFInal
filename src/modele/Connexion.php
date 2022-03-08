<?php

class Connexion
{

    private $email;
    private $mot_de_passe;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function setConnexion()
    {
        session_start();
        $bdd = new BDD();
        $req = $bdd->setPdo()->prepare('SELECT * FROM client WHERE email = :email AND mot_de_passe = :mot_de_passe');
        $req->execute(array(
            'email' => $this->getEmail(),
            'mot_de_passe' => $this->getMotDePasse()
        ));
        $res = $req->fetch();
        if($res){
            $_SESSION['id'] = $res['id'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['mot_de_passe'] = $res['mot_de_passe'];
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