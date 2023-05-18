<?php 


class Contrat{
    private $user_id;
    private $db;
    public function __construct(){
        $this->db =  Database::connect();
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function createContrat(){
        
    }
    public function checkContrat(){
        $sql = "SELECT user_id FROM contrats where user_id =".$this->getUserId();
        $query = $this->db->query($sql);
        $contratchecker = $query->fetch(PDO::FETCH_OBJ);
        
        if (empty($contratchecker)) {
           return false ;
        }
       return $contratchecker;
    }
    public function contratByRender() {
        $sql = "SELECT c.*,u.* FROM contrats c
        JOIN users u ON u.id = c.user_id
        WHERE c.user_id =".$this->getUserId();
        $query = $this->db->query($sql);
        $contratInfo = $query->fetchAll(PDO::FETCH_ASSOC);

        return $contratInfo;
        
    }
    
}