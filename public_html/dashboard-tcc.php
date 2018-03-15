<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

            header('location:login.php');
}

$busca = array();


function limpaString($str) { 
  $str = preg_replace('/[áàãâä]/ui', 'a', $str);
  $str = preg_replace('/[éèêë]/ui', 'e', $str);
  $str = preg_replace('/[íìîï]/ui', 'i', $str);
  $str = preg_replace('/[óòõôö]/ui', 'o', $str);
  $str = preg_replace('/[úùûü]/ui', 'u', $str);
  $str = preg_replace('/[ç]/ui', 'c', $str);
  return $str;
}


//editTCC
if(isset($_POST['editTCC'])){


    $id = $_POST['editTCC'];
    header("location:editTCC.php?tcc=$id");

}

//Faz busca de TCC

if(isset($_POST['buscar'])){

     $nomeBusca = $_POST['nomeBusca'];
     $nomeBusca = limpaString($nomeBusca);
     $nomeBusca = strtoupper($nomeBusca);
     $tipo = $_POST['check'];


  if($nomeBusca != ''){

     


     $nomeBusca = explode(' ', $nomeBusca);
     
     for($i=0; $i<sizeof($nomeBusca); $i++){

      if($nomeBusca[$i] == '')
      break;

      $query = mysql_query("SELECT*FROM `aluno_tcc` ORDER BY `ID` DESC");
    if($tipo == 'titulo'){

     while($aluno_tcc = mysql_fetch_array($query)){


           $nomeTCC = $aluno_tcc['Nome_TCC'];
           $nomeTCC = limpaString($nomeTCC);
           $nomeTCC = strtoupper($nomeTCC);



           if(strpos($nomeTCC,$nomeBusca[$i]) !== false ){

               $nomeTCC = $aluno_tcc['Nome_TCC'];
               $nomeAluno = $aluno_tcc['Aluno'];
               $nomeOrientador = $aluno_tcc['Nome_Orientador'];
               $arquivo = $aluno_tcc['Caminho_Arquivo'];
               $id = $aluno_tcc['ID'];


               $str = "

               <tr>
               <td>$nomeAluno</td>
               <td>$nomeTCC</td>
               <td>$nomeOrientador</td>
               <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
               <td><button name='editTCC' value='$id'target='_blank' class='btn btn-warning' type='submit'>Editar</button> </td>
               <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
               </tr>




               ";

               

               $put = true; 
               for($j=0; $j<sizeof($busca); $j++){
    
                    if($busca[$j] == $str){
                      $put=false;
                    }
                    

               }

               if($put)
               array_push($busca, $str);


           }
     }

     
   }
   else if($tipo == 'orientador'){

           while($aluno_tcc = mysql_fetch_array($query)){


              $orientadorTCC = $aluno_tcc['Nome_Orientador'];
              $orientadorTCC = limpaString($orientadorTCC);
              $orientadorTCC = strtoupper($orientadorTCC);

              if(strpos($orientadorTCC,$nomeBusca[$i]) !== false){


                $orientadorTCC = $aluno_tcc['Nome_Orientador'];
                $nomeAluno = $aluno_tcc['Aluno'];
                $nomeTCC = $aluno_tcc['Nome_TCC'];
                $nomeTCC = $aluno_tcc['Nome_TCC'];
                $arquivo = $aluno_tcc['Caminho_Arquivo'];
                $id = $aluno_tcc['ID'];

                $str = "

                <tr>
                <td>$nomeAluno</td>
                <td>$nomeTCC</td>
                <td>$orientadorTCC</td>
                <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
                <td><button name='editTCC' value='$id'target='_blank' class='btn btn-warning' type='submit'>Editar</button> </td>
                <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
                </tr>




                ";

                $put = true; 
                for($j=0; $j<sizeof($busca); $j++){
     
                     if($busca[$j] == $str){
                       $put=false;
                     }
                     

                }

                if($put)
                array_push($busca, $str);

              }
           }

  

   }
   else if($tipo == 'chaves'){


    
                while($aluno_tcc = mysql_fetch_array($query)){


                   $chavesTCC = $aluno_tcc['Palavras_Chaves'];
                   $chavesTCC =  explode(',',$chavesTCC);

              for($a=0;$a<sizeof($chavesTCC);$a++){

                        $nomeBusca[$i] = str_replace(' ', '', $nomeBusca[$i]);
                        $chavesTCC[$a] = str_replace(' ', '', $chavesTCC[$a]);

                       

                   if(strpos(strtoupper(limpaString($chavesTCC[$a])),$nomeBusca[$i]) !== false){

                   
                                     $nomeAluno = $aluno_tcc['Aluno'];
                                     $nomeTCC = $aluno_tcc['Nome_TCC'];
                                     $nomeOrientador = $aluno_tcc['Nome_Orientador'];
                                     $arquivo = $aluno_tcc['Caminho_Arquivo'];
                                     $id = $aluno_tcc['ID'];

                                     $str = "

                                     <tr>
                                     <td>$nomeAluno</td>
                                     <td>$nomeTCC</td>
                                     <td>$nomeOrientador</td>
                                     <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
                                     <td><button name='editTCC' value='$id'target='_blank' class='btn btn-warning' type='submit'>Editar</button> </td>
                                     <td><button name='removerTCC' value='$id'target='_blank' class='btn btn-danger' type='submit'>Remover</button> </td>
                                     </tr>




                                     ";

                                     $put = true; 
                                     for($j=0; $j<sizeof($busca); $j++){
                          
                                          if($busca[$j] == $str){
                                            $put=false;
                                          }
                                          
                     
                                     }
                     
                                     if($put)
                                     array_push($busca, $str);

                   }
                 }
                }

   }



  }



   }
   else{
    echo "<script>window.location.href=window.location.href</script>";
   }




   if(empty($busca))
   echo "<script>alert('Nenhum TCC encontrado')</script>";




}




