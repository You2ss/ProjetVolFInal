<?php


class User
{

    private $connexion;
    private $email;
    private $mdp;

    /**
     * @return mixed
     */
    public function getConnexion()
    {
        return $this->connexion;
    }

    /**
     * @param mixed $connexion
     */
    public function setConnexion($email, $mdp)
    {
        $bdd = new BDD();
        $req= $bdd->getBdd()->prepare('SELECT * FROM users email = :email AND mdp = :mdp');
        $req->execute(array(
            'email' => $this->email = $email ,
            'mdp' => $this->mdp = $mdp
        ));

        $donnee = $req->fetch();
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