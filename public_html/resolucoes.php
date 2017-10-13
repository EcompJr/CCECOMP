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
        <div class="row">
            <div class="col-md-7 col-md-offset-2">

                 <table class="table table-hover" style="border-radius:10px;">

                    <thead >
                       <tr>
                         <th>Tipo</th>
                         <th>Número</th>
                         <th>Descrição</th>
                         <th>Download</th>
                       </tr>
                    </thead>
                    <thead >
                       <tr>
                         <th>
                           <select>
                             <option>Classificar</option>
                             <option>Crescente</option>
                             <option>Decrescente</option>
                            </select>
                         </th>

                         <th>
                           <select>
                             <option>Classificar</option>
                             <option>Crescente</option>
                             <option>Decrescente</option>
                            </select>
                         </th>

                         <th>
                           <select>
                             <option>Classificar</option>
                             <option>Crescente</option>
                             <option>Decrescente</option>
                            </select>
                         </th>


                       </tr>
                    </thead>
                 <tbody>
                    <tr>
                      <td>Decreto do Governo do Estado da Bahia</td>
                      <td>12.177/2010</td>
                      <td>Reconhecimento do Curso de Engenharia de Computação</td>
                   	  <td><a target="_blank" href="data/Decreto_12.177_2010_ReconhecimentoDoCursoDeEngenhariaDeComputacao.pdf" class="btn btn-warning" role="button">Download</a> </td>
                    </tr>

                    <tr>
                      <td>Parecer do CEE</td>
                      <td>96/2010 </td>
                      <td>Parecer do CEE para reconhecimento do curso de Engenharia de Computação da UEFS</td>
                   	  <td><a target="_blank"href="data/Parecer CEE  96-2010.pdf" class="btn btn-warning" role="button">Download</a> </td>
                    </tr>

                    <tr>
                      <td>Resolução CONSEPE </td>
                      <td>083/2013</td>
                      <td>Regulamente Estágio em Cursos de Graduação na UEFS </td>
                   	  <td><a target="_blank"href="data/Rcpe 083-2013 estagio uefs.pdf" class="btn btn-warning" role="button">Download</a> </td>
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
