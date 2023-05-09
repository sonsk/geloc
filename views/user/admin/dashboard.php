<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto justify-content-between">
      <li class="nav-item active">
        <p class="navbar-text">attente de confirmation  <span class="badge badge-pill badge-warning rounded-pill"><?=$count?></span></p>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">les percus du mois <span class="badge badge-pill badge-success rounded-pill"><?=$countP?></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">les retards  <span class="badge badge-pill badge-danger rounded-pill"><?=$countL?></span></a>
      </li>
    </ul>
    <span class="navbar-text">
      Navbar text with an inline element
    </span>
  </div>
</nav>

<table class="table mt-5">
    <?php if(!empty($viewAttente)):?>
                        <thead style="background-color: white; border-radius:10px;border-bottom:5px solid #0C386A;">
                            <tr>
                                <th scope="col">locataire</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach($viewAttente as $viewAttente):?>
                            <tr>
                            
                                <th scope="row"><?php echo $viewAttente->nom;?></th>
                                <td scope="row"><?php echo $viewAttente->periode;?></td>
                                <td scope="row"><?php echo $viewAttente->montant;?></td>
                                <td scope="row"><?php echo $viewAttente->designation;?></td>
                                <td scope="row">
                                        <a href="<?=base_url?>paiement/confirm&id=<?=$viewAttente->id?>&renderId=<?=$viewAttente->loca_id?>">confirmer</a>      
                                </td>
                            
                            </tr>
                            <?php endforeach;?>
                        
                    </tbody>
                    <?php else:?>
                                <div class="text-center">
                                    <img class=" w-50" src="<?=base_url?>assets/images/empty.png" alt="empty"/>
                                </div>
         <?php endif;?>
                </table>