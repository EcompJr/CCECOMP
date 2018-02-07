<?php session_start();
require_once 'conexao.php';
if(isset($_SESSION['auth'])) {
    //Confere se já esta logado
    if($_SESSION['auth']) {
        header("location:dashboardADM.php");
    }
} //Faz login
if(isset($_GET['login'])) {
    if($_GET['login']=='go') {
        //Logou
        $login=$_POST['login'];
        $email = $login;
        $senha=$_POST['senha'];
        $login = md5($login);
        $senha = md5($senha);
       
        $secretKey="6LfA4TkUAAAAAPWG23mIr5EAD3F8-EBEnM2_uas8";
        @$responseKey=$_POST['g-recaptcha-response'];
        $userIP=$_SERVER['REMOTE_ADDR'];
        $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        @$response=file_get_contents($url);
        @$response=json_decode($response);
        $query=mysql_query("SELECT * FROM `administradores` WHERE `Login`= '$login' AND `Senha`= '$senha'");
        if(mysql_num_rows($query)==1) {
            //Existe um administrador com este login e senha
            if(@$response->success) {
                $_SESSION['auth']=True;
                $_SESSION['email'] = $email;
                header("location:dashboardADM.php");
            }
            else{
                echo "<script>alert('Desculpe, ocorreu um problema com sua conexão')</script>";

            }
        }
        else {
            echo "<script>alert('Verificação não efetuada!')</script>";
        }
    }
    else {
        echo "<script>alert('Login ou senha inválido!')</script>";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="../images/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<?php require_once 'header.php';
?>
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

        .captcha {
            left: 20%;
            top: 20%;
            margin-left: 90px;
            /* Metade do valor da Largura */
            margin-top: -10px;
            /* Metade da valor da Altura */
        }
    </style> 


<body>
  
    <div class="jumbotron container">
        <form method="POST" action="?login=go">
            <h2>Login</h2>
            <input name="login" class="form-control" type="text" placeholder="Usuário" />
            </br>
            <input name="senha" class="form-control" type="password" placeholder="Senha" />
            </br>
            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LfA4TkUAAAAAEPyUZEAXbNTGehnUvx2yR-LKo-h"></div>
            </div>
            <br>
            <input class="btn btn-warning btn-lg" type="submit" value="Entrar">
        </form>
    </div>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            }

        )
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <br>
    <br>
    <br><br><br><br>
    <?php require_once 'footer.php';
?>
</body>

</html>