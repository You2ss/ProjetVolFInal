<?php

class Modifier
{

    private $date_depart;
    private $heure_depart;
    private $heure_arrivee;
    private $ref_pilote;
    private $ref_avion;




    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->date_depart;
    }

    /**
     * @param mixed $date_depart
     */
    public function setDateDepart($date_depart)
    {
        $this->date_depart = $date_depart;
    }

    /**
     * @return mixed
     */
    public function getHeureDepart()
    {
        return $this->heure_depart;
    }

    /**
     * @param mixed $heure_depart
     */
    public function setHeureDepart($heure_depart)
    {
        $this->heure_depart = $heure_depart;
    }

    /**
     * @return mixed
     */
    public function getHeureArrivee()
    {
        return $this->heure_arrivee;
    }

    /**
     * @param mixed $heure_arrivee
     */
    public function setHeureArrivee($heure_arrivee)
    {
        $this->heure_arrivee = $heure_arrivee;
    }

    /**
     * @return mixed
     */
    public function getRefPilote()
    {
        return $this->ref_pilote;
    }

    /**
     * @param mixed $ref_pilote
     */
    public function setRefPilote($ref_pilote)
    {
        $this->ref_pilote = $ref_pilote;
    }

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->ref_avion;
    }

    /**
     * @param mixed $ref_avion
     */
    public function setRefAvion($ref_avion)
    {
        $this->ref_avion = $ref_avion;
    }

    /**
     * @return mixed
     */
    public function getModifier()
    {

    }

    /**
     * @param mixed
     */
    public function setModifier()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE vol SET date_depart, heure_depart, heure_arrivee, ref_pilote, ref_avion');
        $req->execute(array(
            'date_depart' => $this->date_depart,
            'heure_depart' => $this->heure_depart,
            'heure_arrivee' => $this->heure_arrivee,
            'ref_pilote' => $this->ref_pilote,
            'ref_avion' => $this->ref_avion,
        ));
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