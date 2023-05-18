<?php
require_once 'models/user.php';
class Render extends User{

    public function saveRender() {
        
    
        $sql = "INSERT INTO users (admin_id, nom, prenom, tel, email, password,image, role, status, created_at)
        VALUES (:admin_id, :nom, :prenom, :tel, :email, :password,:image, 'render', '1', NOW())";
        

        $save = $this->db->prepare($sql);

        
        $save->execute(array(
            'admin_id'=>$this->getAdminId(),
            'nom'=>$this->getNom(),
            'prenom'=>$this->getPrenom(),
            'tel'=>$this->getTel(),
            'email'=>$this->getEmail(),
            'image'=>$this->getImage(),
            'password'=>$this->getPassword()
            
        ));
       
       
        return true;
    }

    public function editRender() {
        // Préparer la requête SQL pour mettre à jour le profil de l'utilisateur
   $sql = "UPDATE users SET nom = :nom, prenom = :prenom, tel = :tel, email = :email, image = :image, password = :password
           WHERE id = :userId";
   $query = $this->db->prepare($sql);

   // Exécuter la requête avec les valeurs mises à jour
   $success = $query->execute(array(
       'nom' => $this->getNom(),
       'prenom' => $this->getPrenom(),
       'tel' => $this->getTel(),
       'email' => $this->getEmail(),
       'image' => $this->getImage(),
       'password' => $this->getPassword(),
       'userId' => $this->getId()
   ));

   // Retourner le statut de réussite de la requête
   return $success;
   }
   public function allRender(){
    $sql = "SELECT * FROM users WHERE role = 'render'";
    
    $query = $this->db->query($sql);
  
    if($query){
        $renders = $query->fetchAll(PDO::FETCH_OBJ); // This converts the DB response into an Object   
    }
    return $renders;
}
public function allRenderByAdmin(){
    $sql = "SELECT * FROM users WHERE role = 'render' AND admin_id =".$this->getAdminId();
    
    $query = $this->db->query($sql);
  
    if($query){
        $renders = $query->fetchAll(PDO::FETCH_OBJ); // This converts the DB response into an Object   
    }
    return $renders;
}
}