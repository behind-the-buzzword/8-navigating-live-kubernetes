<?php

namespace App\Controller;

class Actors implements Controller
{
    private $db;

    public function __construct()
    {
        $this->db = \App\Database::getInstance();
    }

    public function run()
    {
        $actors = $this->db->getActors();
        require BASEDIR . '/views/actors.php';
    }
}