<?php
session_start();
require_once 'conexao.php';


$busca = array();

//Buscar Resoluções

 if(isset($_POST['buscar'])){

     $descricaoBusca = $_POST['descricao'];

     if($descricaoBusca != ''){

     $query = mysql_query("SELECT*FROM `ccecomp_resolucoes`");

     while($linhas = mysql_fetch_array($query)){

        $descricaoBD = $linhas['Descricao'];

        if(strpos($descricaoBD, $descricaoBusca) !== false){


              $tipo = $linhas['Tipo'];
              $numero = $linhas['Numero'];
              $descricao = $linhas['Descricao'];
              $arquivo = $linhas['Arquivo'];


              array_push($busca,"

              <tr>
              <td>$tipo</td>
              <td>$numero</td>
              <td>$descricao</td>
              <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
              </tr>


              ");


        }
      }
    }
      else{

        header('location:dashboard-resolucoes.php');
      }


    if(empty($busca))
    echo "<script>alert('Não existe nenhuma resolução com esta descrição')</script>";








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
<br><br><br><br><br>
          <div >
            <form method="POST" action=''>
              <ul class="table-hover">
                <table class="table table-hover" >

                <?php


                      if(!empty($busca)){


                        echo  "

                        <form method='POST' action=''>
                              <div class='row'>
                                  <div class='col-md-10'>
                                    <input  name='descricao' type='text' class='form-control' placeholder='Descrição' />
                                    </div>
                                    <div class='col-md-1'>
                                    <button name ='buscar' type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                                  </div>
                              </div>


                          <table class='table table-hover' style='border-radius:10px;'>
                                  <thead >
                                  <tr>
                                   <th>Tipo</th>
                                   <th>Número</th>
                                   <th>Descrição</th>
                                   <th>Download</th>
                                  </tr>
                                  </thead>
                                  <tbody>

                        ";


                        for($i=0; $i<sizeof($busca); $i++){


                               echo $busca[$i];


                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "</form>";



                      }
                      else{

                          $query = mysql_query("SELECT *FROM `ccecomp_resolucoes`"); //Consulta banco de dados

                          if(mysql_num_rows($query) > 0){ //Existe resolucoes cadastradas


                                echo"
                                <div class='col-md-10 '>
                                  <input name='descricao' type='text' class='form-control' placeholder='Descrição' />
                                </div>
                                <div class='col-md-1'>
                                  <button type='submit' name='buscar'class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                                </div>


                                <thead >
                                <tr>
                                <th>Tipo</th>
                                <th>Número</th>
                                <th>Descrição</th>
                                <th>Download</th>
                                </tr>
                                </thead>
                                <tbody>";


                            while($news = mysql_fetch_array($query)){

                                 $tipo = $news['Tipo'];
                                 $numero = $news['Numero'];
                                 $descricao = $news['Descricao'];
                                 $documento = $news['Arquivo'];


                                 echo "


                                     <tr>
                                       <td>$tipo</td>
                                       <td><div style='float:right'>$numero</div></td>
                                       <td><div style='float:right'>$descricao</div></td>
                                       <td><a href='$documento'style='float:right' target='_blank' class='btn btn-warning'>Download</a></td>
                                     </tr>


                                  ";
                            }


                          }
                          else{
                            echo "<div class='alert alert-danger col-md-8 col-md-offset-2'><p align='justify'>Não existe nenhuma resolução cadastrada. </p></div>";
                          }


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
    <hr>
</div>
<br><br><br><br><br><br><br><br><br>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <?php require_once("footer.php") ?>

</body>

</html>
