<section class="login-section hidden">
        <div class="login-container">
            <div class="login-box">
                <i class="close fas fa-times-circle"></i>
                <div class="login-title">
                    <h3>CONFIRMER LE PAIEMENT</h3>
                </div>
            <form action="<?=base_url?>paiement/verifPaie" method="POST" id="login-form" class="login-form">
                <div class="form-group">
                    <input type="hidden"  name="id" value="<?=$_GET['id']?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-login" value="CONFIRMATION">
                </div>
            </form>
            <div class="form-group">
                  <a href="<?=base_url?>paiement/paie"><button type="button" class="btn btn-login" value="">ANNULER</button></a>
                </div>
            
        </div>
    </div>
</section>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->