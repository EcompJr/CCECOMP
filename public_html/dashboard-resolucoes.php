<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

       header('location:login.php');
}



  if(isset($_POST['enviarResolucao'])){ //Cadastro de nova resolucao

         $tipo = $_POST['Tipo'];
         $numero = $_POST['Numero'];
         $descricao = $_POST['Descricao'];

         $arquivoResolucao = $_FILES['Arquivo']['tmp_name'];
         $nomeArquivoResolucao = $_FILES['Arquivo']['name'];

                 if( $nomeArquivoResolucao != ''){ //faz upload do arquivo se existir
                 $extensaoResolucao = pathinfo($nomeArquivoResolucao,PATHINFO_EXTENSION);
                 $arquivo = 'data/resolucoes'.$numero.".".$extensaoResolucao;

                 if($extensaoResolucao == 'pdf' || $extensaoResolucao == 'doc' || $extensaoResolucao == 'docx'){
                           $upResolucao = true; //Pode adicionar a foto
                 }
                 else{

                    echo "<script>alert('Extensão da imagem inválida! Somente .PDF, .DOC E .DOCX permitido.')</script>";
                    goto fim;

                 }

               //insere no banco de dados
               if($upResolucao){ //Pode adicionar pdf e doc/docx
                       move_uploaded_file($arquivoResolucao,$arquivo);
               }
               mysql_query("INSERT INTO `ccecomp_resolucoes` (`Tipo`,`Numero`,`Descricao`,`Arquivo`) VALUES ('$tipo','$numero','$descricao','$arquivo')");
                fim:
                //Não insere no banco de dados
              }
  }


  if(isset($_POST['removerResolucoes'])){


       $id = $_POST['removerResolucoes'];
       $query = mysql_query("SELECT*FROM `ccecomp_resolucoes` WHERE `ID`='$id'"); //sempre vai existir
       $linhaResolucoes = mysql_fetch_array($query);
       $arquivo = $linhaResolucoes['Arquivo'];
       @unlink($arquivo); //remove arquivo em pasta


       mysql_query("DELETE FROM `ccecomp_resolucoes` WHERE `ID` ='$id'");
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
       <h2>Gerenciar Resoluções</h2>
     </div>

     <div class="col-md-offset-3 col-md-6">

       <h3>Resoluções</h3>

       <div>
         <div>
           <form method="POST" action=''>
             <ul class="list-group">
               <?php
                         $query = mysql_query("SELECT *FROM `ccecomp_resolucoes`"); //Consulta banco de dados

                         if(mysql_num_rows($query) > 0){ //Existe resolucoes cadastradas

                           while($news = mysql_fetch_array($query)){

                                $tipo = $news['Tipo'];
                                $numero = $news['Numero'];
                                $descricao = $news['Descricao'];
                                $documento = $news['Arquivo'];
                                $id = $news['ID'];

                                echo "

                                <li class='list-group-item'>
                                <div class='collapse' id='$id'>
                                <img width='500' height='300' alt='arquivo da resolucao' src='$documento' />
                                  <div class='card card-body'>
                                    $numero
                                   </div>
                               </div>
                                 <a class='btn btn-primary' data-toggle='collapse' href='#$id' aria-expanded='false' aria-controls='collapseExample'>$tipo</a>
                                 <button name='removerResolucoes' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button></button>
                                </li>";
                           }


                         }
                         else{
                           echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhuma resolução cadastrada. </p></div>";
                         }

                 ?>
                 <br>
                 <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal1">
       Cadastrar Nova Resolução
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
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Cadastrar Nova Resolução</h4>
             </div>
             <div class="modal-body text-justify">
               <form method="POST" action='' enctype="multipart/form-data">
                 <div class="form-group">
                   <label>Tipo</label>
                   <input name="Tipo" type="text" class="form-control" id="tipo">
                 </div>
                 <div class="form-group">
                   <label>Número</label>
                   <input name="Numero" type="text" class="form-control" id="numero">
                 </div>
                 <div class="form-group">
                   <label>Descrição</label>
                   <input name="Descricao" type="text" class="form-control" id="descricao">
                 </div>
                 <div class="form-group">
                   <label>Enviar Arquivo</label>
                   <input name="Arquivo" type="file" id="documento" class="custom-file-input">
                   <span class="custom-file-control"></span>
                 </div>
                 <button name="enviarResolucao" type="submit" class="btn btn-primary">Enviar</button>
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
