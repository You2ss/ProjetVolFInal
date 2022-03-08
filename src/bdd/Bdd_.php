<?php

class Bdd_
{
    private $bdd;

    public function setPdo(){
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=projetvol;charset=utf8', 'root', '');
        return $bdd;
    }

}