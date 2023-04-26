<?php


class User{
   
    private $db;

    public function __construct() {
        $this->db = Database::connect();
        
    }
    

    

    public function save(){
        $nom = htmlentities($_POST['first-name-register']);
        $prenom = htmlentities($_POST['last-name-register']);
        $tel = htmlentities($_POST['tel']);
        $email = htmlentities($_POST['mail-register']);
    
        $password = md5($_POST['password-register']);
        
        $sql = "INSERT INTO user (nom,prenom,tel,email,password) VALUES (:nom,:prenom,:tel,:email,:password)";

        $save = $this->db->prepare($sql);

        
        $save->execute(array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'tel'=>$tel,
            'email'=>$email,
            'password'=>$password,
            //'role'=>'render'
        ));

       
        return true;
    }


    public function login(){
        $result = false;

        $email = $_POST['mail-login'];
    
        $password = $_POST['password'];
        // check if the user exists
        $sql = "SELECT * FROM user WHERE email = '$email' && password = '$password'";
        
        $login = $this->db->query($sql);
      
        if($login && $login->rowCount() == 1){
            $user = $login->fetch(PDO::FETCH_OBJ); // This converts the DB response into an Object

            $result = $user;
            
        }

        return $result;
        
    }
}