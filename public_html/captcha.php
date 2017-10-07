
<?php





//Constroi imagem para evitar spam
$codigo = substr(md5(time()),0,8);

$_SESSION['captcha'] = $codigo; //para vetificar corretude


$captchaImagem = imagecreatefrompng("images/captcha.png");


$fontDoCaptcha = imageloadfont("fonts/anonymous.gdf");

$corDoCaptcha = imagecolorallocate($captchaImagem, 40,30,230);

imagestring($captchaImagem,$fontDoCaptcha,300,100,$codigo,$corDoCaptcha);


imagepng($captchaImagem);
imagedestroy($captchaImagem);






?>
