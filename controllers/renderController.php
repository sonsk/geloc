<?php
require_once 'models/render.php';
class renderController{

    public function new(){
        Utils::isAdmin();
        require_once("views/user/admin/add-user.php");
    }
    public function liste() {
        Utils::isAdmin();
        $allrenders = new Render();
        $renders =  $allrenders->allRender();

        require_once('views/user/admin/renders.php');
    }

    public function addRender(){
        Utils::isAdmin();
        if (isset($_POST)) {
            $nom = isset($_POST['nom']) ? $_POST['nom'] : false;
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : false;
            $tel = isset($_POST['tel']) ? $_POST['tel'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $photo = $_FILES['img']['name'];
            $upload = base_url."views/user/render/profiles".$photo;
        
            $formats=array('png','jpg','gif');
            $format=substr($_FILES['img']['name'], -3);
        
            
            if(in_array($format, $formats)){
               $store= move_uploaded_file($_FILES['img']['tmp_name'], $upload);
            }
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            
            if($nom && $prenom && $tel && $email && $password){
                
                $user = new Render();
                $user->setAdminId($_SESSION['identity']->id);
                $user->setNom(htmlentities($_POST['nom']));
                $user->setPrenom(htmlentities($_POST['prenom']));
                $user->setTel(htmlentities($_POST['tel']));
                $user->setEmail(htmlentities($_POST['email']));
                $user->setImage($upload);
                $user->setPassword(md5($_POST['password']));
                $save = $user->saveRender();
                
                if ($save) {
                    
                    echo "<script>Swal.fire('Succès',
                            'Nouvel employe crée avec succès',
                            'success').then((result) => { window.location.href = '../employe/liste'; });
                        </script>";
                } else {
                    echo "<script>Swal.fire('Erreur',
                            'Vérifier bien tous les champs. le mot de passe n'est pas nécessaire',
                            'error').then((result) => { window.location.href = '../employe/Employe'; });
                        </script>";
                }
            }
            echo "<script>Swal.fire('Erreur',
                    'Veuillez remplir tous les champs. le mot de passe n'est pas nécessaire',
                    'error').then((result) => { window.location.href = '../employe/newEmploye'; });
                </script>";
        }
        
        echo "<script>Swal.fire('Erreur',
         'Veuillez remplir tous les champs. le mot de passe n'est pas nécessaire',
          'error').then((result) => { window.location.href = '../employe/newEmploye'; });
          </script>";
        
    }

}