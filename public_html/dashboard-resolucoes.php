<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

       header('location:login.php');
}


$busca = array();

//Buscar Resoluções

 if(isset($_POST['buscar'])){

     $descricaoBusca = $_POST['descricao'];

     if($descricaoBusca != ''){

     $query = mysql_query("SELECT*FROM `ccecomp_resolucoes`");

     while($linhas = mysql_fetch_array($query)){

        $descricaoBD = $linhas['Descricao'];

        if(strpos($descricaoBD, $descricaoBusca) !== false){

              $id = $linhas['ID'];
              $tipo = $linhas['Tipo'];
              $numero = $linhas['Numero'];
              $descricao = $linhas['Descricao'];
              $arquivo = $linhas['Arquivo'];


              array_push($busca,"

              <tr>
              <td>$tipo</td>
              <td>$numero</td>
              <td>$descricao</td>
              <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
              <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
              </tr>


              ");


        }
      }
    }
      else{

        header('location:dashboard-resolucoes.php');
      }


    if(empty($busca))
    echo "<script>alert('Não existe nenhuma resolução com esta descrição')</script>";








 }





  if(isset($_POST['enviarResolucao'])){ //Cadastro de nova resolucao

      if(isset($_POST['tipo'])){
		 $tipo = $_POST['tipo'];
		 

         $numero = $_POST['Numero'];
         $descricao = $_POST['Descricao'];

         $arquivoResolucao = $_FILES['Arquivo']['tmp_name'];
         $nomeArquivoResolucao = $_FILES['Arquivo']['name'];

                 if( $nomeArquivoResolucao != ''){ //faz upload do arquivo se existir
                 $extensaoResolucao = pathinfo($nomeArquivoResolucao,PATHINFO_EXTENSION);
                 $arquivo = 'data/resolucoes'.$numero.".".$extensaoResolucao;

                 if($extensaoResolucao == 'pdf' || $extensaoResolucao == 'doc' || $extensaoResolucao == 'docx' || $extensaoResolucao == 'PDF' ){
                           $upResolucao = true; //Pode adicionar a foto
                 }
                 else{

                    echo "<script>alert('Extensão do arquivo inválida! Somente .PDF, .DOC E .DOCX permitido.')</script>";
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
              else{

                echo "<script>alert('Selecione um arquivo de resolução')</script>";
              }



			  }
		 else{
		 	 echo "<script>alert('Cadastre algum tipo de resolução')</script>";
			 
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


if(isset($_POST['sendType'])){


  $name = $_POST['nameGive'];

  mysql_query("INSERT INTO `tipos_resolucoes` (`Nome`) VALUES ('$name')");


}

if(isset($_POST['removeTypeResolution'])){

      $id = $_POST['removeTypeResolution'];

	  mysql_query("DELETE FROM `tipos_resolucoes` WHERE ID='$id'");


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


           if(!empty($busca)){


             echo  "

             <form method='POST' action=''>
                   <div class='row'>
                       <div class='col-md-10'>
                         <input  name='descricao' type='text' class='form-control' placeholder='Descrição' />
                         </div>
                         <div class='col-md-1'>
                         <button name ='buscar' type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                       </div>
                   </div>


               <table class='table table-hover' style='border-radius:10px;'>
                       <thead >
                       <tr>
                        <th>Tipo</th>
                        <th>Número</th>
                        <th>Descrição</th>
                        <th>Download</th>
                        <th>Remover</th>
                       </tr>
                       </thead>
                       <tbody>

             ";


             for($i=0; $i<sizeof($busca); $i++){


                    echo $busca[$i];


             }

             echo "</tbody>";
             echo "</table>";
             echo "</form>";





           }
        else{

                  $query = mysql_query("SELECT *FROM `ccecomp_resolucoes`"); //Consulta banco de dados
                    if(mysql_num_rows($query) > 0){ //Existe resolucoes cadastradas

                          echo"

                          <div class='col-md-10'>
                            <input type='text' name='descricao' class='form-control'placeholder='Descrição' />
                          </div>
                          <div class=col-md-1'>
                            <button type='submit' name='buscar'class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                          </div><br>

                            <thead >
                               <tr>
                                 <th>Tipo</th>
                                 <th>Número</th>
                                 <th>Descrição</th>
                                 <th>Download</th>
                                 <th>Remover</th>
                               </tr>
                            </thead>
                            <tbody>";

                        while($news = mysql_fetch_array($query)){
                          $tipo = $news['Tipo'];
                          $numero = $news['Numero'];
                          $descricao = $news['Descricao'];
                          $documento = $news['Arquivo'];
                          $id = $news['ID'];

                          echo "

                              <tr>
                                <td>$tipo</td>
                                <td>$numero</td>
                                <td>$descricao</td>
                                <td><a  style='float:right' class='btn btn-warning' href='$documento' target='_blank'>Download</a></td>
                                <td><button name='removerResolucoes' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button></td>
                              </tr>
                                 ";
                           }

                           echo "</tbody>";
                           echo "</table>";
                           echo "</form>";
                         }
                         else{
                           echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhuma resolução cadastrada. </p></div>";
                         }


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
	   <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#myModal2">
          Cadastrar Novo tipo
        </button><br><br>

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
				   <?php
				         $query = mysql_query("SELECT*FROM `tipos_resolucoes`");

						 if(mysql_num_rows($query)>0){
						 
						    echo "<div><select name='tipo' style='color:black'>";
						    while($types = mysql_fetch_array($query)){
							
							    $name = $types['Nome'];

								echo "<option value='$name'>$name</option>";


							}
							echo"</select></div>";
						 }
						 else{
						  
						     echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhum tipo cadastrado. </p></div>";
						    
						 }

				   ?>
                   

                 </div>
                 <div class="form-group">
                   <label>Número</label>
                   <input required='true' name="Numero" type="text" class="form-control" id="numero">
                 </div>
                 <div class="form-group">
                   <label>Descrição</label>
                   <textarea rows='5'required='true' name="Descricao" type="text" class="form-control" id="descricao"></textarea>
                 </div>
                 <div class="form-group">
                   <label>Enviar Arquivo</label>
                   <input required='true' name="Arquivo" type="file" id="documento" class="custom-file-input">
                   <span class="custom-file-control"></span>
                 </div>
                 <button name="enviarResolucao" type="submit" class="btn btn-primary">Enviar</button>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>


	 <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Cadastrar Novo Tipo de Resolução</h4>
             </div>
             <div class="modal-body text-justify">
                <form method="POST" action='' >
				 <div class='form-group'>
				 <label>Resoluções já cadastradas</label>
				 <?php
				     $query = mysql_query("SELECT*FROM `tipos_resolucoes`");

					 if(mysql_num_rows($query)>0){
					 echo"<ul>";
					    while($tipos = mysql_fetch_array($query)){
						
						  $tipo = $tipos['Nome'];
						  $id = $tipos['ID'];

						  echo"<li class='list-group-item'>
						          $tipo
                                 <button name='removeTypeResolution' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button>
                                 </li>";


						}
						echo"</ul>";
					 }
					 else{
					 	 echo "<div class='alert alert-danger'><p align='justify'>Não existe nenhum tipo cadastrado. </p></div>";
					 }

				 ?>
				 </div>
				 </form>
				 <form method="POST" action='' >
                 <div class="form-group">
				 <label>Novo tipo</label>
				 <input  name='nameGive' class='form-control' type='text' required='true'/>
                 </div>
                 <button name="sendType" type="submit" class="btn btn-primary">Enviar</button>
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
