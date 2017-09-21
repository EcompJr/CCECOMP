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

        <!-- Content Row -->
        <div class="row">
         <div class="col-md-3 col-md-offset-1 jumbotron"  >
           <h4> Consulte TCCs abaixo </h4>
         </div>

        <div class="col-md-3 col-md-offset-1 jumbotron">
          <h4> Envie o seu TCC para a equipe do colégiado</h4>
        </div>
      </div>


      <div class="row">

                <div class="col-md-6 col-md-offset-2">

                  <table class="table table-hover" style="border-radius:10px;">

                    <thead>
                       <tr>
                         <th>Aluno</th>
                         <th>Nome do TCC</th>
                         <th>Data de publicação</th>
                       </tr>
                    </thead>
                 <tbody>
                    <tr>
                      <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspBruno Gonzaga de Mattos Vogel</td>
                      <td>AVAA: Ambiente virtual de aprendizagem de algoritmos</td>
                      <td>01/12/2017</td>
                    </tr>

                    <tr>
                      <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspFusce vel leo quis metus.</td>
                      <td> Pellentesque habitant morbi tristique senectu</td>
                      <td>02/05/2017</td>
                    </tr>
                 </tbody>
                  </table>




                </div>
                <div class="col-md-2 ">
                  <input type="text" class="form-control"placeholder="Aluno/Data" />
                </div>
                <div class="col-md-1">
                  <button class="btn btn-info"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp&nbspPesquisar</button>
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
