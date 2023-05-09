<section class="login-section hidden">
        <div class="login-container">
            <div class="login-box">
                <i class="close fas fa-times-circle"></i>
                <div class="login-title">
                    <h3>CONFIRMER LE PAIEMENT</h3>
                </div>
            <form action="<?=base_url?>paiement/confirmPaie" method="POST" id="login-form" class="login-form">
                <div class="form-group">
                    <input type="hidden"  name="id" value="<?=$_GET['id']?>">
                    <input type="hidden"  name="render_id" value="<?=$_GET['renderId']?>">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-login" name="accept" value="">CONFIRMER</button>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-login" name="rejet" value="">REJETER</button>
                </div>
            </form>
            
            
        </div>
    </div>
</section>