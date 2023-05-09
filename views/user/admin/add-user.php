<div class="container rounded bg-white mt-5 mb-5">
<form class="form-group" method="POST" action="<?=base_url?>user/addRender">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
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
                <!-- <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div> -->
                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Enregistrer" ></div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><h5>Informations supplémentaires</h5></div><br>
                <div class="col-md-12"><label class="labels">Ancien quartier</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Source de revenus</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div> -->
        </div>
    </div>
</form>
</div>
