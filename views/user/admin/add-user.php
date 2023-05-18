<div class="container rounded bg-white mt-5 mb-5">
<form class="form-group" method="POST" action="<?=base_url?>render/addRender" enctype="">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="rounded-div">
                <input type="file" name="img" id="profile-photo-input" class = "form-control-file"  >
                <i class="camera-icon fas fa-camera"></i>
                <img id="image-preview" src="#" alt="Photo sélectionnée" style="display: none;">
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Nouveau Locataire</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" name="nom" placeholder="nom" value=""></div>
                    <div class="col-md-6"><label class="labels">Prenom</label><input type="text" class="form-control" name="prenom" value="" placeholder="prenom"></div>
                </div>
                <div class="row mt-3">
                
                    <div class="col-md-12"><label class="labels">Telephone</label><input type="tel" class="form-control" name="tel" placeholder="numero de Telephone" value=""></div>
                    <div class="col-md-12"><label class="labels">email</label><input type="email" class="form-control" name="email" placeholder="Email" value=""></div>
                    <div class="col-md-12"><label class="labels">Mot de passe</label><input type="password" class="form-control" name="password" placeholder="*******" value=""></div>
                </div>
                
                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Enregistrer" ></div>
            </div>
        </div>
        <div class="col-md-4">
           
        </div>
    </div>
</form>
</div>
