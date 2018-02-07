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
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php require_once("header.php") ?>

<body>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contato
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Contato</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.7227353532917!2d-38.97395058571949!3d-12.199259698076133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x714388c2af92357%3A0xf06781118830e1ef!2sLabotec+3+-+Laborat%C3%B3rios+de+Engenharia+de+Computa%C3%A7%C3%A3o%2C+UEFS!5e0!3m2!1spt-BR!2sbr!4v1510116021403" width="700" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
                <!-- Embedded Google Map -->
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Contato</h3>
                <p><i class="fa fa-map-marker"></i>
                    <b>Endereço</b>: </br>
                    Colegiado do Curso de Engenharia de Computação </br>
                    LABOTEC III - SALA I8, UEFS </br>
                    Av. Transnordestina, S/N </br>
                    Bairro: Novo Horizonte </br>
                    CEP: 44036-900 </br>
                    Feira de Santana/BA </br>
                </p>
                <p><i class="fa fa-phone"></i>
                    <b>Tel/Fax</b>: +55 75 3161-8385</p>
                <p><i class="fa fa-envelope-o"></i>
                    <b>Email</b>: <a href="mailto:ccecomp@ecomp.uefs.br">ccecomp@ecomp.uefs.br</a>
                </p>
                <p><i class="fa fa-clock-o"></i>
                    <b>Horários de Funcionamento</b>: </br>
                    Segundas-Feiras das 13:00 às 19:00. </br>
                    Terças-Feiras das 7:00 às 13:00. </br>
                    Quartas-Feiras das 13:00 às 19:00. </br>
                    Quintas-Feiras das 7:00 às 13:00. </br>
                    Sextas-Feiras das 7:00 às 13:00. </br>
                </p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a target="_blank"href="http://www.facebook.com/ecompuefs"><i  class="fa fa-facebook-square fa-3x"></i></a>
                    </li>
                  
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
          	<section style="background-color:#f0ad4e;padding:10px;border-radius:10px"  id="footer">

				<div class="inner">
					<header>
						<h2 style="color:white">Deixe-nos uma mensagem</h2>
					</header>
					<form method="post" action="">
						<div class="field half first">
							<label style="color:white"for="name">Nome</label>
							<input class="form-control" type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label style="color:white" for="email">Email</label>
							<input  class="form-control"type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label style="color:white" for="message">Mensagem</label>
							<textarea class="form-control"rows="20"name="message" id="message" rows="6"></textarea>
						</div>
						<ul class="actions">
							<li><button class="btn btn-primary" name="sendEmail" type="submit"  >Enviar Mensagem</button></li>
						</ul>
					</form>
				</div>
			</section>

        <!-- /.row -->

<?php
if(isset($_POST['sendEmail'])){
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $message = $_POST['message'];
        $corpo  = "Nome: ".$name."\n";
        $corpo .= "Email: ".$email."\n";
        $corpo .= "Mensagem: ".$message."\n";
        if(mail("ccecomp@ecomp.uefs.br","Enviado do site CCECOMP",$corpo, 'From:'.$email)){
          echo  "<script>alert('email enviado com sucesso')</script>";
        } else {
          echo "<script>alert('Erro ao enviar e-mail')</script>";
        }
        }
?>

        <hr>

    </div>
    <!-- /.container -->
 <?php require_once 'editPage.php';?>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <?php require_once("footer.php") ?>

</body>

</html>
