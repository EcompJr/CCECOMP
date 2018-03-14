<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

       header('location:login.php');
}



  if(isset($_POST['enviarAdm'])){ //Cadastro de novo administrador

         $nome = $_POST['nomeCompleto'];
         $login = $_POST['loginEmail'];
         $senha = $_POST['senha'];
         $cLogin = md5($login);
         $cSenha = md5($senha);


         $confirmaSenha = $_POST['confirmaSenha'];
		 $query = mysql_query("SELECT*FROM `administradores` WHERE `Login`='$cLogin'");

	if(mysql_num_rows($query) == 0){ //Não existe ninguém com este email

         if($senha == $confirmaSenha){ //cadastrou corretamente salva no BD
           mysql_query("INSERT INTO `administradores` (`Nome`, `Login`, `Senha`) VALUES ('$nome', '$cLogin', '$cSenha')");
           echo "<script>window.location.href=window.location.href</script>";
         
          }

         else{ //Errou as senhas
             echo "<script>alert('Senhas digitadas incorretas')</script>";
         }

	}
	else{
		echo "<script>alert('Este email já esta cadastrado')</script>";
	}

  }



  if(isset($_POST['removerAdm'])){ //Remover administrador

            $id = $_POST['removerAdm'];
            mysql_query("DELETE FROM `administradores` WHERE `ID` = $id");
            echo "<script>window.location.href=window.location.href</script>";
  }



  if(isset($_POST['removerNoticia'])){ //Remover notícia


       $id = $_POST['removerNoticia'];
       $query = mysql_query("SELECT*FROM `ccecomp_noticias` WHERE `ID`='$id'"); //sempre vai existir
       $linhaNoticias = mysql_fetch_array($query);
       $imagem = $linhaNoticias['Imagem'];
	     $path = $linhaNoticias['Link_Page'];

       if($imagem != "images/no-image.jpg") //Se a imagem atual for diferente da imagem padrão
       {
        @unlink($imagem); //remove arquivo em pasta
       }

	   @unlink($path); //Exclui pagina php
       mysql_query("DELETE FROM `ccecomp_noticias` WHERE `ID` ='$id'");
       echo "<script>window.location.href=window.location.href</script>";


  }


  if(isset($_POST['sendNewPassword']) ){ //atualizar password

        $email = $_SESSION['email'];
        $email = md5($email);
		$query = mysql_query("SELECT*FROM `administradores` WHERE `Login` = '$email'");
		$adm = mysql_fetch_array($query);
    $password = $adm['Senha'];
    
    $currentPasswordSend = $_POST['currentPassword'];
    $currentPasswordSend = md5($currentPasswordSend);
		$newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassord'];
    
    $newPassword = md5($newPassword);
    $confirmNewPassword = md5($confirmNewPassword);

		if($password == $currentPasswordSend){ //Senha correta

		   if($newPassword == $confirmNewPassword){

				   mysql_query("UPDATE `administradores` SET `Senha`= '$newPassword' WHERE `Login`='$email' "); //muda senha
           echo "<script>alert('senha modificada com sucesso!')</script>";
           echo "<script>window.location.href=window.location.href</script>";
          }
		   else{
		      echo "<script>alert('Senha de confirmação incorreta')</script>";
		   }


		}
		else{
			echo "<script>alert('Senha digitada incorreta')</script>";
		}



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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- navBar css -->
    <link href="../css/navbarADM.css" rel="stylesheet" >

    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="../images/favicon.ico">



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

      <div class="col-md-offset-1  col-md-7">
        <h3>Páginas já criadas</h3>
        <p align="justify">Selecione o link de alguma das páginas já criadas no painel de notícias para ser redirecionado, ou remova alguma das notícias. </p>
        <ul class="list-group">
        <form method='POST' action='' >
       <?php
                  $query = mysql_query("SELECT*FROM `ccecomp_noticias` ORDER BY `ID` DESC");

                  if(mysql_num_rows($query) > 0){ //Existe noticias a serem listadas

                              while($noticias = mysql_fetch_array($query)){

                                    $id = $noticias['ID'];
                                    $titulo = $noticias['Titulo'];
                                    $link = $noticias['Link_Page'];

                                    echo "  <li class='list-group-item'>$titulo | LINK: <a href='$link'>link</a><br><button name='removerNoticia' value='$id' type='submit' class='btn btn-danger'>Remover</button></li>";

                              }



                  }
                  else{

                    echo "<div class='alert alert-danger'><p align='justify'>Não existem páginas de notícias <a href='dashboard-noticias.php'>cadastradas</a> </p></div>";
                  }

        ?>


     </ul>
     </form>
      </div>

      <div class="  col-md-3">

            <h3>Membros administradores</h3>
            <form method="POST" action=''>
                <ul class="list-group">
                  <?php
                          $query = mysql_query("SELECT*FROM `administradores` ORDER BY `ID` DESC"); //Consulta banco de dados
                          $user = $_SESSION['email'];
                          if(mysql_num_rows($query) > 1){ //Existe administradores cadastrados

                            while($adm = mysql_fetch_array($query)){

                                 $nome = $adm['Nome'];
                                 $id = $adm['ID'];
                                 $email = $adm['Login'];
                                 
                                 if($user == "ccecomp@ecomp.uefs.br") {//root logado

                                        if($email != "ef84d6e2cf7188fd993bb1fe2acf22c0") //nao exibe o root na lista de administradores
                                                        echo " <li class='list-group-item'>$nome <button name='removerAdm' value='$id'type='submit' class='btn btn-danger'>Remover</button></button></li>";

                                                    

                                }
                                else{
                                      if($email != "ef84d6e2cf7188fd993bb1fe2acf22c0") //nao exibe o root na lista de administradores
                                      echo " <li class='list-group-item'>$nome </li>";

                                }


                                }
                          }
                          else{
                            echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhum administrador cadastrado. </p></div>";
                          }

                  ?>
                   <br>
				   <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#changePassword'>Mudar Senha</button>
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
                            <input required="true" name='nomeCompleto' type="text" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label>Email/Login</label>
                            <input required="true"  name='loginEmail' type="text" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label>Senha</label>
                            <input required="true" type='password'name='senha'  class="form-control" >
                          </div>
                          <div class="form-group">
                            <label>Confirmar Senha</label>
                            <input required="true" type='password' name='confirmaSenha' class="form-control">

                          </div>
                          <button name='enviarAdm' type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                </div>


				<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Mudar Senha</h4>
                      </div>
                      <div class="modal-body text-justify">
                        <form method='POST' action=''>

                          <div class="form-group">
                            <label>Senha atual</label>
                            <input required="true"  name='currentPassword' type="password" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label>Nova Senha</label>
                            <input required="true" type='password'name='newPassword'  class="form-control" >
                          </div>
                          <div class="form-group">
                            <label>Confirmar Nova Senha</label>
                            <input required="true" type='password' name='confirmNewPassord' class="form-control">

                          </div>
                          <button name='sendNewPassword' type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                </div>


      </div>
    </div>













    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
 <!-- navBarscript -->
    <script src="../js/navbarADM.js" > </script>
       <br><br><br><br><br><br><br><br><br><br><br><br>
   <?php require_once("footer.php"); ?>

  </body>
</html>
