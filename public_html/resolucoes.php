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


</head>

<?php require_once("header.php") ?>

<body>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Resoluções
                </h1>
                <ol style="font-size:15pt" class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Resoluções</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div>

          <div >
            <form method="POST" action=''>
              <ul class="table-hover">
                <table class="table table-hover" >
                  <div class="col-md-6 col-md-offset-2 ">
                    <input type="text" class="form-control"placeholder="Descrição" />
                  </div>
                  <div class="col-md-1">
                    <button class="btn btn-warning"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp&nbspBuscar</button>
                  </div>
                <?php
                          $query = mysql_query("SELECT *FROM `ccecomp_resolucoes`"); //Consulta banco de dados

                          if(mysql_num_rows($query) > 0){ //Existe resolucoes cadastradas

                                if(mysql_num_rows($query) == 1){
                                echo"  <thead >
                                <tr>
                                <th>Tipo</th>
                                <th><a style='float:right'>Número</a></th>
                                <th><a style='float:right'>Download</a></th>
                                <th><a style='float:right'>Remover</a></th>
                                </tr>
                                </thead>
                                <tbody>";
                                }

                            while($news = mysql_fetch_array($query)){

                                 $tipo = $news['Tipo'];
                                 $numero = $news['Numero'];
                                 $descricao = $news['Descricao'];
                                 $documento = $news['Arquivo'];
                                 $id = $news['ID'];

                                 echo "


                                   <div class='collapse' id='$id'>
                                   </div>
                                     <tr>
                                       <td>$tipo</td>
                                       <td><div style='float:right'>$numero</div></td>
                                       <td><button name='downloadResolucoes' value='$id'style='float:right' type='submit' class='btn btn-warning'>Download</button></td>
                                       <td><button name='removerResolucoes' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button></td>
                                     </tr>


                                  ";
                            }


                          }
                          else{
                            echo "<div class='alert alert-danger col-md-6 col-md-offset-2'><p align='justify'>Não existe nenhuma resolução cadastrada. </p></div>";
                          }

                  ?>
                </tbody>
              </table>


              </ul>
            </form>

          </div>

          <!-- /.col-lg-12 -->
        </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <?php require_once("footer.php") ?>

</body>

</html>
