<?php
session_start();
require_once 'conexao.php';


$busca = array();


function limpaString($str) { 
  $str = preg_replace('/[áàãâä]/ui', 'a', $str);
  $str = preg_replace('/[éèêë]/ui', 'e', $str);
  $str = preg_replace('/[íìîï]/ui', 'i', $str);
  $str = preg_replace('/[óòõôö]/ui', 'o', $str);
  $str = preg_replace('/[úùûü]/ui', 'u', $str);
  $str = preg_replace('/[ç]/ui', 'c', $str);
  return $str;
}

//Buscar Resoluções

 if(isset($_POST['buscar'])){

     $descricaoBusca = $_POST['descricao'];
     $descricaoBusca = limpaString($descricaoBusca);
     $descricaoBusca = strtoupper($descricaoBusca);

     if($descricaoBusca != ''){

      $descricaoBusca = explode(' ', $descricaoBusca);
     
      for($i=0; $i<sizeof($descricaoBusca); $i++){

        if($descricaoBusca[$i] == '')
        break;

     $query = mysql_query("SELECT*FROM `ccecomp_resolucoes` ORDER BY `ID` DESC");

     while($linhas = mysql_fetch_array($query)){

        $descricaoBD = $linhas['Descricao'];
        $descricaoBD = limpaString($descricaoBD);
        $descricaoBD = strtoupper($descricaoBD);

        if(strpos($descricaoBD, $descricaoBusca[$i]) !== false){


              $tipo = $linhas['Tipo'];
              $numero = $linhas['Numero'];
              $numero .= "_".$linhas['Ano'];
              $descricao = $linhas['Descricao'];
              $arquivo = $linhas['Arquivo'];



              $str = "

              <tr>
              <td>$tipo</td>
              <td>$numero</td>
              <td>$descricao</td>
              <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
              </tr>


              ";

              $put = true; 
              for($j=0; $j<sizeof($busca); $j++){
   
                   if($busca[$j] == $str){
                     $put=false;
                   }
                   

              }

              if($put)
              array_push($busca, $str);


        }
      }




    }

    }
      else{

       echo "<script>window.location.href=window.location.href</script>";
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

    <link href='../css/bootstrap-dropdownhover.min.css' rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->


    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="../images/favicon.ico">

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>


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
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Resoluções</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div>
<br><br>
        <div >
            


                <?php


                      if(!empty($busca)){


                        echo  "

                        <form method='POST' action=''>
                              <div class='row'>
                                  <div class='col-md-10 col-xs-8'>
                                    <input  name='descricao' type='text' class='form-control' placeholder='Descrição' />
                                    </div>
                                    <div class='col-md-1 col-xs-1'>
                                    <button name ='buscar' type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                                  </div>
                              </div>

                          <div class='table-responsive'>
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
                        echo "</table></div>";
                        echo "</form>";



                      }
                      else{

                          $query = mysql_query("SELECT *FROM `ccecomp_resolucoes` ORDER BY `ID` DESC"); //Consulta banco de dados

                          if(mysql_num_rows($query) > 0){ //Existe resolucoes cadastradas


                                echo"
                                <form method='POST' action=''>
                                 <div class='row'>
                                    <div class='col-md-10 col-xs-8'>
                                      <input name='descricao' type='text' class='form-control' placeholder='Descrição' />
                                    </div>
                                    <div class='col-md-1 col-xs-1'>
                                      <button type='submit' name='buscar'class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                                    </div>
                                  </div>  
                                    <div class='table-responsive'>
                                      <table class='table table-hover' >

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
                                        $numero .= "_". $news['Ano'];
                                        $descricao = $news['Descricao'];
                                        $documento = $news['Arquivo'];


                                        echo "


                                            <tr>
                                              <td>$tipo</td>
                                              <td>$numero</td>
                                              <td>$descricao</td>
                                              <td><a href='$documento' target='_blank' class='btn btn-warning'>Download</a></td>
                                            </tr>

                                          ";
                                    }

                                    echo "</tbody>
                                  </table>
                                </div>
                              
                            </form>";


                          }
                          else{
                            echo "<div class='alert alert-danger '><p align='justify'>Não existe nenhuma resolução cadastrada. </p></div>";
                          }


                        }

                  ?>

              

          </div>

          <!-- /.col-lg-12 -->
        </div>
    <!-- /.container -->
    <br><br><br><br><br><br><br><br><br>
    <hr>
</div>



    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src='../js/bootstrap-dropdownhover.min.js'></script>

    <?php require_once("footer.php") ?>

</body>

</html>
