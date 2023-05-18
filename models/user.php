<?php


class User{
    private $id;
    private $admin_id;
    private $nom;
    private $prenom;
    private $tel;
    private $email;
    private $image;
    private $password;
    private $role;
    private $status;
    protected $db;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getAdminId(){
        return $this->admin_id;
    }
    public function setAdminId($admin_id) {
        $this->admin_id = $admin_id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function getTel(){
        return $this->tel;
    }
    public function setTel($tel){
        $this->tel = $tel;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }
    
    public function __construct() {
        $this->db = Database::connect();
        
    }
    public function getUserById($userId)
    {
        // Effectuer la requête pour récupérer les informations de l'utilisateur à partir de la base de données
        $sql = "SELECT * FROM users WHERE id = :userId";
        $query = $this->db->prepare($sql);
        $query->execute(array('userId' => $userId));
    
        // Vérifier si l'utilisateur a été trouvé dans la base de données
        if ($query->rowCount() > 0) {
            // Récupérer les données de l'utilisateur
            $userData = $query->fetch(PDO::FETCH_ASSOC);
    
            // Créer une instance de l'utilisateur
            $user = new User();
            $user->setId($userData['id']);
            $user->setNom($userData['nom']);
            $user->setPrenom($userData['prenom']);
            $user->setTel($userData['tel']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);

            // ... Ajouter d'autres propriétés si nécessaire
    
            return $user;
        }
    
        // Retourner null si l'utilisateur n'a pas été trouvé
        return null;
    }

    
    
   
    public function login(){
        $result = false;

        $email = $this->getEmail();
    
        $password = $this->getPassword();
        // check if the user exists
        $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
        
        $login = $this->db->query($sql);
      
        if($login && $login->rowCount() == 1){
            $user = $login->fetch(PDO::FETCH_OBJ); // This converts the DB response into an Object

            $result = $user;
            
        }

        return $result;
        
    }
}