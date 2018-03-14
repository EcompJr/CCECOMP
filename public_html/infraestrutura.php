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
     <script src="../js/jquery.js "></script>

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
                <h1 class="page-header">Infraestrutura
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li class="active">Infraestrutura</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <h4><a target="_blank" href="">LABHARD - Laboratório de Hardware (MP 31-A)</a></h4>
                <h4><a target="_blank" href="">Laboratório de Redes (MP 33-A)</a></h4>
                <h4><a target="_blank" href="http://lacad.uefs.br/">LACAD - Laboratório de Computação de Alto Desempenho (SALA)</a></h4>
                <h4><a target="_blank" href="">Laboratório de Computação Visual (MP 38)</a></h4>
                <h4><a target="_blank" href="">LABPROG - Laboratório de Programação (MP 53)</a></h4>
                <h4><a target="_blank" href="">Laboratório de Pesquisa (MP 55)</a></h4>
                <h4><a target="_blank" href="http://sites.ecomp.uefs.br/lasic/">LASIC - Laboratório de Pesquisa em Sistemas Inteligentes e Cognitivos (MP 58)</a></h4>
                <h4><a target="_blank" href="http://sites.ecomp.uefs.br/lse/">LSE - Laboratório de Sistemas Embarcados (S10, LABOTEC III)</a></h4>
                <h4><a target="_blank" href="http://lara.uefs.br/">LARA</a></h4>
                <h4><a target="_blank" href="">LENDA</a></h4>
                <br>
                <h4>LABOTEC III</h4>
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#myModal1">
                    Instruções para requisição das chaves
                </button>



                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Instruções para requisição das chaves</h4>
                            </div>

                            <div class="modal-body text-justify">
                                O procedimento para solicitação de acesso é o seguinte:
                                <br>
                                <br> 1. Preenchimento de formulário de solicitação (o formulário deve ser assinado pelo professor
                                e pelo aluno
                                <br> 2. O aluno deve entregar a solicitação na coordenação do Labotec III para a funcionária
                                a Srª. Gilma;
                                <br> 3. Para ter o acesso ao Laboratório o aluno assinará o livro de acesso indicando hora de
                                entrada;
                                <br> 4. Os alunos não ficarão de posse da chave, que será responsabilidade do Segurança a abertura
                                e fechamento da sala.
                                <br>
                                <br>
                                <a class="btn btn-warning" role="button" target="_blank" href="../data/acesso_LTEC3.pdf">Formulário em formato PDF</a>
                                <a class="btn btn-warning" role="button" target="_blank" href="../data/acesso_LTEC3.odt">Formulário em formato ODT</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.container -->
 <?php require_once 'editPage.php';?>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js "></script>

     <script src='../js/bootstrap-dropdownhover.min.js'></script>

    <?php require_once("footer.php") ?>
</body>

</html>
