    
    <?php if(empty($paiement)):?>
        <div class='container alert alert-primary alert-dismissible fade show text-center mt-5 ' role='alert'>
                <strong>Bienvenue sur GELOC vos paiements s'afficheront ici!! </strong>
                    
        </div>
        <?php else:?>
    
        <?php if(isset($_SESSION['verifpaie']) && ($_SESSION['verifpaie'] == 'retard')):?>
            <div class='container alert alert-danger alert-dismissible fade show text-center mt-5 ' role='alert'>
                <strong>Vous êtes en retard dans vos paiements </strong>
                    
            </div>
            <?php elseif(isset($_SESSION['verifpaie']) && ($_SESSION['verifpaie'] == 'ajour')):?>
                <div class='container alert alert-success alert-dismissible fade show text-center mt-5' role='alert'>
                    <strong>Vous êtes à jour dans vos paiements </strong>
                    
                </div>
            
        <?php endif;?>
    <?php endif;?>
    <div class="container mt-5">
        <?php if(!empty($paiement)): ?>
        <h5>Mes paiements</h5>
        <div>
        <table class="table">
                        <thead style="background-color: white; border-radius:10px;border-bottom:5px solid #0C386A;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($paiement as $paiement):?>
                        <tr>
                        
                            <th scope="row"><?php echo "";?></th>
                            <td><?php echo $paiement->periode;?></td>
                            <td><?php echo $paiement->montant;?></td>
                            <td><?php echo $paiement->designation;?></td>
                            <td>
                                <?php if($paiement->status == 0):?>
                                    <a href="<?=base_url?>paiement/verif&id=<?=$paiement->id?>">impayé</a>
                                    <?php elseif($paiement->status == 1):?>
                                        <p>En cours...</p>
                                        <?php elseif($paiement->status == 2):?>
                                        <p>Payé</p>
                                <?php endif;?>
                            </td>
                        
                        </tr>
                        <?php endforeach;?>
                    
                    </tbody>
                </table>
        </div>
        <?php endif;?>
    </div>