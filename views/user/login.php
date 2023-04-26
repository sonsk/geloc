 <!-- Login Modal  -->

        <div class="container row" >
            <div class="col-md-8">
                <img class=" w-75" src="<?=base_url?>assets/images/home.png" alt="home"/>
            </div>
            <div class="container text-center col-md-3" style="padding-top:90px;">
                
            <div class="login-title">
                <h3>Connexion:</h3>
            </div>
                <form  action="<?=base_url?>user/login" method="POST"  class="container form-group">
                    
                    <div class="row form-group">
                        <label for="mail-login">Email:</label>
                        <input type="email" name="mail-login" id="mail-login" class="form-control ">
                    </div>
                    <div class="row form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-login" value="Login" class="form-control">
                    </div>
                </form>
                <div class="isRegistered">
                    <p>Créer un compte bailleur?<span class="text-strong" onclick="show(this)"> Cliquez ici!</span></p>
                </div>
            </div>
        </div>


