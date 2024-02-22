<?php
   /*
   * Goober MVC base view file.
   *
   * This is the initial view object to be loaded in controllers.
   *
   * author: Jim Barry
   * date: 2024-02-08
   */

   class gooberview {
      private $_db ;
      public $modName ;
      public $viewName ;

      function __construct() {
         $this->_db = new db() ;
         $modName = $goober->moduleName ;
         $viewName = $goober->viewName ;     }      
   }
  ?>