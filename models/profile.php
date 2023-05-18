<?php
require_once 'models/user.php';
class Profile extends User{
    public function editPic(){
        // Préparer la requête SQL pour mettre à jour la photo de profil de l'utilisateur
      $sql = "UPDATE users SET image = :image, updated_at = NOW()
      WHERE id = :userId";
     $query = $this->db->prepare($sql);
     
     // Exécuter la requête avec la photo mise à jour
     $success = $query->execute(array(
     
     'image' => $this->getImage(),
     
     'userId' => $this->getId()
     ));
     return $success;
     }
     public function deletePic(){
        $sql = "DELETE image FROM users where id=:userId";
        $query = $this->db->prepare($sql);
        $success = $query->execute(array(
            'userId' => $this->getId()
            ));
            return $success;
     }
}