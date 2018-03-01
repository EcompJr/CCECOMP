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



if(isset($_POST['sendFile'])){ //cadastro de aquivo



    $file = $_FILES['file']['tmp_name'];
    $nameFile = $_FILES['file']['name'];

    if($nameFile != ''){

          $extension = pathinfo($nameFile,PATHINFO_EXTENSION);
          $nameFile = str_replace(".".$extension,'',$nameFile);
          $sql = "SHOW TABLE STATUS LIKE 'ccecomp_files'";
          $result = mysql_query($sql);
          $linha = mysql_fetch_array($result);
          $next = $linha['Auto_increment'];
          $path  = '../data/'. "Arquivo".$next.".".$extension;
          
          move_uploaded_file($file,$path);
          mysql_query("INSERT INTO `ccecomp_files` (`Nome`,`Link`) VALUES ('$nameFile', '$path')");
          echo "<script>window.location.href=window.location.href</script>";





    }
    else{

      echo "<script>alert('Arquivo de upload não informado')</script>";
      echo "<script>window.location.href=window.location.href</script>";
    }



}


if(isset($_POST['searchFile'])){ //Faz busca de arquivo


  $nameFile = $_POST['nameFile'];
  $nameFile = limpaString($nameFile);
  $nameFile = strtoupper($nameFile);


  if($nameFile != ''){

  $query = mysql_query("SELECT*FROM `ccecomp_files`");

  while($linhas = mysql_fetch_array($query)){

     $nameFileBD = $linhas['Nome'];
     $nameFileBD = limpaString($nameFileBD);
     $nameFileBD = strtoupper($nameFileBD);

     if(strpos($nameFileBD, $nameFile) !== false){
       
           $link = $linhas['Link'];
           $id = $linhas['ID'];



           array_push($busca,"

           <li class='list-group-item'>
           <a href='$link' target='_blank'>Link: $link</a>
           <button name='removeFile' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button> 
           </li>


           ");


     }
   }
 }
   else{

     echo "<script>window.location.href=window.location.href</script>";
   }


 if(empty($busca))
 echo "<script>alert('Não existe nenhum arquivo com este nome')</script>";


}



if(isset($_POST['removeFile'])){



   $id = $_POST['removeFile'];
   $query = mysql_query("SELECT*FROM `ccecomp_files` WHERE `ID`='$id'"); //sempre vai existir
   $linha = mysql_fetch_array($query);
   $caminho = $linha['Link'];
   @unlink($caminho); //remove arquivo em pasta
   mysql_query("DELETE FROM `ccecomp_files` WHERE `ID` ='$id'"); //Remove do BD
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

        <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-11">
            <h2>Upload de Arquivos</h2>
        </div>
         
    </div>
    <div class="row">

        <div class="col-md-offset-3 col-md-8 col-xs-12 ">
            <form  method="POST" action=""  enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-10 col-xs-offset-1 col-xs-8">
                            <input class="form-control" name="nameFile" > 
                        </div>
                        <div class="col-md-1 col-xs-1">
                            <button class="btn btn-warning" type="submit" name="searchFile">Buscar</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                       <div class="col-md-12 col-xs-offset-1 col-xs-11">
                            
                       <ul class="list-group">
                            
                            
                             <?php



                              if(!empty($busca)){


                                for($i=0; $i<sizeof($busca);$i++){

                                  echo $busca[$i];
                                }



                              }
                              else{
                                      $query = mysql_query("SELECT*FROM `ccecomp_files`");

                                      if(mysql_num_rows($query)>0){
      
                                          while($fetch = mysql_fetch_array($query)){
      
                                              $link = $fetch['Link'];
                                              $id = $fetch['ID'];
      
                                              echo "
                                              <li class='list-group-item'>
                                              <a href='$link' target='_blank'>Link: $link</a>
                                              <button name='removeFile' value='$id'style='float:right' type='submit' class='btn btn-danger'>Remover</button> 
                                              </li>";
      
                                          } 
      
      
                                      }
                                      else{
                                      echo "<div class='alert alert-danger'><p align='justify'>Não existem uploads de arquivos nesta página  </p></div>";
                                      }


                              }
                              

                                   

                             ?>

                        </ul>

                      </div>
                    </div>
                    
                    <br><br>
                    <div  class="row">
                        <div class="col-md-12 col-xs-offset-1 col-xs-11">
                            <div class="form-group"> 
                            <label style="color:#f46214">Arquivo</label> 
                            <input  name='file'type="file"> 
                            <span class="custom-file-control"></span> 
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-xs-offset-1 col-xs-11">
                        <button class="btn btn-primary" type="submit" name="sendFile">Enviar</button>
                        </div>
                    </div>

                

            </form>

        </div>      

    </div>








    <br>
    <br>
    <br>



    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

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