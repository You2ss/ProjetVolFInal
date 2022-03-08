<?php


class Bdd
{
    private $bdd;

    public function __construct(){
        $this->bdd= new PDO('mysql:host=localhost;port=3306;dbname=projetvol;charset=utf8', 'root', '');


    }

    /**
     * @return PDO
     */
    public function getBdd()
    {
        return $this->bdd;
    }

}