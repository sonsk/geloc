<?php

require_once('models/contrat.php');

class contratController {
   
    public function index() {
        $contrat = new Contrat();
        $contrat->setUserId($_GET['renderId']);
        $checkcontrats = $contrat->checkContrat();
        $contrats = $contrat->contratByRender();
        if ($checkcontrats === false) {
            require_once('views/contrat/newcontrat.php');
        }else{
            require_once('views/contrat/contrat.php'); 
        }
        
       
    }
}