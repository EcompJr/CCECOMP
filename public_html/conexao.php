<?php

$con = @mysql_connect("localhost", "root", "") or die("Não foi possível conectar ao BD!");
mysql_select_db("u897514172_cceco", $con) or die("Banco não localizado!");
?>
