<?php




  if(isset($_POST['enviarAdm'])){ //Cadastro de novo administrador

         $nome = $_POST['nomeCompleto'];
         $login = $_POST['loginEmail'];
         $senha = $_POST['senha'];
         $confirmaSenha = $_POST['confirmaSenha'];

         if($senha == $confirmaSenha){ //cadastrou corretamente salva no BD
           mysql_query("INSERT INTO `administradores` (`Nome`, `Login`, `Senha`) VALUES ('$nome', '$login', '$senha')");
         }

         else{ //Errou as senhas
             echo "<script>alert('Senhas digitadas incorretas')</script>";
         }

  }



  if(isset($_POST['removerAdm'])){ //Remover administrador

            $id = $_POST['removerAdm'];
            mysql_query("DELETE FROM `administradores` WHERE `ID` = $id");
  }



  if(isset($_POST['removerNoticia'])){


       $id = $_POST['removerNoticia'];
       mysql_query("DELETE FROM `ccecomp_noticias` WHERE `ID` ='$id'");
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
    <link href="css/navbarADM.css" rel="stylesheet" >

    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="images/favicon.ico">



  </head>
  <body>

       <?php require_once("navBarADM.php");?>
<div class="row">
  <div class=" col-md-offset-4 col-md-8">
    <h2>Administração CCECOMP</h2>
  </div>
</div>
<br><br>
    <div class="row">

      <div class="col-md-offset-2  col-md-6">
        <h3>Páginas já criadas</h3>
        <p align="justify">Selecione o link de alguma das páginas já criadas no painel de notícias para ser redirecionado, ou remova alguma das notícias. </p>
        <ul class="list-group">
        <form method='POST' action='' >
       <?php
                  $query = mysql_query("SELECT*FROM `ccecomp_noticias`");

                  if(mysql_num_rows($query) > 0){ //Existe noticias a serem listadas

                              while($noticias = mysql_fetch_array($query)){

                                    $id = $noticias['ID'];
                                    $titulo = $noticias['Titulo'];
                                    $link = $noticias['Link_Page'];

                                    echo "  <li class='list-group-item'>$titulo | LINK: $link<button name='removerNoticia' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button></li>";

                              }



                  }
                  else{

                    echo "<div class='alert alert-danger'><p align='justify'>Não existem páginas de notícias <a href='dashboard-noticias.php'>cadastradas</a> </p></div>";
                  }

        ?>


     </ul>
     </form>
      </div>

      <div class=" col-md-offset-0 col-md-3">

            <h3>Membros administradores</h3>
            <form method="POST" action=''>
                <ul class="list-group">
                  <?php
                          $query = mysql_query("SELECT*FROM `administradores`"); //Consulta banco de dados

                          if(mysql_num_rows($query) > 0){ //Existe administradores cadastrados

                            while($adm = mysql_fetch_array($query)){

                                 $nome = $adm['Nome'];
                                 $id = $adm['ID'];

                                 echo " <li class='list-group-item'>$nome  <button name='removerAdm' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button></button></li>";

                            }


                          }
                          else{
                            echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhhum administrador cadastrado. </p></div>";
                          }

                  ?>
                   <br>
                   <button  style="float:right" data-toggle="modal" data-target="#CadastrarADM" type="button" class="btn btn-success">Adicionar</button>
                </ul>
              </form>

                <div class="modal fade" id="CadastrarADM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cadastrar Novo Administrador</h4>
                      </div>
                      <div class="modal-body text-justify">
                        <form method='POST' action=''>
                          <div class="form-group">
                            <label>Nome Completo</label>
                            <input name='nomeCompleto' type="text" class="form-control" id="cargo">
                          </div>
                          <div class="form-group">
                            <label>Email/Login</label>
                            <input name='loginEmail' type="text" class="form-control" id="descricao">
                          </div>
                          <div class="form-group">
                            <label>Senha</label>
                            <input type='password'name='senha'  class="form-control" id="data">
                          </div>
                          <div class="form-group">
                            <label>Confirmar Senha</label>
                            <input type='password' name='confirmaSenha' class="form-control">

                          </div>
                          <button name='enviarAdm' type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                </div>


      </div>
    </div>













    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
 <!-- navBarscript -->
    <script src="js/navbarADM.js" > </script>
       <br><br><br>
   <?php require_once("footer.php"); ?>

  </body>
</html>
