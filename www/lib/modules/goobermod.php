<?php
   /*
   * Goober MVC base module file.
   *
   * This is not a module that will be used anywhere. It will however be the
   * base object that module objects extend.
   *
   * author: Jim Barry
   * date: 2024-02-08
   */

   class goobermod {
      private $_db ;
      public $view ;
      public $modName ;
      public $viewName ;
   

      function __construct() {
         $view = new gooberview() ;
         $this->_db = new db() ;
         $this->view->_db = $this->_db ;
         $modName = $goober->moduleName ;
         $viewName = $goober->viewName ;
     }      
   }
  ?>