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
      <h2>Gerenciar Notícias</h2>
    </div>
  

    <div class="col-md-offset-3 col-md-6">
      <h3>Notícias atuais</h3>
      <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed porttitor lacus. Cras in quam aliquam mi auctor blandit.
        Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
      <li class="list-group-item">Notícia 1<span style="color:#e22424;padding-left:510px" class="glyphicon glyphicon-remove "></span></li>
      <li class="list-group-item">Notícia 2<span style="color:#e22424;padding-left:510px" class="glyphicon glyphicon-remove"></span></li>
      <li class="list-group-item">Notícia 3<span style="color:#e22424;padding-left:510px" class="glyphicon glyphicon-remove"></span></li>

      </ul>
      <br>
      <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal1">
        Cadastrar Notícia
      </button>
    </div>
  </div>

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!-- navBarscript -->
  <script src="js/navbarADM.js">


  </script>
  <br><br><br>
  <?php require_once("footer.php"); ?>

</body>

</html>
