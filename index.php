
     <!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>CCECOMP UEFS</title>

    <link href='css/bootstrap-dropdownhover.min.css' rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link href='css/modern-business.css' rel='stylesheet'>

    <!-- Custom Fonts -->
    <link href='font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <link href='css/principal.css' rel='stylesheet'>

    <!-- Favicon -->
    <link rel='icon' type='images/png' sizes='32x32' href='images/favicon.ico'>

    <script src='js/jquery.js'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
        <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->

    
</head>




<body>
<?php  require_once('public_html/header.php'); ?>

	  
	    <div id='myCarousel' class='carousel slide' data-ride='carousel'>
               

                 <!-- slides -->
        <div class='carousel-inner'>

                

                

                
                 <div class="item active">
                 <img src="../images/circuits.png" alt="Imagem tema 1">
                 <div class="carousel-caption">
                 <h3 style="position:relative;top:80px">Colegiado de Engenharia de Computação da UEFS</h3>
                 <p style="position:relative;top:60px">Portal de comunicação com o estudante</p>
                 </div>
                 </div>


                 <div class="item">
                 <img src="images/theme-image1.jpeg" alt="Imagem tema 2">
                 <div class="carousel-caption">
                 <h3 style="position:relative;top:80px">Fique atento às notícias do colegiado</h3>
                 <p style="position:relative;top:60px">Acompanhe as novidades de estágio e notícias do curso</p>
                 </div>
                 </div>
            
        
        
        </div>


        

        <!-- direita e esquerda-->
                
        <a class='left carousel-control' href='#myCarousel' data-slide='prev'>
        <span class='glyphicon glyphicon-chevron-left'></span>
        <span class='sr-only'>Previous</span>
        </a>
        <a  class='right carousel-control' href='#myCarousel' data-slide='next'>
        <span class='glyphicon glyphicon-chevron-right'></span>
        <span class='sr-only'>Next</span>
        </a>
</div>


<div class='container'>
<!-- Marketing Icons Section -->
<div class'row'>
    <div class='col-lg-12'>
        <h1 class='page-header'>

        </h1>
    </div>



    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4><i class='glyphicon glyphicon-alert fa-spin'></i> Notícias</h4>
            </div>
            <div class='panel-body'>
                 <?php
                   $query = mysql_query('SELECT*FROM `ccecomp_noticias` ORDER BY `ID` DESC');

                   if(mysql_num_rows($query)>0){

                        $i=0;
                        echo "<ul style='list-style-type:none'><br>";
                        while($notice = mysql_fetch_array($query) ){ //Exibe os 5 primeiros

                           
                            $name = $notice['Titulo'];
                            $link = $notice['Link_Page'];
                            $date = $notice['Date'];
                            $date = explode('-',$date);
                            $date = array_reverse($date);
                            $date = implode('/',$date);

                            echo "<li><a href='$link'>$name ($date)</a></li>";

                         $i++;
                         if($i ==5)
                            break;
                          
                        }
                        echo "</ul>";

                       
                            echo " <div class='modal fade' id='myModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                            <div class='modal-dialog modal-lg' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                        <h4 class='modal-title' id='myModalLabel'>Mais notícias</h4>
                                    </div>
        
                                    <div class='modal-body text-justify'>";
                        echo "<ul style='list-style-type:none'><br>";

                        if(mysql_num_rows($query)<=5){

                            echo "Não existem mais notícias cadastradas";
                        }
                        else{

                        while($notice = mysql_fetch_array($query)){

                                 $name = $notice['Titulo'];
                   
                                 $link = $notice['Link_Page'];
                                 $date = explode('-',$date);
                                 $date = array_reverse($date);
                                 $date = implode('/',$date);

                              echo "<li><a href='$link'>$name ($date)</a></li>";


                        }
                        
                      }
                        echo "
                                        </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-warning' data-dismiss='modal'>Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </ul>";
                       
                        echo "<button class='btn btn-default'  type='button' data-toggle='modal' data-target='#myModal1'>+ Notícias</button>";
                        echo "</div>";
                    }
                   else{
                          echo "<a role='button'class='btn btn-default'>Não existem notícias.</a>";

                   }

                ?>

            </div>
        </div>
    </div>
    <div class='col-md-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4><i class='fa fa-spin  fa-plus-square'></i>    Estágios</h4>
            </div>
            <div class='panel-body'>
               <?php
                   $query = mysql_query('SELECT*FROM `ccecomp_estagios` ORDER BY `ID` DESC');

                   if(mysql_num_rows($query)>0){


                    $i=0;
                    echo "<ul style='list-style-type:none'><br>";
                    while($notice = mysql_fetch_array($query) ){ //Exibe os 5 primeiros

                       
                        $name = $notice['Titulo'];
                        $link = $notice['Link_Page'];
                        $date = $notice['Date'];
                        $date = explode('-',$date);
                        $date = array_reverse($date);
                        $date = implode('/',$date);

                        echo "<li><a href='$link'>$name ($date)</a></li>";

                     $i++;
                     if($i ==5)
                        break;
                      
                    }
                    echo "</ul>";


                       
                    echo " <div class='modal fade' id='myModal2' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                    <div class='modal-dialog modal-lg' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <h4 class='modal-title' id='myModalLabel'>Mais notícias de estágio</h4>
                            </div>

                            <div class='modal-body text-justify'>";
                        echo "<ul style='list-style-type:none'><br>";
                        
                        if(mysql_num_rows($query)<=5){

                            echo "Não existem mais notícias de estágio cadastradas";
                        }
                        else{

                        
                            while($notice = mysql_fetch_array($query)){

                                    $name = $notice['Titulo'];
                                    $link = $notice['Link_Page'];
                                    $date = $notice['Date'];
                                    $date = explode('-',$date);
                                    $date = array_reverse($date);
                                    $date = implode('/',$date);

                                echo "<li><a href='$link'>$name ($date)</a></li>";


                            }
                        
                        }
                        echo "
                        
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-warning' data-dismiss='modal'>Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </ul>";
                        
                        echo "<button class='btn btn-default' type='button' data-toggle='modal' data-target='#myModal2'>+ Notícias de Estágio</button>";
                        echo "</div>";
                    }
                   else{
                          echo "<a role='button'class='btn btn-default'>Não existem notícias de estágio.</a>";

                   }

                ?>
            </div>
        </div>
    </div>
    <hr>
</div>








</div>
<!-- /.container -->

<!-- jQuery -->
<br><br><br>


<?php



require_once('public_html/editPageIndex.php');


?>


<?php require_once('public_html/footer.php'); ?>

<!-- Bootstrap Core JavaScript -->
<script src='js/bootstrap.min.js'></script>
<script src='js/bootstrap-dropdownhover.min.js'></script>
</body>

</html>

         