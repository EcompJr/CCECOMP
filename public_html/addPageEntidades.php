<?php
       require_once 'conexao.php';
   if(isset($_POST['createPageEntidades'])){

         $namePage = $_POST['entityName'];
         $description = $_POST['description'];

         $htmlPage = "<html>
         <head>
           <meta charset='utf-8'>
           <meta http-equiv='X-UA-Compatible' content='IE=edge'>
           <meta name='viewport' content='width=device-width, initial-scale=1'>
           <meta name='description' content=''>
           <meta name='author' content=''>
           <title>CCECOMP UEFS</title>
           <link href='../css/bootstrap.min.css' rel='stylesheet'>
           <link href='../css/modern-business.css' rel='stylesheet'>
           <link href='../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
           <link href='../css/navbarADM.css' rel='stylesheet'>
           <link rel='icon' type='images/png' sizes='32x32' href='../images/favicon.ico'>
         </head>
         <body>

         ";




              $htmlPage .= "<?php require_once 'header.php'?>
              <div class='container'>";
              $htmlPage .= "<div class='row'>
                  <div class='col-lg-12'>
                      <h1 class='page-header'>$namePage
                      </h1>
                      <ol class='breadcrumb'>
                          <li><a href='../index.php'>Home</a>
                          </li>
                          <li class='active'>$namePage</li>
                      </ol>
                  </div>
              </div>
                            <br><br>";


 $htmlPage .= "<div class='row'>";

   if(isset($_FILES['picture']) && (pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION) =='png' || pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION) =='jpg' || pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION) =='jpeg') ){

       $htmlPage .= "
         <h3> Quem somos?</h3>
         <div class='col-md-6'>";
         $description = explode('\n',$description);
         for($c=0;$c<sizeof($description); $c++)
         $htmlPage .= "<p align='justify'>$description[$c]</p>";
         $htmlPage .= "</div>";


          $picture = $_FILES['picture'];
          @mkdir("../data/dataPages/".$namePage);
          $path = '../data/dataPages/'.$namePage."/".$picture['name'];
          $file = $picture['tmp_name'];
          move_uploaded_file($file,$path);

         $htmlPage .= "
         <div class='col-md-6'>
           <img width='550'alt='imagem da entidade'src='$path' style='border-radius:10px'     />
         </div>";

      }
      else{

             $htmlPage .= "
                <div class='col-md-12'>
                <h3> Quem somos?</h3>
                      <p align='justify'>$description</p>

                </div>
             ";

      }

      $htmlPage .=  "</div>"; //row


      $htmlPage .= "<div class='row'>";

      if($_POST['iframe'] !='' && ($_POST['site'] != '' || $_POST['facebook'] != '' || $_POST['instagram'] != '' || $_POST['email'] != '' || $_POST['phone'] != ''  ) ){

          $iframe = $_POST['iframe'];
          $htmlPage .= "
          <div class='col-md-6'>
                   <h3>Localização</h3>
                   $iframe
          </div>
          "; //Mapa



          $htmlPage .= "
          <div class='col-md-6'>
           <h3>Redes Sociais e Links</h3>";
            $htmlPage .= "<div class='row'>";
           if(isset($_POST['facebook'])){
             $facebook = $_POST['facebook'];
             $htmlPage .= "<div class='col-md-2'>
               <a href='$facebook' target='_blank'><i  class='fa fa-facebook-square fa-3x'></i></a>
             </div>";
           }

           if($_POST['site'] != '' ){
             $site = $_POST['site'];
             $htmlPage .= "<div class='col-md-2'>
               <a href='$site' target='_blank'><span class=' fa-3x  glyphicon glyphicon-globe'></span></i></a>
             </div>";
           }

           if($_POST['instagram'] != ''){
             $instagram = $_POST['instagram'];
             $htmlPage .= "  <div class='col-md-2'>
                 <a href='$instagram' target='_blank'><i class='fa fa-instagram fa-3x' aria-hidden='true'></i></a>
               </div>";
           }

           if($_POST['email'] != '' || $_POST['phone'] != ''){

             $htmlPage .= "<div class='col-md-1'>
               <a role='button'  data-toggle='collapse' data-target='#info'  ><i style='color:#f0ad4e' class='fa-2x glyphicon glyphicon-plus'></i></a>
               <div id='info' class='collapse'>
               <p>";
               if( $_POST['email'] != ''){
                 $email = $_POST['email'];
                 $htmlPage .= "Email: $email<br>";
               }
               if($_POST['phone'] != ''){
                 $phone = $_POST['phone'];
                 $htmlPage .= "Número: $phone<br>";
               }
               $htmlPage .= "</p></div>";

           }

            $htmlPage .= "</div>"; //row links



      }
      else if($_POST['iframe'] !=''){

        $iframe = $_POST['iframe'];
        $htmlPage .= "
        <div class='col-md-6'>
                 <h3>Localização</h3>
                 $iframe
        </div>
        "; // Só Mapa

      }
      else if($_POST['site'] != '' || $_POST['facebook'] != '' || $_POST['instagram'] != '' || $_POST['email'] != '' || $_POST['phone'] != ''){

        $htmlPage .= "
        <div class='col-md-6'>
         <h3>Redes Sociais e Links</h3>";
          $htmlPage .= "<div class='row'>";
         if($_POST['facebook'] != ''){
           $facebook = $_POST['facebook'];
           $htmlPage .= "<div class='col-md-2'>
             <a href='$facebook' target='_blank'><i  class='fa fa-facebook-square fa-3x'></i></a>
           </div>";
         }

         if($_POST['site'] != ''){
           $site = $_POST['site'];
           $htmlPage .= "<div class='col-md-2'>
             <a href='$site' target='_blank'><span class='fa-3x glyphicon glyphicon-globe'></span></i></a>
           </div>";
         }

         if($_POST['instagram'] != ''){
           $instagram = $_POST['instagram'];
           $htmlPage .= "  <div class='col-md-2'>
               <a href='$instagram' target='_blank'><i class='fa fa-instagram fa-3x' aria-hidden='true'></i></a>
             </div>";
         }

         if( $_POST['email'] != '' || $_POST['phone'] != ''){

           $htmlPage .= "<div class='col-md-1'>
             <a role='button'  data-toggle='collapse' data-target='#info'  ><i style='color:#f0ad4e' class='fa-2x glyphicon glyphicon-plus'></i></a>
             <div id='info' class='collapse'>
             <p>";
             if($_POST['email'] != ''){
               $email = $_POST['email'];
               $htmlPage .= "Email: $email<br>";
             }
             if($_POST['phone'] != ''){
               $phone = $_POST['phone'];
               $htmlPage .= "Número: $phone<br>";
             }
             $htmlPage .= "</p></div>";

         }

          $htmlPage .= "</div>"; //row links



      }



      $htmlPage .= "</div>"; //row


          $htmlPage .="</div>"; //container
          $htmlPage .= "
                <hr></div>
             </div>


          <script src='../js/jquery.js'></script>
          <script src='../js/bootstrap.min.js'></script>
          <script src='../js/navbarADM.js'></script>

           <?php require_once 'editPage.php';?>
         <br><br><br><br><br><br><br>
          ";

            $htmlPage .= "<?php  require_once 'footer.php' ?>";

        $htmlPage .=  "


               </body>
               </html>
          ";

           $pathPage = $namePage.".php";
           $file = fopen($pathPage, 'w');
           fwrite($file,$htmlPage);
           $type = 'entidades';
           fclose($file);

           mysql_query("INSERT INTO `ccecomp_paginas_criadas` (`Nome`, `Tipo`, `Link`) VALUES ('$namePage','$type','$pathPage')");
           echo "<script>window.location.href=window.location.href</script>";

           }




if(isset($_POST['removerPageEntidades'])){


            $id = $_POST['removerPageEntidades'];


           $query = mysql_query("SELECT*FROM `ccecomp_paginas_criadas` WHERE `ID` = $id");
           $info = mysql_fetch_array($query);
           $path = $info['Link'];
           $name = $info['Nome'];
           if(file_exists("../data/dataPages/". $name))
           delTreeEntity("../data/dataPages/". $name);
           @unlink($path);


            mysql_query("DELETE FROM `ccecomp_paginas_criadas` WHERE `ID`= '$id' ");
            echo "<script>window.location.href=window.location.href</script>";



}

function delTreeEntity($dir) {
  $files = array_diff(scandir($dir), array('.','..'));
  foreach ($files as $file) {
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
  }
  return rmdir($dir);
}


 ?>
