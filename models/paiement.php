<?php

class Paiement{
    private $id;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
        
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function findAllByRender(){
        $render_id = $_SESSION['identity']->id;

        $sql = "SELECT * FROM paiement WHERE render_id = '$render_id'";
        
        $paie = $this->db->query($sql);
        $paie = $paie->fetchAll(PDO::FETCH_OBJ);
        

        return $paie;
    }
    public function statusVerifPaie(){
        $render_id = $_SESSION['identity']->id;
        $id_paiement =$this->getId();
        $sql = "UPDATE paiement set status = '1' WHERE id = '$id_paiement' && render_id = '$render_id'";

        $verifPaie = $this->db->query($sql);

        
        $result = false;
        if($verifPaie){
            var_dump($id_paiement);
            var_dump($verifPaie);
            $result = true;
        }

        return $result;
    }
    public function alertPaie(){
        $sql = "SELECT status FROM paiement WHERE status = '0'";
        $query = $this->db->query($sql);
        $alert = $query->fetchAll(PDO::FETCH_OBJ);

       
        if (isset($alert)) {
            $_SESSION['verifpaie'] = true ;
            
        }
        return $alert;
    }
    
}