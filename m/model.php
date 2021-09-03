<?php

include_once 'config/db.php';

class Model
{
    public function dbConnecting (): PDO
    {
        return new PDO(DRIVER . ':host='. SERVER . ';dbname=' . DB, USERNAME, PASSWORD);
    }
}