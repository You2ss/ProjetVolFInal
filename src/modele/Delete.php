<?php
require_once '../BDD/Bdd2.php';
class Delete
{
    private $id_vol;

    public function getDelete(){
        $bdd = new Bdd();
        $del = $bdd->setPdo()->prepare('DELETE FROM vol WHERE id_vol = :id_vol');
        $del->execute(array(
            'id_vol'=>$this->getIdVol()

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

    /**
     * @return mixed
     */
    public function getIdVol()
    {
        return $this->id_vol;
    }

    /**
     * @param mixed $id_vol
     */
    public function setIdVol($id_vol)
    {
        $this->id_vol = $id_vol;
    }

}