<?php
require_once 'models/user.php';
class userController{

    public $isLoggedIn;


    public function index(){
        Utils::deleteAllSession();
        require_once('views/user/login.php');
    }
    public function home(){
        Utils::isLoggedIn();
        require_once('views/user/home.php');
    }
   
  
    
    public function admin() {
        Utils::isAdmin();
        require_once('views/user/admin/dashboard.php');
        /* require_once('views/user/test.php'); */
    }

    public function setIsLoggedIn($isLoggedIn){
        $this->isLoggedIn = $isLoggedIn;
    }

    public function getIsLoggedIn()
    {
        return $this->isLoggedIn;
    }

    public function login(){
        
        if(isset($_POST)){
           
            $user = new User();
            $user->setEmail($_POST['mail-login']);
            $user->setPassword(md5($_POST['password']));
            $identity = $user->login();

            require_once 'views/user/login.php';

            if($identity && is_object($identity)) {
               
                $_SESSION['identity'] = $identity;
                
                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                        
                }
                echo "<script>Swal.fire('Autorisé',
                    'Bonne séance de travail',
                    'success').then((result) => { window.location.href ='home'; });
                </script>";
            } else {
                echo "<script>Swal.fire('Erreur',
                        'Informations incorrectes',
                        'error').then((result) => { window.location.href ='../'; });
                    </script>";
                
                
            }
        }

    }
    
    

    public function logout() {
      session_unset();
      session_destroy();

        header("Location:".base_url);
    }
}




