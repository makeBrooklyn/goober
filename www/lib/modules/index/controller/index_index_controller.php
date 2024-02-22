<?php
   /*
   * Goober MVC default module controller file.
   *
   * This module is the one that executes at the site root where there
   * is no module specified.
   *
   * author: Jim Barry
   * date: 2024-02-08
   */
class index extends goobermod {
   public $somevar ;
   public $view ;

   public function __construct() {
      parent::__construct() ;

   }

   public function loadModule() {
      $this->somevar = "Hola Mijo!" ;
   }

   public showModule() {
      echo $view ;
   }
}
?>