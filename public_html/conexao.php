<?php

$con = @mysql_connect("localhost", "root", "") or die("Não foi possível conectar ao BD!");
mysql_select_db("ccecompbd", $con) or die("Banco não localizado!");
?>
