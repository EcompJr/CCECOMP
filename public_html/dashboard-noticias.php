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
      <h2>Gerenciar Notícias Publicadas</h2>
    </div>

    <div class="col-md-offset-3 col-md-6">

      <h3>Notícias</h3>

      <div>
        <div>

          <table class="table table-hover">

            <thead>
              <tr>
                <th>Notícia</th>
                <th>Data de Publicação</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                      Título da Notícia
                    </a>
                  </p>
                  <div class="collapse" id="collapseExample1">
                  <img src="images/default-avatar.png" height="300" width="450">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica,
                      craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                </td>
                <td>04/10/2017</td>
                <td><button type="submit" class="btn btn-danger">Remover</button></button></td>
              </tr>

              <tr>
                <td>
                  <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                      Título da Notícia
                    </a>
                  </p>
                  <div class="collapse" id="collapseExample2">
                  <img src="images/default-avatar.png" height="300" width="450">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica,
                      craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                </td>
                <td>02/05/2017</td>
                <td><button type="submit" class="btn btn-danger">Remover</button></button>
                </td>
              </tr>

              <tr>
                <td>
                  <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                      Título da Notícia
                    </a>
                  </p>
                  <div class="collapse" id="collapseExample3">
                  <img src="images/default-avatar.png" height="300" width="450">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica,
                      craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
                </td>
                <td>05/10/2017</td>
                <td><button type="submit" class="btn btn-danger">Remover</button></button>
                </td>

              </tr>
            </tbody>
          </table>

        </div>

        <!-- /.col-lg-12 -->
      </div>

      <br>
      <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal1">
        Cadastrar Nova Notícia
      </button>

      <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cadastrar Nova Notícia</h4>
            </div>
            <div class="modal-body text-justify">
              <form>
                <div class="form-group">
                  <label>Título</label>
                  <input type="text" class="form-control" id="cargo">
                </div>
                <div class="form-group">
                <label for="comment">Texto</label>
                <textarea class="form-control" rows="5" id="texto"></textarea>
              </div>
                <div class="form-group">
                  <label>Enviar Imagem</label>
                  <input type="file" id="file1" class="custom-file-input">
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
