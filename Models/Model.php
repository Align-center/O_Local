<?php

class Model {

    public $pdo;

    public function __construct() {

        //Connexion DB
        $this->pdo = new PDO('mysql:host=localhost;dbname=O_Local;charset=utf8', 'root', 'root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}