<?php
require_once 'models/user.php';
class userController{

    public $isLoggedIn;


    public function index(){
        /* echo "User Controller, Action index"; */
        /* require_once('views/user/login.php'); */
        require_once('views/user/login.php');
    }
    public function render(){
        /* echo "User Controller, Action test"; */
        require_once('views/user/render/index.php');
    }
    
    public function admin() {
        require_once('views/user/admin/dashboard.php');
        /* require_once('views/user/test.php'); */
    }

    public function setIsLoggedIn($isLoggedIn){
        $this->isLoggedIn = $isLoggedIn;
    }

    public function getIsLoggedIn(){
        return $this->isLoggedIn;
    }

    public function save() {
        
        if (isset($_POST)) {
            $nom = isset($_POST['first-name-register']) ? $_POST['first-name-register'] : false;
            $prenom = isset($_POST['last-name-register']) ? $_POST['last-name-register'] : false;
            $tel = isset($_POST['tel']) ? $_POST['tel'] : false;
            $email = isset($_POST['mail-register']) ? $_POST['mail-register'] : false;
            $password = isset($_POST['password-register']) ? $_POST['password-register'] : false;
            
            if($nom && $prenom && $tel && $email && $password){
                $user = new User();
               
                $save = $user->save();
                if($save){
                    $_SESSION['register'] = 'completed';
                    //require_once 'views/user/registerCompleted.php';
                    echo "Register completed";
                } else{
                    //require_once 'views/user/registerCompleted.php';
                    //$_SESSION['register'] = 'failed';
                    echo "Register imcompleted";
                }
            } else{
                /* require_once 'views/user/registerCompleted.php';
                $_SESSION['register'] = 'failed'; */
                echo "Register rejected";
            }
        } else{
            //require_once 'views/user/registerCompleted.php';
            //$_SESSION['register'] = 'failed';
            echo "Register needed";
        }
        exit(header("Location:".base_url));
    }



    public function login(){
        // echo json_encode($_POST);
        // exit;
        if(isset($_POST)){
            //identify user
            //check database
            $user = new User();

            $identity = $user->login();
            
            
            //create session to keep user logged in
            if($identity && is_object($identity)) {
               
                /* $_SESSION['login'] = 'header'; */
                $_SESSION['identity'] = $identity;
                
                header("location:".base_url."user/render");
                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                    
                    header("location:".base_url."user/admin");
                }
            } else {
                $_SESSION['error_login'] = 'Identification failed';
                echo 'Identification failed!';
                var_dump($_POST['password']);
                
                
            }
        }

    }


    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }

        header("Location:".base_url);
    }
} //end of class




