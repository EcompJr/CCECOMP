<?php

   if(isset($_POST['createPage'])){
       
      

         $numSections =  $_POST['numSections'];
         $namePage = $_POST['namePage'];

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




              $htmlPage .= "<?php require_once 'header.php'?>";
              $htmlPage .= "<br>
               <div class='container'>
              <div class='row'>
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


         for($i =0; $i<$numSections; $i++){

                 $titleSection = $_POST['titleSection'.$i];
                 $textSection = $_POST['Text'.$i];


                 $htmlPage .= "

                    <div class='row'>
                    <div class='col-md-12'>
                    <h4>$titleSection</h4>";
                    $textSection = explode("\n",$textSection);
                    for($c=0;$c<sizeof($textSection); $c++)
                    $htmlPage .= "<p align='justify'>$textSection[$c]</p>";


                    $htmlPage .= "<br>";



                     $htmlPage .= "<ul>";

                     $linksSection = $_POST['links'.$i]; //Array
                     $numLink=0;
                     for($a=0;$a<sizeof($linksSection); $a++){

                      if($linksSection[$a] != ''){
                       $numLink++;
                       $htmlPage .= "
                       <li style='display:inline'><a role='button' target='_blank'class='btn btn-warning'href='$linksSection[$a]'>link $numLink</a></li>
                       ";
                      }
                     }
                     $htmlPage .=  "</ul>";




                 if(isset($_FILES['fileSection'.$i])){

                     $htmlPage .= "<ul>";

                     $filesSection = $_FILES['fileSection'.$i]; //Array
                    
                            if($_SERVER['REQUEST_URI']== '/index.php'){
                                @mkdir("data/dataPages/".$namePage);

                            }
                            else{
                                @mkdir("../data/dataPages/".$namePage);
                            }
                     
                     for($b=0; $b< sizeof($filesSection); $b++){

                         if(isset($filesSection['name'][$b]) && @$filesSection['name'][$b] != ''){

                            if($_SERVER['REQUEST_URI'] == '/index.php'){
                                $path = 'data/dataPages/'.$namePage."/".$filesSection['name'][$b]; //Pode colocar qualquer arquivo

                            }
                            else{

                                $path = '../data/dataPages/'.$namePage."/".$filesSection['name'][$b]; //Pode colocar qualquer arquivo
                            }
                            
                             
                             
                             $file = $filesSection['tmp_name'][$b];
                             move_uploaded_file($file,$path);
                            $htmlPage .= "
                            <li style='display:inline'><a  role='button' target='_blank'class='btn btn-warning' href='$path'>".pathinfo($filesSection['name'][$b], PATHINFO_FILENAME)."</a></li>
                            ";
                          }
                     }

                    $htmlPage .=  "</ul>";
                 }


             $htmlPage .= "</div></div>";


         }




          $htmlPage .= "
          <hr>
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
           $file;
           if($_SERVER['REQUEST_URI'] == '/index.php'){
                 $file = fopen("public_html/".$pathPage, 'w');
           }
           else{
            $file = fopen($pathPage, 'w');

           }
           
           fwrite($file,$htmlPage);
           $type = $_POST['location'];
           fclose($file);

           mysql_query("INSERT INTO `ccecomp_paginas_criadas` (`Nome`, `Tipo`, `Link`) VALUES ('$namePage','$type','$pathPage')");
           echo "<script>window.location.href=window.location.href</script>";
           





   }




if(isset($_POST['removerPage'])){


            $id = $_POST['removerPage'];


           $query = mysql_query("SELECT*FROM `ccecomp_paginas_criadas` WHERE `ID` = $id");
           $info = mysql_fetch_array($query);
           $path = $info['Link'];
           $name = $info['Nome'];
           

                if($_SERVER['REQUEST_URI'] == '/index.php'){
                    
                    
                        if(file_exists("data/dataPages/". $name))
                            delTree("data/dataPages/". $name);
                    @unlink("public_html/".$path);

                }
                else{
                        if(file_exists("../data/dataPages/". $name))
                            delTree("../data/dataPages/". $name);

                    @unlink($path);
                }
          


            mysql_query("DELETE FROM `ccecomp_paginas_criadas` WHERE `ID`= '$id' ");
            echo "<script>window.location.href=window.location.href</script>";




}

function delTree($dir) {
  $files = array_diff(scandir($dir), array('.','..'));
  foreach ($files as $file) {
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
  }
  return rmdir($dir);
}


 ?>
