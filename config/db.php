<?php
class Database
{
    protected $bdd = null;
    
    public function __construct()
    {
        if($this->bdd = null) {
            $this->bdd = Database::connect();
        }
    }

    public static function connect() {
        $bdd = new PDO("mysql:host=localhost; dbname=geloc", 'root', '');

        return $bdd;
        
    }
}