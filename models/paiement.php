<?php

class Paiement{
    private $id;
    private $render_id;
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
  /**
     * Get the value of render_id
     */ 
    public function getRenderId()
    {
        return $this->render_id;
    }
    /**
     * Set the value of render_id
     *
     * @return  self
     */ 
    public function setRenderId($render_id)
    {
        $this->render_id = $render_id;

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
        $sql = "SELECT status FROM paiement WHERE render_id =".$this->getRenderId();
        $query = $this->db->query($sql);
        $alert = $query->fetchAll(PDO::FETCH_OBJ);

       
        if (isset($alert)) {
            $_SESSION['verifpaie'] = true ;
            
        }
        return $alert;
    }
    public function countAttentePaie(){
        $sql = "SELECT status FROM paiement WHERE status = '1'";
        $query = $this->db->query($sql);
        $countPaie = $query->rowCount(PDO::FETCH_OBJ);
            if(isset($countPaie)){
                return $countPaie;
            }
        
    }
    public function countPayed(){
        $sql = "SELECT status FROM paiement WHERE status = '2'";
        $query = $this->db->query($sql);
        $countPaie = $query->rowCount(PDO::FETCH_OBJ);
            if(isset($countPaie)){
                return $countPaie;
            }
        
    }
    public function countLate(){
        $sql = "SELECT status FROM paiement WHERE status = '0'";
        $query = $this->db->query($sql);
        $countPaie = $query->rowCount(PDO::FETCH_OBJ);
            if(isset($countPaie)){
                return $countPaie;
            }
        
    }
    public function viewAttenteConfirm(){
        
        $sql = "SELECT p.*,u.id as loca_id,u.nom FROM paiement p, users u WHERE p.status = '1' and u.id = p.render_id";
        $query = $this->db->query($sql);
        $attente = $query->fetchAll(PDO::FETCH_OBJ);

        return $attente;
    }
    public function statusConfirmPaie(){
        $render_id = $this->getRenderId();
        $id_paiement =$this->getId();
        $sql = "UPDATE paiement set status = '2' WHERE id = '$id_paiement' && render_id = '$render_id'";

        $confirmPaie = $this->db->query($sql);

        
        $result = false;
        if($confirmPaie){
            var_dump($id_paiement);
            var_dump($confirmPaie);
            $result = true;
        }

        return $result;
    }
    public function statusDenyPaie(){
        $render_id = $this->getRenderId();
        $id_paiement =$this->getId();
        $sql = "UPDATE paiement set status = '0' WHERE id = '$id_paiement' && render_id = '$render_id'";

        $denyPaie = $this->db->query($sql);

        
        $result = false;
        if($denyPaie){
            var_dump($id_paiement);
            var_dump($denyPaie);
            $result = true;
        }

        return $result;
    }
}