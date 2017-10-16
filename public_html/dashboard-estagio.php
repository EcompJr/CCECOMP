<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

       header('location:login.php');
}

if(isset($_POST['enviarEstagio'])){ //Cadastro de nova notícia
  
           $titulo = $_POST['Titulo'];
           $texto = $_POST['Texto'];
           $imagem = 'images/default-avatar.png';

            $arquivoFoto = $_FILES['Imagem']['tmp_name'];
            $nomeArquivoFoto = $_FILES['Imagem']['name'];
   
  
                   if( $nomeArquivoFoto != ''){ //faz upload da foto se existir
                   $extensaoFoto = pathinfo($nomeArquivoFoto,PATHINFO_EXTENSION);
                   $imagem = 'images/'.$titulo.".".$extensaoFoto;
  
                   if($extensaoFoto == 'png' || $extensaoFoto == 'jpg' || $extensaoFoto == 'jpeg'){
                             $upFoto = true; //Pode adicionar a foto
                   }
                   else{
  
                      echo "<script>alert('Extensão da imagem inválida! Somente .PNG, .JPG E .JPEG permitido.')</script>";
                      goto fim;
  
                   }
  
                 //insere no banco de dados
                 if($upFoto){ //Pode adicionar foto e pdf
                         move_uploaded_file($arquivoFoto,$imagem);
                 }
                }
                 mysql_query("INSERT INTO `ccecomp_estagios` (`Titulo`,`Texto`,`Imagem`) VALUES ('$titulo','$texto','$imagem')");
                  fim:
                  //Não insere no banco de dados
                
  } 

  if(isset($_POST['removerEstagio'])){


       $id = $_POST['removerEstagio'];
       $query = mysql_query("SELECT*FROM `ccecomp_estagios` WHERE `ID`='$id'"); //sempre vai existir
       $linhaEstagios = mysql_fetch_array($query);
       $imagem = $linhaEstagios['Imagem'];
       @unlink($imagem); //remove arquivo em pasta
       
       mysql_query("DELETE FROM `ccecomp_estagios` WHERE `ID` ='$id'");
  }


 ?>

  <!DOCTYPE html>
  <html>

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
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- navBar css -->
    <link href="css/navbarADM.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="images/favicon.ico">



  </head>

  <body>

    <?php require_once("navBarADM.php");?>
    <div class="row">

      <div class="col-md-offset-3 col-md-6">
        <h2>Gerenciar Oportunidades de Estágio</h2>
      </div>

      <div class="col-md-offset-3 col-md-6">

        <h3>Oportunidades de Estágio</h3>

        <ul class="list-group">
          <form method='POST' action=''>
            <?php
                $query = mysql_query("SELECT*FROM `ccecomp_estagios`");

                if(mysql_num_rows($query) > 0){ //Existe noticias a serem listadas

                            while($estagios = mysql_fetch_array($query)){

                                  $titulo = $estagios['Titulo'];
                                  $texto = $estagios['Texto'];
                                  $imagem = $estagios['Imagem'];
                                  $id = $estagios['ID'];

                                  echo "

                                 <li class='list-group-item'>
                                 <div class='collapse' id='$id'>
                                 <img src='images/$imagem' height='300' width='450'>
                                   <div class='card card-body'>
                                     $texto
                                    </div>
                                </div>
                                  <a class='btn btn-primary' data-toggle='collapse' href='#$id' aria-expanded='false' aria-controls='collapseExample'>$titulo</a>
                                  <button name='removerEstagio' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button></button>
                                 </li>";

                            }



                }
                else{

                  echo "<div class='alert alert-danger'><p align='justify'>Não existem anúncios de estágios cadastrados</p></div>";
                }

      ?>


        </ul>

        <br>
        <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal1">
        Cadastrar Oportunidade de Estágio
      </button>

        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Nova Oportunidade de Estágio</h4>
              </div>
              <div class="modal-body text-justify">
                <form method='POST' action='' enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Cargo</label>
                    <input name="Titulo" type="text" class="form-control" id="cargo">
                  </div>
                  <div class="form-group">
                    <label for="comment">Descrição</label>
                    <textarea name="Texto" class="form-control" rows="5" id="texto"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Enviar Imagem</label>
                    <input name="Imagem" type="file" id="file1" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </div>
                  <button name="enviarEstagio" type="submit" class="btn btn-primary">Enviar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    </div>
<br><br>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- navBarscript -->
    <script src="js/navbarADM.js">
      < script >
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        }) <
        />
    </script>
    <br><br><br>
    <?php require_once("footer.php"); ?>

  </body>

  </html>
