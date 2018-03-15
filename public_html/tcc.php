<?php
session_start();
require_once 'conexao.php';

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


if(isset($_POST['buscar'])){ //Faz busca de TCC

     $nomeBusca = $_POST['nomeBusca'];
     $nomeBusca = limpaString($nomeBusca);
     $nomeBusca = strtoupper($nomeBusca);
     $tipo = $_POST['check'];
    


  if($nomeBusca != ''){

     

     $nomeBusca = explode(' ', $nomeBusca);
     
     for($i=0; $i<sizeof($nomeBusca); $i++){

        if($nomeBusca[$i] == '')
        break;
 
        $query = mysql_query("SELECT*FROM `aluno_tcc` ORDER BY `ID` DESC ");

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



               $str = "

               <tr>
               <td>$nomeAluno</td>
               <td>$nomeTCC</td>
               <td>$nomeOrientador</td>
               <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
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



                $str = "

                <tr>
                <td>$nomeAluno</td>
                <td>$nomeTCC</td>
                <td>$orientadorTCC</td>
                <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
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



                                     $str = "

                                     <tr>
                                     <td>$nomeAluno</td>
                                     <td>$nomeTCC</td>
                                     <td>$nomeOrientador</td>
                                     <td><a role='button' target='_blank'class='btn btn-warning' href='$arquivo' >Download</a></td>
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


 ?>









<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCECOMP UEFS</title>

    <link href='../css/bootstrap-dropdownhover.min.css' rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->

  <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->


    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="../images/favicon.ico">

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php require_once("header.php") ?>

<body>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">TCC
                </h1>
                <ol style="font-size:15pt" class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">TCC</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
<br>

<br><br>

<div class='row'>
     <div class='col-md-12 '>
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
              <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check1' onclick='onlyOneCheck(this)' checked disabled=true type='checkbox' value='titulo'>Título do TCC</label>
              <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check2' onclick='onlyOneCheck(this)' type='checkbox' value='orientador'>Nome do Orientador</label>
              <label style='text-transform:capitalize;'class='checkbox-inline'><input name='check' id='check3' onclick='onlyOneCheck(this)' type='checkbox' value='chaves'>Palavras-Chave</label>

          <table class='table table-hover' style='border-radius:10px;'>
                  <thead >
                  <tr>
                   <th>Aluno</th>
                   <th>Título do TCC</th>
                   <th>Nome do Orientador</th>
                   <th>Download</th>
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
                      </tr>
                      </thead>
                      <tbody>

            ";

                 while($tcc = mysql_fetch_array($query)){

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
                               </tr>


                   ";


                 }
                 echo "</tbody>";
                 echo "</table>";
                 echo "</form>";


            }
            else{

                echo "<div class='alert alert-danger' ><p align='justify'>Não existem TCCs cadastrados no sistema </p></div>";

            }


    }
 ?>
    </div>

</div>
<br><br><br><br><br><br><br><br><br><br><br>
  <hr>
</div>



    <!-- /.container -->



    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src='../js/bootstrap-dropdownhover.min.js'></script>
    <!--Script para TCC -->
    <script src='../js/tcc.js'></script>
    
    <?php require_once("footer.php") ?>

</body>

</html>
