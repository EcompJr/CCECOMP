<?php
session_start();
require_once 'conexao.php';

$busca = array();

if(isset($_POST['buscar'])){ //Faz busca de TCC

     $nomeBusca = $_POST['nomeBusca'];
     $tipo = $_POST['check'];


  if($nomeBusca != ''){

     $query = mysql_query("SELECT*FROM `aluno_tcc` ");

    if($tipo == 'titulo'){

     while($aluno_tcc = mysql_fetch_array($query)){


           $nomeTCC = $aluno_tcc['Nome_TCC'];



           if(strpos($nomeTCC,$nomeBusca) !== false ){

               $nomeAluno = $aluno_tcc['Aluno'];
               $nomeOrientador = $aluno_tcc['Nome_Orientador'];
               $arquivo = $aluno_tcc['Caminho_Arquivo'];
               $imagem =$aluno_tcc['Caminho_Imagem'];


               array_push($busca,"

               <tr>
               <td><img width='30' height='30' alt='foto do aluno/default' src='$imagem' style='border-radius:30px;' />&nbsp&nbsp$nomeAluno</td>
               <td>$nomeTCC</td>
               <td>$nomeOrientador</td>
               <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
               </tr>




               ");


           }
     }
   }
   else if($tipo == 'orientador'){

           while($aluno_tcc = mysql_fetch_array($query)){


              $orientadorTCC = $aluno_tcc['Nome_Orientador'];

              if(strpos($orientadorTCC,$nomeBusca) !== false){

                $nomeAluno = $aluno_tcc['Aluno'];
                $nomeTCC = $aluno_tcc['Nome_TCC'];
                $nomeTCC = $aluno_tcc['Nome_TCC'];
                $arquivo = $aluno_tcc['Caminho_Arquivo'];
                $imagem =$aluno_tcc['Caminho_Imagem'];


                array_push($busca,"

                <tr>
                <td><img width='30' height='30' alt='foto do aluno/default' src='$imagem' style='border-radius:30px;' />&nbsp&nbsp$nomeAluno</td>
                <td>$nomeTCC</td>
                <td>$orientadorTCC</td>
                <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
                </tr>




                ");
              }
           }



   }
   else if($tipo == 'chaves'){



                while($aluno_tcc = mysql_fetch_array($query)){


                   $chavesTCC = $aluno_tcc['Palavras_Chaves'];
                   $chavesTCC =  explode(',',$chavesTCC);

              for($i=0;$i<sizeof($chavesTCC);$i++){

                        $nomeBusca = str_replace(' ', '', $nomeBusca);



                   if(strpos($chavesTCC[$i],$nomeBusca) !== false){


                                     $nomeAluno = $aluno_tcc['Aluno'];
                                     $nomeTCC = $aluno_tcc['Nome_TCC'];
                                     $nomeOrientador = $aluno_tcc['Nome_Orientador'];
                                     $arquivo = $aluno_tcc['Caminho_Arquivo'];
                                     $imagem =$aluno_tcc['Caminho_Imagem'];


                                     array_push($busca,"

                                     <tr>
                                     <td><img width='30' height='30' alt='foto do aluno/default' src='$imagem' style='border-radius:30px;' />&nbsp&nbsp$nomeAluno</td>
                                     <td>$nomeTCC</td>
                                     <td>$nomeOrientador</td>
                                     <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
                                     </tr>




                                     ");

                   }
                 }
                }

   }


   }
   else{
    echo "<script>window.location.href=window.location.href</script>";

   }




   if(empty($busca))
   echo "<script>alert('Nenhum TCC encontrado')</script>";




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
                <h1 class="page-header">TCC
                </h1>
                <ol style="font-size:15pt" class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">TCC</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
<br>

<br><br>

<div class='row'>
     <div class='col-md-10 col-md-offset-1'>
<?php


      if(!empty($busca)){ //realizou busca


        echo  "

        <form method='POST' action=''>
              <div class='row'>
                  <div class='col-md-10'>
                    <input id='nomeBusca' name='nomeBusca' type='text' class='form-control' placeholder='Nome do TCC' />
                    </div>
                    <div class='col-md-1'>
                    <button name ='buscar' type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                  </div>
              </div>
              <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check1' onclick='onlyOneCheck(this)' checked type='checkbox' value='titulo'>Título do TCC</label>
              <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check2' onclick='onlyOneCheck(this)' type='checkbox' value='orientador'>Nome do Orientador</label>
              <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check3' onclick='onlyOneCheck(this)' type='checkbox' value='chaves'>Palavras-Chaves</label>

          <table class='table table-hover' style='border-radius:10px;'>
                  <thead >
                  <tr>
                   <th>Aluno</th>
                   <th>Título do TCC</th>
                   <th>Nome do Orientador</th>
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

          $query = mysql_query("SELECT*FROM `aluno_tcc`");

            if(mysql_num_rows($query)>0 ){

        //cabeçalho da tabela;
            echo  "

            <form method='POST' action=''>
                  <div class='row'>
                      <div class='col-md-10'>
                        <input id='nomeBusca' name='nomeBusca' type='text' class='form-control' placeholder='Título do TCC' />
                        </div>
                        <div class='col-md-1'>
                        <button name ='buscar' type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                      </div>
                  </div>

                  <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check1' onclick='onlyOneCheck(this)' checked type='checkbox' value='titulo'>Título do TCC</label>
                  <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check2' onclick='onlyOneCheck(this)' type='checkbox' value='orientador'>Nome do Orientador</label>
                  <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check3' onclick='onlyOneCheck(this)' type='checkbox' value='chaves'>Palavras-Chaves</label>

              <table class='table table-hover' style='border-radius:10px;'>
                      <thead >
                      <tr>
                       <th>Aluno</th>
                       <th>Título do TCC</th>
                       <th>Nome do Orientador</th>
                       <th>Download</th>
                      </tr>
                      </thead>
                      <tbody>

            ";

                 while($tcc = mysql_fetch_array($query)){

                   $aluno = $tcc['Aluno'];
                   $nomeTCC = $tcc['Nome_TCC'];
                   $nomeOrientador = $tcc['Nome_Orientador'];
                   $caminhoArquivo = $tcc['Caminho_Arquivo'];
                   $caminhoFoto = $tcc['Caminho_Imagem'];


                   echo "


                               <tr>
                               <td><img width='30' height='30' alt='foto do aluno/default' src='$caminhoFoto' style='border-radius:30px;' />&nbsp&nbsp$aluno</td>
                               <td>$nomeTCC</td>
                               <td>$nomeOrientador</td>
                               <td><a role='button' target='_blank'class='btn btn-warning' href='$caminhoArquivo' >Download</a></td>
                               </tr>


                   ";


                 }
                 echo "</tbody>";
                 echo "</table>";
                 echo "</form>";


            }
            else{

                echo "<div class='alert alert-danger'><p align='center'>Não existem TCCs cadastrados no sistema </p></div>";

            }


    }
 ?>
    </div>

</div>
  <hr>
</div>



    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!--Script para TCC -->
    <script src='../js/tcc.js'></script>

    <?php require_once("footer.php") ?>

</body>

</html>
