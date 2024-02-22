<?php
    /*
    * Goober MVC main file
    *
    * A kind of faux MVC as a demo site
    * this section handles url mappings and loads the correct modules
    *
    * author: Jim Barry
    * date: 2024-02-02
    */

    define('DEFAULT_MODULE', 'index') ;
    define('DEFAULT_VIEW', 'index') ;
    define('DEFAULT_URL', '/') ;

  
    require_once("../lib/db.php") ;
    // We need to figure out out here the name of the controller to include the file
     
    class gooberCMS {
        //Properties
        public $moduleName = DEFAULT_MODULE ;
        public $viewName = DEFAULT_VIEW ;
        public $url = DEFAULT_URL ;
        public $parms = array() ;
        public $parmsrc = array() ;
        public $parts = array() ;
        public $segments = array() ;
        public $gdb ;
        public $module ;

        //Methods
        function __construct() {
            $this->set_module_and_view();
            $this->gdb = new db() ;
        }

        public function loadModule() {
            $contFullName = $this->moduleName . "_" . $this->viewName . "_controller.php" ;
            $contModName = $this->moduleName . "_controller.php" ;
            $contPath = "" ;
            // is there an action specific controller
            if(file_exists("../lib/modules/" . $this->moduleName . "/controller/$contFullName")) {
                $contName = $this->moduleName . "_" . $this->viewName ;
                $contPath = "../lib/modules/" . $this->moduleName . "/controller/$contFullName" ;
                echo "Found action specific controller<br />" ;
            // is there a module controller
            } elseif(file_exists("../lib/modules/" . $this->moduleName . "/controller/$contModName")) {
                $contName = $this->moduleName ;
                $contPath = "../lib/modules/" . $this->moduleName . "/controller/$contModName" ;
                echo "Found module specific controller<br />" ;
            } else {
                echo "No Controller found<br />" ; die() ;
            }

           // $this->module = new 
            echo "Hello" ; die() ;
        }

        private function set_module_and_view() {
            if(isset($_SERVER) && isset($_SERVER["REQUEST_URI"]) && (strlen($_SERVER["REQUEST_URI"]) > 0) ) {
                //TODO: Make the uri string safe
                $url = $_SERVER["REQUEST_URI"] ;
                $this->parts = array() ;

                // seperate comand line arguments from the path
                $this->segments = explode("?",$url,2) ;

                if(count($this->segments) > 0 && $this->segments[0] > "") {
                    // split the uri into an array of elements
                    $this->parts = explode("/",$this->segments[0]) ;

                    // Get the first part of the uri to indicate the desired module to load
                    if(count($this->parts) > 1) {
                        if(strlen($this->parts[1]) > 0) {
                            $this->moduleName = strtolower($this->parts[1]) ;
                        } else {
                            $this->moduleName = "index" ;
                        }
                    }
                    
                    // Get the second part of the uri to indicate the desired view to load
                    if(count($this->parts) > 2) {
                        if(strlen($this->parts[2]) > 0) {
                            $this->viewName = strtolower($this->parts[2]) ;
                        } else {
                            $this->viewName = "index" ;
                        }
                    }

                    // Apply the remaining parts of the uri to the parm array
                    // following the format {name,value,name,value}
                    $i = 3 ;
                    while(count($this->parts) > $i) {
                        if(strlen($this->parts[$i]) > 0) {
                            if($this->parts[$i + 1] > "") {
                                $this->parmsrc[$this->parts[$i]] = "u" ;
                                $this->parms[$this->parts[$i]] = $this->parts[++$i] ;
                                if($this->parts[$i - 1] == "null") {
                                    $this->parts[$i - 1] = null ;
                                }
                            } else {
                                $this->parmsrc[$this->parts[$i]] = "u" ;
                                $this->parms[$this->parts[$i]] = null ;
                            }
                            $i++ ;
                        }
                    }

                    // update the parms array from the _GET array
                    foreach($_GET as $vname => $vval) {
                        $this->parmsrc[$vname] = "g" ;
                        $this->parms[$vname] = $vval ;
                    }

                    // update the parms array from the _POST array
                    foreach($_POST as $vname => $vval) {
                        $this->parmsrc[$vname] = "p" ;
                        $this->parms[$vname] = $vval ;
                    }
                }
            }
          
        } 
    }
?>