<?php
class Vol
{
    private $id_vol;
    private $date_Depart;
    private $heure_Arrivee;
    private $heure_Depart;
    private $ref_pilote;
    private $ref_avion;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {

        foreach ($donnees as $key => $value) {

            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {

                // On appelle le setter.
                $this->$method($value);


            }

        }
    }



    public function Afficher($bdd){

        $req = $bdd->getBdd()->prepare('SELECT * FROM vol');
        $req->execute(array());
        $res = $req->fetchall();
        return $res;
    }

    public function addVol()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare("INSERT INTO vol (date_depart, heure_depart, heure_arrivee, ref_pilote, ref_avion)   VALUES (:date_depart,:heure_depart,:heure_arrivee,:ref_pilote,:ref_avion)");
        $req->execute(array(
            'date_depart' => $this->date_Depart,
            'heure_depart' => $this->heure_Depart,
            'heure_arrivee' => $this->heure_Arrivee,
            'ref_pilote' => $this->ref_pilote,
            'ref_avion' => $this->ref_avion
        ));


    }

    public function getAllVol(Bdd $bdd){
        $req = $bdd->getBdd()->prepare('SELECT * FROM vol');
        return $req->execute(array(
            "id_vol"=>$this->id_vol
        ));
    }

    public function deleteVol(Bdd $bdd){
        $req = $bdd->getBdd()->prepare('DELETE FROM vol WHERE id_vol = :id_vol');
        $req->execute(array(
            "id_vol"=>$this->id_vol
        ));
    }


    public function getVol(Bdd $bdd){
        $req = $bdd->getBdd()->prepare('SELECT * FROM vol WHERE id_vol = :id_vol');
        return $req->execute(array(
            "id_vol"=>$this->id_vol
        ));
        return $req->fetch();
    }

    public function modifyVol(Bdd $bdd){
        $req = $bdd->getBdd()->prepare('UPDATE vol SET ');
        $req->execute(array(
            'date_depart' => $this->date_Depart,
            'heure_depart' => $this->heure_Depart,
            'heure_arrivee' => $this->heure_Arrivee,
            'ref_pilote' => $this->ref_pilote,
            'ref_avion' => $this->ref_avion,
            'id_vol'=> $this->id_vol
        ));
    }

    /**
     * @param mixed $id_vol
     */
    public function setIdVol($id_vol)
    {
        $this->id_vol = $id_vol;
    }

    /**
     * @param mixed $heure_Arrivee
     */
    public function setHeureArrivee($heure_Arrivee)
    {
        $this->heure_Arrivee = $heure_Arrivee;
    }

    /**
     * @param mixed $heure_Depart
     */
    public function setHeureDepart($heure_Depart)
    {
        $this->heure_Depart = $heure_Depart;
    }

    /**
     * @param mixed $ref_pilote
     */
    public function setRefPilote($ref_pilote)
    {
        $this->ref_pilote = $ref_pilote;
    }

    /**
     * @param mixed $ref_avion
     */
    public function setRefAvion($ref_avion)
    {
        $this->ref_avion = $ref_avion;
    }


    /**
     * @param mixed $date_Depart
     */
    public function setDateDepart($date_Depart)
    {
        $this->date_Depart = $date_Depart;
    }





}

