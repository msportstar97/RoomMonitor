<?php
$title = "Room Monitor";

$content = "<h3> Room Data </h3>";
ob_start();
include 'table.php';
$content1 = ob_get_clean();

include 'layout.php';

?>