//Remove TCC
if(isset($_POST['removerTCC'])){

         $id = $_POST['removerTCC'];
         $query = mysql_query("SELECT*FROM `aluno_tcc` WHERE `ID`='$id'"); //sempre vai existir
         $linhaTCC = mysql_fetch_array($query);
         $caminhoPDF = $linhaTCC['Caminho_Arquivo'];
         @unlink($caminhoPDF); //remove arquivo em pasta
         mysql_query("DELETE FROM `aluno_tcc` WHERE `ID` ='$id'"); //Remove do BD
         echo "<script>window.location.href=window.location.href</script>";



}





//Faz cadastro de TCC

if(isset($_POST['enviarTCC'])){


       $nomeAluno = $_POST['nomeAluno'];
       $tituloTCC = $_POST['tituloTCC'];
       $nomeOrientador = $_POST['nomeOrientador'];
       $palavrasChaves = $_POST['palavrasChaves'];
       $arquivo = $_FILES['arquivoTCC']['tmp_name'];
       $nomeArquivo = $_FILES['arquivoTCC']['name'];
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
                         echo "<script>alert('Coloque vírgulas entre as palavras-chave. Mínimo:2 palavras')</script>";
                         goto fim;

                  }


                      $extensao = pathinfo($nomeArquivo,PATHINFO_EXTENSION);
                      $caminhoTCC  = '../data/'. $tituloTCC.".".$extensao;

                      if($extensao == 'pdf' || $extensao == 'PDF' ){   //Verifica Extenção valida (pdf)
                                    $upArquivo= true; //Pode adicionar pdf
                                  

                       }
                       else{
                         echo "<script>alert('Extenção do arquivo inválida! Apenas .pdf permitido')</script>";
                         goto fim;
                         
                       }

                      if($upArquivo){
                          move_uploaded_file($arquivo,$caminhoTCC);
                      }
                      mysql_query("INSERT INTO `aluno_tcc` (`Aluno`,`Nome_TCC`,`Nome_Orientador`,`Caminho_Arquivo`,`Palavras_Chaves`) VALUES ('$nomeAluno','$tituloTCC','$nomeOrientador','$caminhoTCC', '$palavrasChaves')");
                      echo "<script>window.location.href=window.location.href</script>"; 
                      fim:
                      echo "<script>window.history.back()</script>"; 
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
                   <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check1' onclick='onlyOneCheck(this)' checked disabled=true  type='checkbox' value='titulo'>Título do TCC</label>
                   <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check2' onclick='onlyOneCheck(this)' type='checkbox' value='orientador'>Nome do Orientador</label>
                   <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check3' onclick='onlyOneCheck(this)' type='checkbox' value='chaves'>Palavras-Chave</label>

               <table class='table table-hover' style='border-radius:10px;'>
                       <thead >
                       <tr>
                        <th>Aluno</th>
                        <th>Título do TCC</th>
                        <th>Nome do Orientador</th>
                        <th>Download</th>
                        <th>Editar</th>
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

               $query = mysql_query("SELECT*FROM `aluno_tcc` ORDER BY `ID` DESC");

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

                       <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check1' onclick='onlyOneCheck(this)' checked disabled=true  type='checkbox' value='titulo'>Título do TCC</label>
                       <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check2' onclick='onlyOneCheck(this)' type='checkbox' value='orientador'>Nome do Orientador</label>
                       <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check3' onclick='onlyOneCheck(this)' type='checkbox' value='chaves'>Palavras-Chave</label>

                   <table class='table table-hover' style='border-radius:10px;'>
                           <thead >
                           <tr>
                            <th>Aluno</th>
                            <th>Título do TCC</th>
                            <th>Nome do Orientador</th>
                            <th>Download</th>
                            <th>Editar</th>
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


                        echo "


                                    <tr>
                                    <td>$aluno</td>
                                    <td>$nomeTCC</td>
                                    <td>$nomeOrientador</td>
                                    <td><a role='button' target='_blank'class='btn btn-warning' href='$caminhoArquivo' >Download</a></td>
                                    <td><button name='editTCC' value='$id'target='_blank' class='btn btn-warning' type='submit'>Editar</button> </td>
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
                  <input required="true"  maxlength='200'name='nomeAluno'type="text" class="form-control" id="cargo">
                </div>
                <div class="form-group">
                  <label>Título do TCC</label>
                  <input required="true" maxlength='255' name='tituloTCC'type="text" class="form-control" id="descricao">
                </div>
                <div class="form-group">
                  <label>Nome do Orientador</label>
                  <input required="true"  maxlength='200' name='nomeOrientador' class="form-control" id="data">
                </div>
                <div class="form-group">
                  <label>Palavras-Chave (Separar por vírgulas, Mínimo:2 palavras) </label>
                  <input required='true' name='palavrasChaves' type='text' class='form-control'  />
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
  <script src="../js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../js/bootstrap.min.js"></script>
  <!-- navBarscript -->
  <script src="../js/navbarADM.js"></script>
  <!--Script para TCC -->
  <script src='../js/tcc.js'></script>

  <br><br><br><br><br><br><br><br><br><br><br><br>
  <?php require_once("footer.php"); ?>

</body>

</html>
