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
      <h2>Gerenciar TCC</h2>
    </div>


    <div class="col-md-offset-3 col-md-6">
      <h3>TCC's atuais</h3>
      <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed porttitor lacus. Cras in quam aliquam mi auctor blandit.
        Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
        <table class="table table-hover" style="border-radius:10px;">

          <thead >
             <tr>
               <th>Aluno</th>
               <th>Nome do TCC</th>
               <th>Data de publicação</th>
             </tr>
          </thead>
        <tbody>
          <tr>
            <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspDuis sed porttitor arcu. Pellentesque.</td>
            <td>Sed mattis vel velit eget</td>
            <td>01/09/2017</td>
          </tr>

          <tr>
            <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspFusce vel leo quis metus.</td>
            <td> Pellentesque habitant morbi tristique senectu</td>
            <td>02/05/2017</td>
          </tr>

          <tr>
            <td><img width="30" height="30" alt="foto do aluno/default" src="images/default-avatar.png" style="border-radius:30px;" />&nbsp&nbspPraesent pellentesque eu purus quis.</td>
            <td>Fusce cursus nisi id orci.</td>
            <td>05/10/2017</td>
          </tr>
          <tr>
            <td>
              <div class="col-md-15 col-md-offset-0 ">
                <input type="text" class="form-control"placeholder="Inserir aluno" />
              </div>
            </td>
            <td>
              <div class="col-md-15 col-md-offset-0 ">
                <input type="text" class="form-control"placeholder="Inserir nome do TCC" />
              </div>
            </td>
            <td>
              <div class="col-md-15 col-md-offset-0 ">
                <input type="text" class="form-control"placeholder="Inserir data" />
              </div>
            </td>
          </tr>

        </tbody>
        </table>
      </ul>
      <br>
      <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal1">
        Cadastrar TCC
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
