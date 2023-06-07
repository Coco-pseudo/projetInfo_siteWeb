<?php
//phpinfo();
$q = $_REQUEST["q"];
$tab = explode(" ",$q);
$q = strtolower($q);

var_dump($tab);
echo("<br>hello $q");
?>