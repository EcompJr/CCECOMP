<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

       header('location:login.php');
}



  if(isset($_POST['enviarNoticia'])){ //Cadastro de nova notícia

         $titulo = $_POST['Titulo'];
         $texto = $_POST['Texto'];
         $imagem = '';
		 
		 			
         $arquivoFoto = $_FILES['Imagem']['tmp_name'];
         $nomeArquivoFoto = $_FILES['Imagem']['name'];

                 if($nomeArquivoFoto != ''){ //faz upload da foto se existir
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
               if($upFoto){ //Pode adicionar foto
			           $imagem = str_replace(':','',$imagem);
                       move_uploaded_file($arquivoFoto,$imagem);
               }
              }

			   require_once 'createNotice.php';
			   $titulo = str_replace(':','',$titulo);
			   $path = $titulo . ".php";
			   $file = fopen($path ,"w");
			   fwrite($file,$htmlPage);
               mysql_query("INSERT INTO `ccecomp_noticias` (`Titulo`,`Imagem`, `Link_Page`) VALUES ('$titulo','$imagem','$path')");
                fim:
                //Não insere no banco de dados
              
  }

  if(isset($_POST['removerNoticia'])){


       $id = $_POST['removerNoticia'];
       $query = mysql_query("SELECT*FROM `ccecomp_noticias` WHERE `ID`='$id'"); //sempre vai existir
       $linhaNoticias = mysql_fetch_array($query);
       $imagem = $linhaNoticias['Imagem'];
	   $path = $linhaNoticias['Link_Page'];
      
      
        @unlink($imagem); //remove arquivo em pasta
       

	   @unlink($path); //Exclui pagina php
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
            <form method="POST" action=''>
              <ul class="list-group">
                <?php
                          $query = mysql_query("SELECT *FROM `ccecomp_noticias`"); //Consulta banco de dados

                          if(mysql_num_rows($query) > 0){ //Existe notícias cadastradas

                            while($news = mysql_fetch_array($query)){

                                 $titulo = $news['Titulo'];
								 $link = $news['Link_Page'];
                                 $id = $news['ID'];

                                 echo "
                                
                                 <li class='list-group-item'>
                                 <div class='collapse' id='$id'>
								 <p><a href='$link'>Link de redirecionamento</a></p>
                                </div>
                                  <a data-toggle='collapse' href='#$id' aria-expanded='false' aria-controls='collapseExample'>$titulo</a>
                                  <button name='removerNoticia' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button>
                                 </li>";
                            }


                          }
                          else{
                            echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhuma notícia cadastrada. </p></div>";
                          }

                  ?>
                  <br>
                  <button class="btn btn-warning col-md-offset-3 col-md-6" onclick="backForOne()" type="button" data-toggle="modal" data-target="#myModal1">
                    Cadastrar Nova Notícia
                  </button>
              </ul>
            </form>

          </div>

          <!-- /.col-lg-12 -->
        </div>

        <br>


        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Nova Notícia</h4>
              </div>
              <div class="modal-body text-justify">
                <form method="POST" action='' enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Título</label>
                    <input required='true' name="Titulo" type="text" class="form-control" id="cargo">
                  </div>
                  <div class="form-group">
                    <label for="comment">Texto</label>
                    <textarea required='true' name="Texto" class="form-control" rows="5" id="texto"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Enviar Imagem</label>
                    <input name="Imagem" type="file" id="file1" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </div>
				  <div class='form-group' id='linksNotice'>
				    <label>Links</label>
					<input type='text' name='links[]' class='form-control'/>
				  </div>
				  <button class='btn btn-success' type='button' onclick='addLink()'  >Adicionar Link</button>
                  <button name="enviarNoticia" type="submit" class="btn btn-primary">Enviar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<!-- putAnotherLinkScript -->
	<script src="js/addLinkNotice.js"></script>
    <!-- navBarscript -->
    <script src="js/navbarADM.js">
      < script >
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        }) <
        />
    </script>

    <br>
    <br>
    <br>
    <?php require_once("footer.php"); ?>

  </body>

  </html>