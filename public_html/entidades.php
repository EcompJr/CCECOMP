
<?php

require_once 'addPageEntidades.php';

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

    <link href='../css/bootstrap-dropdownhover.min.css' rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="../images/favicon.ico">

    
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

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
                <h1 class="page-header">Entidades
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Entidades</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
      <form method='POST' action=''>
            <div class="col-lg-12">
                <h2 class="page-header"> <a href="ecompjr.php"> EcompJr </a> </h2>

                <h2 class="page-header"> <a href="pet.php"> PET Engenharias </a> </h2>

                <h2 class="page-header"> <a href="ieee.php"> Ramo IEEE </a></h2>

                <h2 class="page-header"> <a href="daecomp.php"> DA de Engenharia de Computação </a></h2>

               <?php require_once('listAddPageEntidades.php') ?>



            </div>
          </form>
        </div>
  <br><br><br><br>
        <hr>

    </div>


    <div class='modal fade' id='CadastrarPageEntidade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
        <div class='modal-dialog modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title' id='myModalLabel'>Cadastrar Nova Página de Entidade</h4>
            </div>
            <div id='bodyRegister'class='modal-body text-justify'>
              <form method='POST' action='' enctype='multipart/form-data'>
              <label required='true'for='sectionsNumber'>Nome da Entidade*</label>
              <input  name='entityName' maxlength='200' class='form-control' />
              <br>
              <label required='true' for='description'> Descritivo*</label>
              <textarea rows='5' name='description' class='form-control' type='text' ></textarea>
              <br>
              <label for='iframe'>Localização</label>
              <label style='font-size:7px'>Adicione a tag iframe. Obtenha pelo <a target='_blank' href='https://www.google.com.br/maps/place/Feira+de+Santana+-+Maria+Quit%C3%A9ria,+Feira+de+Santana+-+BA/@-12.2439016,-39.0022771,12z/data=!3m1!4b1!4m5!3m4!1s0x71439dbd0766da9:0xed4d58d8df9d5ffe!8m2!3d-12.2597272!4d-38.9646608'>Google Maps</a> na opção: compartilhar. Utilizar tamanho pequeno. </label>
              <input class='form-control' name='iframe'>
              <br>
              <label for='site'>Site da organização</label>
              <input name='site' class='form-control' />
              <br>
              <label for='facebook'>Facebook</label>
              <input class='form-control' name='facebook'/>
              <br>
              <label for='instagram'>Instagram</label>
              <input class='form-control' name='instagram'/>
              <br>
              <label for='email'>Email de Contato</label>
              <input class='form-control' name='email'/>
              <br>
              <label for='phone'>Telefone de Contato</label>
              <input class='form-control' name='phone'/>
              <br>
              <label for='picture'>Foto</label>
              <input type='file' name='picture' />
              <br>
              <button class='btn btn-primary' type='submit' name='createPageEntidades' >Enviar</button>
            </form>
          </div>
        </div>
      </div>
      </div>
    <!-- /.container -->


    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src='../js/bootstrap-dropdownhover.min.js'></script>

    <?php require_once("footer.php") ?>

</body>

</html>
