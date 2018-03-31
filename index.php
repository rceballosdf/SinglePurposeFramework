<?php
$t = microtime(true);
$micro = sprintf("%06d",($t - floor($t)) * 1000000);
$start_datetime = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
require "./framework/core/Framework.class.php";
Framework::run($start_datetime);
?>