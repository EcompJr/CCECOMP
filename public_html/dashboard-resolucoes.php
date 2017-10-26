<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

       header('location:login.php');
}



  if(isset($_POST['enviarResolucao'])){ //Cadastro de nova resolucao
    if(isset($_POST['tipo1'])){
        $tipo = $_POST['tipo1'];
    }
    else if(isset($_POST['tipo2'])){
        $tipo = $_POST['tipo2'];
    }
    else if(isset($_POST['tipo3'])){
        $tipo = $_POST['tipo3'];
    }
    else{
        $tipo = $_POST['tipo4'];
    }
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

  if(isset($_POST['downloadResolucoes'])){

      $id = $_POST['downloadResolucoes'];
      $query = mysql_query("SELECT*FROM `ccecomp_resolucoes` WHERE `ID`='$id'"); //sempre vai existir
      $linhaResolucoes = mysql_fetch_array($query);
      $arquivodownload = $linhaResolucoes['Arquivo'];



      @href($arquivodownload);


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
             <ul class="table-hover">
               <table class="table table-hover" >

               <?php
               echo"
                 <div class='col-md-10'>
                   <input type='text' class='form-control'placeholder='Descrição' />
                 </div>
                 <div class=col-md-'>
                   <button class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                 </div><br>";
                  $query = mysql_query("SELECT *FROM `ccecomp_resolucoes`"); //Consulta banco de dados
                    if(mysql_num_rows($query) > 0){ //Existe resolucoes cadastradas
                      if(mysql_num_rows($query) == 1){
                          echo"
                            <thead >
                               <tr>
                                 <th>Tipo</th>
                                 <th><a style='float:right'>Número</a></th>
                                 <th><a style='float:right'>Download</a></th>
                                 <th><a style='float:right'>Remover</a></th>
                               </tr>
                            </thead>
                            <tbody>";
                          }
                        while($news = mysql_fetch_array($query)){
                          $tipo = $news['Tipo'];
                          $numero = $news['Numero'];
                          $descricao = $news['Descricao'];
                          $documento = $news['Arquivo'];
                          $id = $news['ID'];

                          echo "
                            <div class='collapse' id='$id'>
                            </div>
                              <tr>
                                <td>$tipo</td>
                                <td><div style='float:right'>$numero</div></td>
                                <td><a name='downloadResolucoes' value='$id'style='float:right' type='submit' class='btn btn-warning' href='$documento' target='_blank'>Download</a></td>
                                <td><button name='removerResolucoes' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button></td>
                              </tr>
                                 ";
                           }
                         }
                         else{
                           echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhuma resolução cadastrada. </p></div>";
                         }
                 ?>
               </tbody>
             </table>
             </ul>
           </form>
         </div>
         <!-- /.col-lg-12 -->
       </div>

        <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal1">
          Cadastrar Nova Resolução
        </button>
       <br><br>

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
                   <div class="form-check">
                       <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="tipo1" checked>
                       Resolução Consepe
                   </div>
                   <div class="form-check">
                       <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="tipo2">
                       Resolução Consu
                   </div>
                   <div class="form-check">
                       <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="tipo3">
                       Decreto do Governo do Estado da Bahia
                   </div>
                   <div class="form-check">
                       <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="tipo4">
                       Parecer do Conselho Estadual de Educação
                   </div>

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

<br><br>


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
