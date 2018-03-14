<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

       header('location:login.php');
}


if(isset($_POST['enviarEstagio'])){ //Cadastro de novo estágio
  
           $titulo = $_POST['Titulo'];
           $texto = $_POST['Texto'];
           $imagem = '';

           $date = date('Y/m/d');
           $date = str_replace('/','-',$date);
           
            $arquivoFoto = $_FILES['Imagem']['tmp_name'];
            $nomeArquivoFoto = $_FILES['Imagem']['name'];
   
                   if($nomeArquivoFoto != ''){ //faz upload da foto se existir
                   $extensaoFoto = pathinfo($nomeArquivoFoto,PATHINFO_EXTENSION);
                   $imagem = '../images/'.$titulo.".".$extensaoFoto;
  
                   if($extensaoFoto == 'png' || $extensaoFoto == 'jpg' || $extensaoFoto == 'jpeg'){
                             $upFoto = true; //Pode adicionar a foto
                   }
                   else{
  
                      echo "<script>alert('Extensão da imagem inválida! Somente .PNG, .JPG E .JPEG permitido.')</script>";
                      goto fim;
  
                   }
  
                 //Insere no banco de dados
                 if($upFoto){ //Pode adicionar foto
                         move_uploaded_file($arquivoFoto,$imagem);
                 }
                }
           require_once 'addPageEstagio.php';
           $tituloBD = $titulo;
           $tituloBD = str_replace(':','',$tituloBD);
           $tituloBD = str_replace('.','',$tituloBD);
           $tituloBD = str_replace(',','',$tituloBD);
           $tituloBD = str_replace(' ','',$tituloBD);
           $tituloBD = str_replace('/','',$tituloBD);
           $tituloBD = str_replace('\\','',$tituloBD);
			     $path = "../public_html/".$tituloBD . ".php";
			     $file = fopen($path ,"w");
			     fwrite($file,$htmlPage);
                 mysql_query("INSERT INTO `ccecomp_estagios` (`Titulo`,`Date`,`Imagem`,`Link_Page`) VALUES ('$titulo','$date','$imagem','$path')");
                 echo "<script>window.location.href=window.location.href</script>"; 
                 fim:
                 echo "<script>window.history.back()</script>";
                  //Não insere no banco de dados
                
  } 

  if(isset($_POST['removerEstagio'])){


       $id = $_POST['removerEstagio'];
       $query = mysql_query("SELECT*FROM `ccecomp_estagios` WHERE `ID`='$id'"); //Sempre vai existir
       $linhaEstagios = mysql_fetch_array($query);
       $imagem = $linhaEstagios['Imagem'];
	   $link = $linhaEstagios['Link_Page'];

       if($imagem != "../images/no-image.jpg") //Se a imagem atual for diferente da imagem padrão  
       {
        @unlink($imagem); //Remove arquivo em pasta
       }

	   @unlink($link);
       mysql_query("DELETE FROM `ccecomp_estagios` WHERE `ID` ='$id'");
       echo "<script>window.location.href=window.location.href</script>";

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
    <link href="../css/navbarADM.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="../images/favicon.ico">



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
                          $query = mysql_query("SELECT *FROM `ccecomp_estagios` ORDER BY `ID` DESC" ); //Consulta banco de dados

                          if(mysql_num_rows($query) > 0){ //Existe notícias cadastradas

                            while($news = mysql_fetch_array($query)){

                                 $titulo = $news['Titulo'];
								                 $link = $news['Link_Page'];
                                 $id = $news['ID'];
                                 $date = $news['Date'];
                                 $date = explode('-',$date);
                                 $date = array_reverse($date);
                                 $date = implode('/',$date);



                                 echo "
                                
                                 <li class='list-group-item'>
                                 <div class='collapse' id='$id'>
								 <p><a href='$link'>Link de redirecionamento</a></p>
                                </div>
                                  <a data-toggle='collapse' href='#$id' aria-expanded='false' aria-controls='collapseExample'>$titulo ($date)</a>
                                  <br><button name='removerEstagio' value='$id' type='submit' class='btn btn-danger'>Remover</button>
                                 </li>";
                            }


                          }
                          else{
                            echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhuma notícia cadastrada. </p></div>";
                          }

                  ?>
          </form>


        </ul>

        <br>
        <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal1">
          Cadastrar Oportunidade de Estágio
        </button>

        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Nova Oportunidade de Estágio</h4>
              </div>
              <div class="modal-body text-justify">
                <form method='POST' action='' enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Cargo</label>
                    <input require='true'  maxlength='200'name="Titulo" type="text" class="form-control" id="cargo">
                  </div>
                  <div class="form-group">
                    <label>Descrição</label>
                    <textarea required='true' name="Texto" class="form-control" rows="5" id="texto"></textarea>
                  </div>
                  <div class="form-group">
                  <label>Enviar Imagem</label>
                  <input name="Imagem" type="file" id="file1" class="custom-file-input">
                  <span class="custom-file-control"></span>
                </div>
				 <div class='form-group' id='linksNotice'>
				    <label>Links (copiar link do navegador)</label>
					<input type='text' name='links[]' class='form-control'/>
				  </div>
				  <button class='btn btn-success' type='button' onclick='addLink()'  >Adicionar Link</button>
                  <button name="enviarEstagio" type="submit" class="btn btn-primary">Enviar</button>
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
    <script src="../js/jquery.js"></script>
	<!-- putAnotherLinkScript -->
	<script src="../js/addLinkNotice.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- navBarscript -->
    <script src="../js/navbarADM.js">
      < script >
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        }) <
        />
    </script>
    <br>
    <br>
    <br><br><br><br><br><br><br><br><br><br>
    <?php require_once("footer.php"); ?>

  </body>

  </html>