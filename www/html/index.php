<?php
  /*
  * jimbarry.co main site appliaction
  *
  * A kind of faux MVC as a demo site
  * 
  * author: Jim Barry
  * date: 2024-02-02
  */

  require_once("config.php") ;
  // we need to define the module and action/view in order to include the files
  require_once("pathdecoder.php") ;
  require_once("../lib/modules/gooberview.php") ;
  require_once("../lib/modules/goobermod.php") ;
  require_once("goober.php") ;
  $goober = new gooberCMS() ;
  //$goober->loadModule() ;
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jimbarry.co - um ... hi!</title>

    <!-- Style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Load hear files for the theme -->
    <?php require("../theme/" . $site_theme . "/head.php") ?>
    <!-- Scripts -->

  </head>

  <body>
    <!-- Load theme main file here -->
    <?php require("../theme/" . $site_theme . "/main.php") ?> ;
    <!-- End theme inclusion -->
    <?php require_once("sitedebug.php") ; ?>

    <!-- Scripts to load last -->

  </body>

</html>
