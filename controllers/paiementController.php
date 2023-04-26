<?php
require_once('models/paiement.php');

class paiementController{

    public function paie(){
        $buy = new Paiement();
        $paiement = $buy->findAllByRender();

        
        $verifAlert = $buy->alertPaie();
        
        if(empty($verifAlert)){
            $_SESSION['verifpaie'] = 'ajour';
        }elseif(!empty($verifAlert)){
            $_SESSION['verifpaie']= 'retard';
        }
        
        require_once('views/user/render/paiement.php');
        
    }
    public function verif(){
        require_once('views/user/render/verifPaie.php');
    }

    public function verifPaie(){
        if(isset($_POST)){
            $id = $_POST['id'];
            if($id){
                $statusPaie = new Paiement();
                $statusPaie->setId($id);
                $verif = $statusPaie->statusVerifPaie();
    
                if ($verif) {
                   
                    header("location:".base_url."paiement/paie");
                }else {
                   
                    header("location:".base_url."paiement/paie");
                }
            }
           
        }
    
    }
}