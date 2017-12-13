<?php
session_start();
require_once 'conexao.php';
if(isset($_SESSION['auth']) ){ //Confere se já esta logado
        if($_SESSION['auth']){
                  header("location:dashboardADM.php");
        }
}
//$string = 'ccecomp@ecomp.uefs.br';
//$codificada = md5($string);
//echo "Resultado da codificação usando md5: " . $codificada;

         //Faz login
   if(isset($_GET['login'])){
       if($_GET['login'] == 'go'){ //Logou
               $login = $_POST['login'];
               $senha = $_POST['senha'];
               $cLogin = md5($login);//165a6a37f518d2bd5d5736a9b78744c5
               $cSenha = md5($senha);//9a47fca26e5cda761ef7f4f8aae11b0a



               $secretKey = "6LfA4TkUAAAAAPWG23mIr5EAD3F8-EBEnM2_uas8";
               $responseKey = $_POST['g-recaptcha-response'];
               $userIP = $_SERVER['REMOTE_ADDR'];
               $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
               $response = file_get_contents($url);
               $response = json_decode($response);
               $query = mysql_query("SELECT * FROM `administradores` WHERE `Login`= '$cLogin' AND `Senha`= '$cSenha'");
               if(mysql_num_rows($query) == 1){ //Existe um administrador com este login e senha
                     if($response->success){
                        $_SESSION['auth'] = True;
                        header("location:dashboardADM.php");
                     }
                     else {
                        echo "<script>alert('Verificação não efetuada!')</script>";
                     }
               }
               else{
                     echo "<script>alert('Login ou senha inválido!')</script>";
               }
       }
   }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCECOMP UEFS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="images/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<?php require_once 'header.php'; ?>

<body>
    <style>
        .jumbotron {
            width: 500px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            border-radius: 20px;
        }
        .table {
            size: 20px;
        }
    </style>

    <div class="jumbotron container">
        <form method="POST" action="?login=go">
            <h2>Login</h2>
            <input name="login" class="form-control" type="text" placeholder="Usuário" /> </br>
            <input name="senha" class="form-control" type="password" placeholder="Senha" /> </br>

            <div class="text-center"><div class="g-recaptcha" data-sitekey="6LfA4TkUAAAAAEPyUZEAXbNTGehnUvx2yR-LKo-h"></div></div>
            <br>
        <input class="btn btn-warning"type="submit" value="Entrar">
       </form>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>
<br><br><br>
    <?php require_once 'footer.php'; ?>

</body>

</html>
