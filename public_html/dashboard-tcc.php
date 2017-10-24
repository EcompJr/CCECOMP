<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

            header('location:login.php');
}

$busca = array();

//Faz busca de TCC

if(isset($_POST['buscar'])){

     $nomeBusca = $_POST['nomeBusca'];
     $tipo = $_POST['check'];


  if($nomeBusca != ''){

     $query = mysql_query("SELECT*FROM `aluno_tcc` ");

    if($tipo == 'titulo'){

     while($aluno_tcc = mysql_fetch_array($query)){


           $nomeTCC = $aluno_tcc['Nome_TCC'];



           if(strpos($nomeTCC,$nomeBusca) !== false ){

               $nomeAluno = $aluno_tcc['Aluno'];
               $nomeOrientador = $aluno_tcc['Nome_Orientador'];
               $arquivo = $aluno_tcc['Caminho_Arquivo'];
               $imagem =$aluno_tcc['Caminho_Imagem'];
               $id = $aluno_tcc['ID'];

               array_push($busca,"

               <tr>
               <td><img width='30' height='30' alt='foto do aluno/default' src='$imagem' style='border-radius:30px;' />&nbsp&nbsp$nomeAluno</td>
               <td>$nomeTCC</td>
               <td>$nomeOrientador</td>
               <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
               <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
               </tr>




               ");


           }
     }
   }
   else if($tipo == 'orientador'){

           while($aluno_tcc = mysql_fetch_array($query)){


              $orientadorTCC = $aluno_tcc['Nome_Orientador'];

              if(strpos($orientadorTCC,$nomeBusca) !== false){

                $nomeAluno = $aluno_tcc['Aluno'];
                $nomeTCC = $aluno_tcc['Nome_TCC'];
                $nomeTCC = $aluno_tcc['Nome_TCC'];
                $arquivo = $aluno_tcc['Caminho_Arquivo'];
                $imagem =$aluno_tcc['Caminho_Imagem'];
                $id = $aluno_tcc['ID'];

                array_push($busca,"

                <tr>
                <td><img width='30' height='30' alt='foto do aluno/default' src='$imagem' style='border-radius:30px;' />&nbsp&nbsp$nomeAluno</td>
                <td>$nomeTCC</td>
                <td>$orientadorTCC</td>
                <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
                <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
                </tr>




                ");
              }
           }



   }
   else if($tipo == 'chaves'){



                while($aluno_tcc = mysql_fetch_array($query)){


                   $chavesTCC = $aluno_tcc['Palavras_Chaves'];
                   $chavesTCC =  explode(',',$chavesTCC);

              for($i=0;$i<sizeof($chavesTCC);$i++){

                        $nomeBusca = str_replace(' ', '', $nomeBusca);



                   if(strpos($chavesTCC[$i],$nomeBusca) !== false){


                                     $nomeAluno = $aluno_tcc['Aluno'];
                                     $nomeTCC = $aluno_tcc['Nome_TCC'];
                                     $nomeOrientador = $aluno_tcc['Nome_Orientador'];
                                     $arquivo = $aluno_tcc['Caminho_Arquivo'];
                                     $imagem =$aluno_tcc['Caminho_Imagem'];
                                     $id = $aluno_tcc['ID'];

                                     array_push($busca,"

                                     <tr>
                                     <td><img width='30' height='30' alt='foto do aluno/default' src='$imagem' style='border-radius:30px;' />&nbsp&nbsp$nomeAluno</td>
                                     <td>$nomeTCC</td>
                                     <td>$nomeOrientador</td>
                                     <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
                                     <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
                                     </tr>




                                     ");

                   }
                 }
                }

   }


   }
   else{
            header('location:dashboard-tcc.php');

   }




   if(empty($busca))
   echo "<script>alert('Nenhum TCC encontrado')</script>";




}




//Remove TCC
if(isset($_POST['removerTCC'])){

         $id = $_POST['removerTCC'];
         $query = mysql_query("SELECT*FROM `aluno_tcc` WHERE `ID`='$id'"); //sempre vai existir
         $linhaTCC = mysql_fetch_array($query);
         $caminhoFoto = $linhaTCC['Caminho_Imagem'];
         $caminhoPDF = $linhaTCC['Caminho_Arquivo'];
         if($caminhoFoto != 'images/default-avatar.png') // Não remove imagem default
         @unlink($caminhoFoto); //remove arquivo em pasta
         @unlink($caminhoPDF); //remove arquivo em pasta
         mysql_query("DELETE FROM `aluno_tcc` WHERE `ID` ='$id'"); //Remove do BD



}





//Faz cadastro de TCC

if(isset($_POST['enviarTCC'])){


       $nomeAluno = $_POST['nomeAluno'];
       $tituloTCC = $_POST['tituloTCC'];
       $nomeOrientador = $_POST['nomeOrientador'];
       $palavrasChaves = $_POST['palavrasChaves'];
       $foto = 'images/default-avatar.png';
       $arquivo = $_FILES['arquivoTCC']['tmp_name'];
       $nomeArquivo = $_FILES['arquivoTCC']['name'];
       $upFoto = false;
       $upArquivo =false;

       if($nomeArquivo != ''){ //Foto nao é obrigatorio so verifica arquivo



                  if(strpos($palavrasChaves,',') !== false ){ //usuario separou corretamente


                                   $palavras = explode(',',$palavrasChaves);
                                   $palavrasChaves = '';

                                   for($i=0; $i<sizeof($palavras);$i++){ //remove espaços das palavras chaves

                                           $p = str_replace(' ','', $palavras[$i]);


                                          if($i == 0){
                                           $palavrasChaves = $p; //formata para BD
                                            }
                                          else {
                                            $palavrasChaves = $palavrasChaves . ',' . $p;
                                          }
                                   }



                  }
                  else{
                         echo "<script>alert('Coloque vírgulas entre as palavras-chaves. Mínimo:2 palavras')</script>";
                         goto fim;

                  }


                      $extensao = pathinfo($nomeArquivo,PATHINFO_EXTENSION);
                      $caminhoTCC  = 'data/'. $tituloTCC.".".$extensao;

                      if($extensao == 'pdf' || $extensao == 'PDF' ){   //Verifica Extenção valida (pdf)
                                    $upArquivo= true; //Pode adicionar pdf
                                  

                       }
                       else{
                         echo "<script>alert('Extenção do arquivo inválida! Apenas .pdf permitido')</script>";
                         goto fim;
                       }

                $arquivoFoto = $_FILES['fotoEstudante']['tmp_name'];
                $nomeArquivoFoto = $_FILES['fotoEstudante']['name'];

                        if( $nomeArquivoFoto != ''){ //faz upload da foto se existir
                        $extensaoFoto = pathinfo($nomeArquivoFoto,PATHINFO_EXTENSION);
                        $foto = 'images/'.$nomeAluno.".".$extensaoFoto;

                        if($extensaoFoto == 'png' || $extensaoFoto == 'jpg' || $extensaoFoto == 'jpeg'){
                                  $upFoto = true; //Pode adicionar a foto
                        }
                        else{

                           echo "<script>alert('Extenção da imagem inválida! Somente .png, .jpg E .jpeg permitido.')</script>";
                           goto fim;

                        }
                       }
                      //insere no banco de dados
                      if($upFoto && $upArquivo){ //Pode adicionar foto e pdf
                              move_uploaded_file($arquivo,$caminhoTCC);
                              move_uploaded_file($arquivoFoto,$foto);
                      }
                      if($upArquivo){
                          move_uploaded_file($arquivo,$caminhoTCC);
                      }
                      mysql_query("INSERT INTO `aluno_tcc` (`Aluno`,`Nome_TCC`,`Nome_Orientador`,`Caminho_Arquivo`,`Caminho_Imagem`,`Palavras_Chaves`) VALUES ('$nomeAluno','$tituloTCC','$nomeOrientador','$caminhoTCC','$foto', '$palavrasChaves')");
                       fim:
                       //Não insere no banco de dados
       }
       else{
              echo "<script>alert('Arquivo de tcc não informado')</script>";
       }

}

//Finish cadastro TCC




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
      <h2>Gerenciar TCC</h2>
    </div>
 <br>
    <div class="col-md-offset-3 col-md-6">
      <h3>TCC's atuais</h3>

     <?php


           if(!empty($busca)){ //realizou busca


             echo  "

             <form method='POST' action=''>
                   <div class='row'>
                       <div class='col-md-10'>
                         <input id='nomeBusca' name='nomeBusca' type='text' class='form-control' placeholder='Nome do TCC' />
                         </div>
                         <div class='col-md-1'>
                         <button name ='buscar' type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                       </div>
                   </div>
                   <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check1' onclick='onlyOneCheck(this)' checked type='checkbox' value='titulo'>Título do TCC</label>
                   <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check2' onclick='onlyOneCheck(this)' type='checkbox' value='orientador'>Nome do Orientador</label>
                   <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check3' onclick='onlyOneCheck(this)' type='checkbox' value='chaves'>Palavras-Chaves</label>

               <table class='table table-hover' style='border-radius:10px;'>
                       <thead >
                       <tr>
                        <th>Aluno</th>
                        <th>Título do TCC</th>
                        <th>Nome do Orientador</th>
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

               $query = mysql_query("SELECT*FROM `aluno_tcc`");

                 if(mysql_num_rows($query)>0 ){

             //cabeçalho da tabela;
                 echo  "

                 <form method='POST' action=''>
                       <div class='row'>
                           <div class='col-md-10'>
                             <input id='nomeBusca' name='nomeBusca' type='text' class='form-control' placeholder='Título do TCC' />
                             </div>
                             <div class='col-md-1'>
                             <button name ='buscar' type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-search'></span>&nbsp&nbsp&nbspBuscar</button>
                           </div>
                       </div>

                       <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check1' onclick='onlyOneCheck(this)' checked type='checkbox' value='titulo'>Título do TCC</label>
                       <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check2' onclick='onlyOneCheck(this)' type='checkbox' value='orientador'>Nome do Orientador</label>
                       <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check3' onclick='onlyOneCheck(this)' type='checkbox' value='chaves'>Palavras-Chaves</label>

                   <table class='table table-hover' style='border-radius:10px;'>
                           <thead >
                           <tr>
                            <th>Aluno</th>
                            <th>Título do TCC</th>
                            <th>Nome do Orientador</th>
                            <th>Download</th>
                            <th>Remover</th>
                           </tr>
                           </thead>
                           <tbody>

                 ";

                      while($tcc = mysql_fetch_array($query)){

                        $id = $tcc['ID'];
                        $aluno = $tcc['Aluno'];
                        $nomeTCC = $tcc['Nome_TCC'];
                        $nomeOrientador = $tcc['Nome_Orientador'];
                        $caminhoArquivo = $tcc['Caminho_Arquivo'];
                        $caminhoFoto = $tcc['Caminho_Imagem'];


                        echo "


                                    <tr>
                                    <td><img width='30' height='30' alt='foto do aluno/default' src='$caminhoFoto' style='border-radius:30px;' />&nbsp&nbsp$aluno</td>
                                    <td>$nomeTCC</td>
                                    <td>$nomeOrientador</td>
                                    <td><a role='button' target='_blank'class='btn btn-warning' href='$caminhoArquivo' >Download</a></td>
                                    <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
                                    </tr>


                        ";


                      }
                      echo "</tbody>";
                      echo "</table>";
                      echo "</form>";


                 }
                 else{

                     echo "<div class='alert alert-danger'><p align='justify'>Não existe TCC cadastrado no sistema <a role='button' data-toggle='modal' data-target='#CadastrarTCC'>cadastre novos</a> </p></div>";

                 }


         }
      ?>


      <br>
      <button class="btn btn-warning col-md-offset-3 col-md-6" type="button" data-toggle="modal" data-target="#CadastrarTCC">
        Cadastrar TCC
      </button>

      <div class="modal fade" id="CadastrarTCC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cadastrar Novo TCC</h4>
            </div>
            <div class="modal-body text-justify">
              <form method='POST' action='' enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nome do Aluno</label>
                  <input required="true"  name='nomeAluno'type="text" class="form-control" id="cargo">
                </div>
                <div class="form-group">
                  <label>Título do TCC</label>
                  <input required="true" name='tituloTCC'type="text" class="form-control" id="descricao">
                </div>
                <div class="form-group">
                  <label>Nome do Orientador</label>
                  <input required="true" name='nomeOrientador' class="form-control" id="data">
                </div>
                <div class="form-group">
                  <label>Palavras-Chaves (Separar por vírgulas, Mínimo:2 palavras) </label>
                  <input required='true' name='palavrasChaves' type='text' class='form-control'  />
                </div>
                <div class='form-group'>
                  <label>Foto do Estudante (Opcional)</label>
                  <input  name='fotoEstudante'type="file" >
                  <span class="custom-file-control"></span>
                </div>
                <div class="form-group">
                  <label>Arquivo</label>
                  <input required="true" name='arquivoTCC'type="file">
                  <span class="custom-file-control"></span>
                </div>
                <button name='enviarTCC'type="submit" class="btn btn-primary">Enviar</button>
              </form>
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
  <script src="js/navbarADM.js"></script>
  <!--Script para TCC -->
  <script src='js/tcc.js'></script>

  <br><br><br>
  <?php require_once("footer.php"); ?>

</body>

</html>
