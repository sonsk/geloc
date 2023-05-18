<?php
require_once 'models/user.php';
require_once 'models/profile.php';
require_once 'models/render.php';
class profileController{


    public function monprofil(){
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

    public function updateProfile() {
        // Vérifier si la requête est de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
            $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
           
            $password = isset($_POST['password']) ? $_POST['password'] : '';
    
            $confirmPassword = $_POST['oldPassword'] ?? '';
    
           
                
            // Récupérer le mot de passe actuel de la base de données
                        $data = new User();
                        $data->setId($_SESSION['identity']->id);
                        $nowUser = $data->getUserById($_SESSION['identity']->id);
                        $oldPassword =  $nowUser->getPassword();
            // Vérifier si les données sont valides
            if (!empty($nom) && !empty($prenom) && !empty($tel) && !empty($email) && !empty($password)) {
                // Récupérer l'utilisateur actuel depuis la session ou la base de données
                $user = new Render();
                $user->editRender();
                // Mettre à jour les valeurs du profil
                $user->setId($_SESSION['identity']->id);
                $user->setNom(htmlentities($nom));
                $user->setPrenom(htmlentities($prenom));
                $user->setTel(htmlentities($tel));
                $user->setEmail(htmlentities($email));
                
                $user->setPassword(md5($password));
    
                // Enregistrer les modifications dans la base de données
                if (md5($confirmPassword) !== $oldPassword) {
                    echo "<script>Swal.fire('Erreur',
                            'Le mot de passe de confirmation est incorrect',
                            'error').then((result) => { window.location.href = '../user/monprofil'; });
                        </script>";
                    exit();
                }
            
                    $success = $user->editRender();
            
                        if ($success) {
                            echo "<script>Swal.fire('Succès',
                                    'Profil mis à jour. Vous allez être déconnecté',
                                    'success').then((result) => { window.location.href = '../'; });
                                </script>";
                                session_unset();
                                exit();
                        } else {
                            echo "<script>Swal.fire('Erreur',
                                    'Vérifiez bien tous les champs',
                                    'error').then((result) => { window.location.href = '../user/monprofil'; });
                                </script>";
                    }
                    
                }
                
            }
            
            
        }
        public function deleteProfilePic(){
            $pic = new Profile();
            $pic->setId($_SESSION['identity']->id);
            $success = $pic->deletePic();
            if($success){
                header("location:".base_url."user/editUser");
            }
        }
        public function updateProfilePic() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $photo = $_FILES['img']['name'];
                $upload = "views/user/profilepic/".$photo;
        
                $formats=array('png','jpg','gif');
                $format=strtolower(substr($_FILES['img']['name'], -3));
                
                if (empty($photo)){
                    $upload = null;
                }
        
                if(in_array($format, $formats)){
                    move_uploaded_file($_FILES['img']['tmp_name'], $upload);
                    
                    if(!empty($photo)){
                        $user = new Profile();
                        $user->setId($_SESSION['identity']->id);
                        $user->setImage($upload);
                        $success = $user->editPic();
        
                        if ($success) {
                            // Rediriger vers une page de confirmation ou afficher un message de succès
                            echo "<script>Swal.fire('Succès',
                                    'Photo de Profil mise à jour avec succès',
                                    'success');
                                </script>";
                        } else {
                            // Afficher un message d'erreur
                            echo "<script>Swal.fire('Erreur',
                                    'Une erreur s\'est produite lors de la mise à jour de la photo de profil',
                                    'error');
                                </script>";
                        }
                    }
                } else {
                    // Afficher une alerte si le format de fichier n'est pas valide
                    echo "<script>Swal.fire('Erreur',
                            'Format de fichier invalide. Seuls les formats PNG, JPG et GIF sont autorisés',
                            'error');
                        </script>";
                }
            }
           
            header("Location:".base_url."user/monprofil");
            exit();
        }
}