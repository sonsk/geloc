<?php
require_once 'models/user.php';
class userController{

    public $isLoggedIn;


    public function index(){
        
        require_once('views/user/login.php');
    }
    public function home(){
        Utils::isLoggedIn();
        require_once('views/user/home.php');
    }
    public function render(){
        require_once('views/user/admin/renders.php');
    }
    public function newRender(){
        require_once("views/user/admin/add-user.php");
    }
  
    
    public function admin() {
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


public function edit(){
    $userId = $_SESSION['identity']->id;
    // Récupérer l'utilisateur actuel
    $data = new User();
    $user = $data->getUserById($userId);
    
    if ($user) {
    // Récupérer les valeurs actuelles de l'utilisateur
    $nom = $user->getNom();
    $prenom = $user->getPrenom();
    $tel = $user->getTel();
    $email = $user->getEmail();
    $password = $user->getPassword();
    } else {
    // Définir des valeurs par défaut au cas où l'utilisateur n'est pas trouvé
    $nom = '';
    $prenom = '';
    $tel = '';
    $email = '';
    $password = '';
    }
   
    require_once('views/user/profile.php');

}    

 
    public function addRender(){
        
        if (isset($_POST)) {
            $nom = isset($_POST['nom']) ? $_POST['nom'] : false;
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : false;
            $tel = isset($_POST['tel']) ? $_POST['tel'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            
            if($nom && $prenom && $tel && $email && $password){
                
                $user = new User();
                $user->setAdminId($_SESSION['identity']->id);
                $user->setNom(htmlentities($_POST['nom']));
                $user->setPrenom(htmlentities($_POST['prenom']));
                $user->setTel(htmlentities($_POST['tel']));
                $user->setEmail(htmlentities($_POST['email']));
                $user->setPassword(md5($_POST['password']));
                $save = $user->saveRender();
                
                if ($save) {
                    
                    echo "Register completed";
                } else{
                   
                    echo "Register imcompleted";
                }
            }
        }
        
        exit(header("Location:".base_url."user/renders"));
    }

    public function updateProfile()
{
    // Vérifier si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Vérifier si les données sont valides
        if (!empty($nom) && !empty($prenom) && !empty($tel) && !empty($email) && !empty($password)) {
            // Récupérer l'utilisateur actuel depuis la session ou la base de données
            $user = new User();
            $user->editRender();
            // Mettre à jour les valeurs du profil
            $user->setId($_SESSION['identity']->id);
            $user->setNom(htmlentities($nom));
            $user->setPrenom(htmlentities($prenom));
            $user->setTel(htmlentities($tel));
            $user->setEmail(htmlentities($email));
            $user->setPassword(md5($password));

            // Enregistrer les modifications dans la base de données
            $success = $user->editRender(); // À adapter selon votre implémentation

            if ($success) {
                // Rediriger vers une page de confirmation ou afficher un message de succès
                echo "Profil mis à jour avec succès";
            } else {
                // Afficher un message d'erreur
                echo "Une erreur s'est produite lors de la mise à jour du profil";
            }
        }
    }
    exit(header("Location:".base_url."user/home"));
}


    public function login(){
        
        if(isset($_POST)){
           
            $user = new User();
            $user->setEmail($_POST['mail-login']);
            $user->setPassword(md5($_POST['password']));
            $identity = $user->login();

            if($identity && is_object($identity)) {
               
                $_SESSION['identity'] = $identity;
                
                header("location:".base_url."paiement/paie");
                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                    
                    header("location:".base_url."paiement/admin");
                }
            } else {
                $_SESSION['error_login'] = 'Identification failed';
                echo 'Identification failed!';
                var_dump($_POST['password']);
                
                
            }
        }

    }
    
    public function renders() {
        $allrenders = new User();
        $renders =  $allrenders->allRender();

        require_once('views/user/admin/renders.php');
    }

    public function logout() {
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
}




