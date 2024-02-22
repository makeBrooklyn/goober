    <!-- This is the Debug section. It shows up beneath the footer -->
    <?php if($DEBUG) { ?><!-- START DEBUG SECTION -->

<section class='dbtest'>
  <?php
    echo "<hr style='clr' />PART COUNT: " . count($goober->parts) . "<br />MODULE: " . $goober->moduleName . "<br />VIEW: " . $goober->viewName . "<br />" ; 
    echo "CWD:" . getcwd() . "<br />" ;
    echo "The Parms Array:<pre>\n" . print_r($goober->parms, true) . "\n</pre>" ;
    echo "The Parmsrc Array:<pre>\n" . print_r($goober->parmsrc, true) . "\n</pre>" ;
    echo "The Parts Array:<pre>\n" . print_r($goober->parts, true) . "\n</pre>" ;
    echo "The Segments Array:<pre>\n" . print_r($goober->segments, true) . "\n</pre>" ;
    echo "<hr style='clr' />The \$goober Object:<pre>\n" . print_r($goober,true) . "\n</pre><br />" ;
    echo "<hr style='clr' />The \$_SERVER Array:<pre>\n" . print_r($_SERVER,true) . "\n</pre><br />" ;
  ?>
</section>
<?php } ?><!-- END DEBUG SECTION -->
