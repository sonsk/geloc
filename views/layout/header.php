
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    <script type="text/javascript" src="<?=base_url?>assets/js/index.js" defer></script>
    <title>Geloc</title>
</head>
<body>
<div class="contain">


        
    <header class="header">
        <div class="container-fluid ">
            <nav class="navbar sticky-top  flex-md-nowrap p-0 shadow">
                <div class="logo ml-4" >
                    <h2><a href="<?=base_url?>">GELOC</a></h2>
                </div>
                <div class="row login">
                    <?php if (!isset($_SESSION['identity'])): ?>
                        <h5 class="mr-5"> <?="Connexion"?></h5>
                         
                            <?php else:?>
                                <div class="dropdown mr-5">
                                <h5 class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$_SESSION['identity']->nom?>
                                </h5>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php if(isset($_SESSION['admin'])): ?>
                                        <a class="dropdown-item" href="#">Manage locataire</a>
                                        <a class="dropdown-item" href="#">Manage</a>
                                    <?php endif;?>
                                    
                                    <a class="dropdown-item" href="<?=base_url?>user/test">Profil</a>
                                    <a class="dropdown-item" href="<?=base_url?>paiement/paie">Paramètres</a>
                                    <a class="dropdown-item" href="<?=base_url?>user/logout">Deconnexion</a>
                                </div>
                            </div>
                            <div class="mr-4">
                            </div>
                            <?php endif;?>
                                
                            
                                
                </div>
            </nav>
        </div>

    </header>

