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
        <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed porttitor lacus. Cras in quam aliquam mi auctor blandit. Interdum et malesuada fames ac ante ipsum primis in faucibus.  </p>
        <li class="list-group-item">Page1 | LINK:<button style="float:right" type="submit" class="btn btn-danger">Remover</button></button></li>
        <li class="list-group-item">Page2 | LINK:<button style="float:right" type="submit" class="btn btn-danger">Remover</button></button></li>
        <li class="list-group-item">Page3 | LINK:<button  style="float:right" type="submit" class="btn btn-danger">Remover</button></button></li>

     </ul>

      </div>

      <div class=" col-md-offset-0 col-md-3">

            <h3>Membros administradores</h3>
                <ul class="list-group">
                   <li class="list-group-item">Matheus  <button  style="float:right" type="submit" class="btn btn-danger">Remover</button></button></span></li>
                   <li class="list-group-item">Member2  <button  style="float:right" type="submit" class="btn btn-danger">Remover</button></button></li>
                   <li class="list-group-item">Member3  <button  style="float:right" type="submit" class="btn btn-danger">Remover</button></button></span></li>
                   <br>
                   <button  style="float:right" data-toggle="modal" data-target="#CadastrarADM" type="button" class="btn btn-success">Adicionar</button>
                </ul>

                <div class="modal fade" id="CadastrarADM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cadastrar Novo Administrador</h4>
                      </div>
                      <div class="modal-body text-justify">
                        <form>
                          <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" id="cargo">
                          </div>
                          <div class="form-group">
                            <label>Email/Login</label>
                            <input type="text" class="form-control" id="descricao">
                          </div>
                          <div class="form-group">
                            <label>Senha</label>
                            <input type="text" class="form-control" id="data">
                          </div>
                          <div class="form-group">
                            <label>Confirmar Senha</label>
                            <input type="text" class="form-control">
                            <span class="custom-file-control"></span>
                          </div>
                          <button type="submit" class="btn btn-primary">Enviar</button>
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
