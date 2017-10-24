<?php
# Nome do arquivo php
$pagename = "novapage.php";

# Texto a ser salvo no arquivo
$texto = "<h1>Test Page</h1>";

#Criar o arquivo
$fp = fopen($pagename , "w");
$fw = fwrite($fp, $texto);

#Verificar se o arquivo foi salvo.
if($fw == strlen($texto)) {
   echo 'Arquivo criado com sucesso!!';
}else{
   echo 'falha ao criar arquivo';
}
?>