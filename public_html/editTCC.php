<?php
session_start();
require_once 'conexao.php';
if(!$_SESSION['auth']){

            header('location:login.php');
}

$array;
$id;


if(isset($_GET['tcc'])){ //pegar id do tcc

    $id = $_GET['tcc'];

    $query = mysql_query("SELECT*FROM `aluno_tcc` WHERE `ID`='$id'" );

    $array = mysql_fetch_array($query);


 }
 else{

    header("location:dashboard-tcc.php");
 }



//atualiza valores
if(isset($_POST['enviar'])){

       $nome = $_POST['nomeAluno'];
       $titulo = $_POST['tituloTCC'];
       $orientador = $_POST['nomeOrientador'];
       $palavras = $_POST['palavrasChaves'];
       $upArquivo=false;
       
       if(strpos($palavras,',') !== false ){ //usuario separou corretamente 

        $nomeArquivo = $_FILES['arquivoTCC']['name'];
            if($nomeArquivo != ''){

                    @unlink($array['Caminho_Arquivo']); //remove arquivo anterior
                    $extensao = pathinfo($nomeArquivo,PATHINFO_EXTENSION);
                    $caminhoTCC  = '../data/'. $titulo.".".$extensao;
                    $arquivo = $_FILES['arquivoTCC']['tmp_name'];

                            if($extensao == 'pdf' || $extensao == 'PDF' ){   //Verifica Extenção valida (pdf)
                                move_uploaded_file($arquivo,$caminhoTCC);

                                mysql_query("UPDATE `aluno_tcc` SET  `Aluno`='$nome',`Nome_TCC`='$titulo',`Nome_Orientador`='$orientador',`Caminho_Arquivo`='$caminhoTCC',`Palavras_Chaves`='$palavras' WHERE `ID`='$id'");

                                echo "<script>alert('Modificação concluída')</script>";
                                echo "<script>window.location.href=window.location.href</script>";

                            }
                            else{
                                echo "<script>alert('Extenção do arquivo inválida! Apenas .pdf permitido')</script>";
                                echo "<script>window.location.href=window.location.href</script>";
                                
                            }


            }
            else{

                echo "<script>alert('Modificação concluída')</script>";
                echo "<script>window.location.href=window.location.href</script>";
                mysql_query("UPDATE `aluno_tcc` SET  `Aluno`='$nome',`Nome_TCC`='$titulo',`Nome_Orientador`='$orientador',`Palavras_Chaves`='$palavras' WHERE `ID`='$id'");
            
                echo "<script>window.location.href=window.location.href</script>";

            }
      
       }
       else{

        echo "<script>alert('Coloque vírgulas entre as palavras-chaves. Mínimo:2 palavras')</script>";
       }
    
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
      <h2>Editar TCC</h2>
    </div>
 <br>
    <div class="col-md-offset-3 col-md-6">
      <h3>Informações</h3>
</div>

 <form method="POST" action=""  enctype="multipart/form-data">
    <div class="row">

            <div class="col-md-offset-3 col-md-4">
            <label style="color:#f46214">Aluno</label>
            <input required="true"  name='nomeAluno' value='<?php echo $array['Aluno']?>' class="form-control"  maxlength='200' type="text" >
            </div>
            <div class="col-md-4">
            <label style="color:#f46214">Título</label>
            <input required="true"  name='tituloTCC' value='<?php echo $array['Nome_TCC']?>' class="form-control"  maxlength='255' type="text" >
            </div>

    </div>
    <br>
    <div class="row">

            <div class="col-md-offset-3 col-md-4">
            <label style="color:#f46214">Orientador</label>
            <input required="true"   name='nomeOrientador' value='<?php echo $array['Nome_Orientador']?>' class="form-control"  maxlength='200' type="text" >
            </div>
            <div class=" col-md-4">
            <label style="color:#f46214">Palavras-Chave <label>(Separar por vírgulas, Mínimo:2 palavras)</label></label>
            <input required="true"   name='palavrasChaves' name='palavrasChave' value='<?php echo $array['Palavras_Chaves']?>' class="form-control"  maxlength='200' type="text" >
            </div>
      

    </div>
    <br>
    <div class="row">

            <div class="col-md-offset-3 col-md-4">
            <label style="color:#f46214">Novo Arquivo</label>
            <input  name='arquivoTCC' type="file"> 
            <span class="custom-file-control"></span> 
            </div>
    </div>
    <br>
    <div class="row">

             <div class="col-md-offset-3 col-md-1">
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
             </div>
    </div>
</form>

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