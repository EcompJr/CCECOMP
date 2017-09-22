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


    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="images/favicon.ico">

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
                <h1 class="page-header">TCC
                </h1>
                <ol style="font-size:15pt" class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">TCC</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
<br>
        <!-- Content Row -->
        <div class="row">
         <div style="background-color:#f0ad4e"class="col-md-3 col-md-offset-2 jumbotron"  >
            <h4 style="color:white"> Consulte TCCs abaixo &nbsp<span style="color:white"class="glyphicon glyphicon-search"></span></h4><br>
            <button data-toggle="collapse" class="btn btn-default" data-target="#infotext1">Ler mais...</button>
            <br><br>
            <p id="infotext1" class="collapse container" style="font-size:12px;background-color:white;border-radius:10px;">Procure por um TCC digitando o nome do aluno/orientador ou nome do TCC no campo indicado. Utilize palavras-chaves.</p>
         </div>

        <div style="background-color:#f0ad4e" class="col-md-3 col-md-offset-1 jumbotron">
          <h4 style="color:white"> Cadastre seu TCC entrando em contato &nbsp<span style="color:white" class="glyphicon glyphicon-phone-alt"></span></h4>
          <button data-toggle="collapse" class="btn btn-default" data-target="#infotext2">Ler mais...</button>
           <br><br>
          <p id="infotext2" class="collapse container" style="font-size:12px;background-color:white;border-radius:10px;">Compareça a sede do colégiado para solicitar o cadastro do documento.</p>
       </div>
        </div>
      </div>

<br><br>

<div class="col-md-6 col-md-offset-2 ">
  <input type="text" class="form-control"placeholder="Nomes/Palavra-chave" />
</div>
<div class="col-md-1">
  <button class="btn btn-warning"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp&nbspBuscar</button>
</div>
      <div class="row">

                <div class="col-md-7 col-md-offset-2">

                  <table class="table table-hover" style="border-radius:10px;">

                    <thead >
                       <tr>
                         <th>Aluno</th>
                         <th>Nome do TCC</th>
                         <th>Data de publicação</th>
                       </tr>
                    </thead>
                 <tbody>
                    <tr>
                      <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspDuis sed porttitor arcu. Pellentesque.</td>
                      <td>Sed mattis vel velit eget</td>
                      <td>01/09/2017</td>
                    </tr>

                    <tr>
                      <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspFusce vel leo quis metus.</td>
                      <td> Pellentesque habitant morbi tristique senectu</td>
                      <td>02/05/2017</td>
                    </tr>

                    <tr>
                      <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspPraesent pellentesque eu purus quis.</td>
                      <td>Fusce cursus nisi id orci.</td>
                      <td>05/10/2017</td>
                    </tr>



                 </tbody>
                  </table>




                </div>

            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <?php require_once("footer.php") ?>

</body>

</html>
