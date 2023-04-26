<?php
class errorController
{
    public function index()
    {
        echo"<h1> page introuvable!</h1>";
    }
    public function retard()
    {
        echo"<div class='alert alert-danger alert-dismissible fade show text-center mt-5' role='alert'>
        <strong>retard de paiement </strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }
    public function good()
    {
        echo"<div class='alert alert-success alert-dismissible fade show text-center mt-5' role='alert'>
        <strong>paiement à jour </strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";

     
    }
}