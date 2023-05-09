<div class="container mt-5">
    <div class="float-right">
        <a class = "" href="<?=base_url?>user/newRender">
            <button class="btn btn-success"> nouveau locataire</button>
        </a>
    </div>
    <div class="float-left mt-5">
        <?php foreach ($renders as $render):?>
                
            <div class="">
            <?=$render->nom;?>
                
            </div>
        <?php endforeach; ?>
    </div>
</div>