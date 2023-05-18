<div class="container rounded bg-white mt-5 mb-5">
<form class="form-group" method="POST" action="<?=base_url?>profile/updateProfile">
    <div class="row">
        
        <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class=" dropdown text-center float-right ">
                                <h5 class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                </h5>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php if($_SESSION['identity']->image != null):?>

                                        <!-- supprimer la photo -->
                                        <form method="POST" action="">
                                           <p class="dropdown-item">
                                          
                                           <input type="submit" class="btn border border-success" value="Supprimer">
                                            </p>
                                        </form>
                                        <!-- modifier la photo -->
                                        <form method="POST" action="">
                                           <p class="dropdown-item">
                                          
                                           <input type="submit" class="btn border border-success" value="Modifier">
                                            </p>
                                        </form>
                                        <!-- afficher la photo -->
                                        <form method="POST" action="">
                                           <p class="dropdown-item">
                                          
                                           <input type="submit" class="btn border border-success" value="Afficher">
                                            </p>
                                        </form>
                                   <?php else:?>
                                    <!-- ajouter la photo -->
                                    <form method="POST" action="">
                                           <p class="dropdown-item">
                                          
                                           <input type="submit" class="btn border border-success" value="Enregistrer">
                                            </p>
                                        </form>
                                    <?php endif;?>
                                    
                                </div>
                            </div>
                        <?php if(isset($_SESSION['identity']->image) && $_SESSION['identity']->image != null):?>
                            <div class="rounded-div zoom-container">
                            <img class=""  id="zoom-image" src="<?=base_url.$_SESSION['identity']->image?>" alt="">
                            
                            </div>
                            <span class="font-weight-bold"><?=$_SESSION['identity']->nom?></span>
                            <span class="text-black-50"><?=$_SESSION['identity']->email?></span>
                            <span> </span>
                            
                        <?php else:?>
                            <form class="form-group" method="POST" action="<?=base_url?>profile/updateProfilePic" enctype="multipart/form-data">
                            
                                <div class="rounded-div image-container ">
                                    <input type="file" name="img" id="profile-photo-input" class = "form-control-file"  >
                                    <i class="camera-icon fas fa-camera"></i>
                                    <img id="image-preview" src="#" alt="Photo sélectionnée" style="display: none;">
                                   
                                </div>
                                
                                <span class="font-weight-bold"><?=$_SESSION['identity']->nom?></span>
                                <span class="text-black-50"><?=$_SESSION['identity']->email?></span>
                                <span> </span>
                                <input type="submit" class="btn btn-success" value="modifier">
                            </form>
                        <?php endif;?>
                    </div>
        </div>
        
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Modifier mon profil</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="<?=$nom?>" value="<?=$nom?>">
                    </div>
                    <div class="col-md-6"><label class="labels">Prenom</label>
                    <input type="text" class="form-control" name="prenom"  placeholder="" value="<?=$prenom?>">
                </div>
                </div>
                <div class="row mt-3">
                
                    <div class="col-md-12"><label class="labels">Telephone</label>
                        <input type="tel" class="form-control" name="tel" placeholder="<?=$tel?>" value="<?=$tel?>">
                    </div>
                    <div class="col-md-12"><label class="labels">email</label>
                        <input type="email" class="form-control" name="email" placeholder="" value="<?=$email?>">
                    </div>
                    <div class="col-md-12"><label class="labels">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="" value="">
                    </div>
                    <div class="col-md-12"><label class="labels">Mot de passe</label>
                        <input type="password" class="form-control" name="oldPassword" placeholder="confirmez l'ancien mot de passe" value="">
                    </div>
                </div>
                
                <div class="mt-5 text-center">
                    <input type="submit" class="btn btn-primary profile-button" value="Enregistrer" >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <h5>Informations supplémentaires</h5>
                </div><br>
                <div class="col-md-12">
                    <label class="labels">Ancien quartier</label>
                    <input type="text" class="form-control" placeholder="experience" value="">
                </div> <br>
                <div class="col-md-12">
                    <label class="labels">Source de revenus</label>
                    <input type="text" class="form-control" placeholder="additional details" value="">
                </div>
            </div>
        </div>
    </div>
</form>
</div>
