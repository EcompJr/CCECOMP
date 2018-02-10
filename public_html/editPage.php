

<?php

if(isset($_POST['edit'])){

     $pageNameFile = basename($_SERVER['PHP_SELF'],'.php') . ".php";
     $content = $_POST['edition'];

     $htmlPage = "
     <!DOCTYPE html>
     <html lang='en'>

     <head>

         <meta charset='utf-8'>
         <meta http-equiv='X-UA-Compatible' content='IE=edge'>
         <meta name='viewport' content='width=device-width, initial-scale=1'>
         <meta name='description' content=''>
         <meta name='author' content=''>

         <title>CCECOMP UEFS</title>

         <!-- Bootstrap Core CSS -->
         <link href='../css/bootstrap.min.css' rel='stylesheet'>

         <!-- Custom CSS -->
         <link href='../css/modern-business.css' rel='stylesheet'>

         <!-- Custom Fonts -->
         <link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

         <!-- Favicon -->
         <link rel='icon' type='images/png' sizes='32x32' href='../images/favicon.ico'>

         <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
         <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
         <!--[if lt IE 9]>
             <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
             <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
         <![endif]-->

     </head>

     <?php require_once('header.php') ?>

     <body>
         <!-- Page Content -->
         <div class='container'>
     ";

      $htmlPage .= $content;



     $htmlPage .= "
     
     </div>


     <?php require_once 'editPage.php';?>

        <!-- jQuery -->
        <script src='../js/jquery.js'></script>

        <!-- Bootstrap Core JavaScript -->
        <script src='../js/bootstrap.min.js'></script>

        <?php require_once('footer.php') ?>

    </body>

    </html>
     ";


   $file = fopen($pageNameFile, 'w');
   fwrite($file,$htmlPage);
   fclose($file);

  echo "<meta http-equiv='refresh' content='0, url=$pageNameFile'  /> ";




}











if(isset($_SESSION['auth'])){

      if($_SESSION['auth']){


         echo "
         <div class='row'>
         <div class='col-md-offset-1 col-md-10'>
           <form method='POST' action=''>
             <h4>Edite o conteúdo desta página</h4>
             <label style='font-size:8px'>Editor de texto HTML</label>
             <textarea id='textEdit'class='form-control' name='edition' rows='10'></textarea><br>
             <button class='btn btn-primary'name='edit' type='submit'  >Modificar</button>
            </form>
         </div>
         </div>
         <script>
             var content = document.getElementsByClassName('container')[1]; //todo o conteudo estático está nela
             var textEdit = document.getElementById('textEdit');

             textEdit.value = content.innerHTML;
         </script>
         ";


      }
}








 ?>
