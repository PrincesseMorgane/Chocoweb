<?php

class team
{
   public $chefs;

   function __construct()
   {
       $this->chefs = $this->getTeams();
   }

   public function getTeams ()
   {

       require_once('models/Chef.php');
       $chef1 = new Chef(1, 'fr');
       $chef2 = new Chef(2, 'fr');
       $chef3 = new Chef(3, 'fr');

       return [$chef1, $chef2, $chef3];
   }
}