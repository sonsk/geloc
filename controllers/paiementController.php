<?php
require_once('models/paiement.php');

class paiementController{

    public function paie(){
        $buy = new Paiement();
        $buy->setRenderId($_SESSION['identity']->id);
        $paiement = $buy->findAllByRender();

        
        $verifAlert = $buy->alertPaie();
        $_SESSION['verifpaie'] = true;
        if($verifAlert == 0){
            $_SESSION['verifpaie'] = 'retard';
        }else{
            $_SESSION['verifpaie']= 'ajour';
        }
        
        require_once('views/user/render/paiement.php');
        
    }
    public function verif(){
        require_once('views/user/render/verifPaie.php');
    }
    public function confirm(){
        require_once('views/user/admin/confirmPaie.php');
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
    public function confirmPaie(){
        $id = $_POST['id'];
        $render_id = $_POST['render_id'];
        if($id && $render_id){
            $statusPaie = new Paiement();
            $statusPaie->setId($id);
            $statusPaie->setRenderId($render_id);
            if(isset($_POST['accept'])){
           
                $confirm = $statusPaie->statusConfirmPaie();
    
                if ($confirm) {
                   
                    header("location:".base_url."paiement/admin");
                }else {
                   
                    header("location:".base_url."paiement/admin");
                }
            }else if(isset($_POST['rejet'])){
                $rejet = $statusPaie->statusDenyPaie();
                if ($rejet) {
                   
                    header("location:".base_url."paiement/admin");
                }else {
                   
                    header("location:".base_url."paiement/admin");
                }
            }
           
        }
    
    }
    public function admin(){
        $attentepaie = new Paiement();
        $countable = new Paiement();
        $count = $attentepaie->countAttentePaie();
        $countP = $countable->countPayed();
        $countL = $countable->countLate();
        $viewAttente = $attentepaie->viewAttenteConfirm();
        require_once('views/user/admin/dashboard.php');
    }
}