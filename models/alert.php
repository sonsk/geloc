<?php
class Alert{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
        
    }
    public function alertPaie(){
        $sql = "SELECT status FROM paiement WHERE status = 0";
        $alert = $this->db->query($sql);

        $result = false;
        if(isset($alert)){
            $_SESSION['verifpaie'] ;
            $result = true;
        }
        return $result;
    }
    
}