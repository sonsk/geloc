<div class="container mt-5">
    <div class="float-right">
        <a class = "" href="<?=base_url?>render/new">
            <button class="btn btn-success"> nouveau locataire</button>
        </a>
    </div>
    <div class="container float-left">
        <div class="row  mt-5">
            <?php foreach ($renders as $render):?>
            <div class="col-lg-4 col-md-6">
                <div class="card mb-4">
                <img src="avatar.jpg" class="card-img-top" alt="Avatar">
                <div class="card-body">
                    <h5 class="card-title">Informations utilisateur</h5>
                    <p class="card-text">
                    <strong>Nom :</strong> <?=$render->nom?><br>
                    <strong>Date de naissance :</strong> 01/01/1980<br>
                    <strong>Adresse :</strong> 123 Rue Principale, Ville<br>
                    <strong>Téléphone :</strong> 123-456-7890<br>
                    <strong>Email :</strong> johndoe@example.com<br>
                    </p>
                    <div class="row justify-content-between">
                        <a href="#" class="btn btn-primary ">Modifier</a>
                        <a href="<?=base_url?>contrat/index&renderId=<?=$render->id?>" class="btn btn-success ">Contrat</a>
                    </div>
                    
                </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>