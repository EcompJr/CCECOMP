
    <!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>CCECOMP UEFS</title>

    <!-- Bootstrap Core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link href='css/modern-business.css' rel='stylesheet'>

    <!-- Custom Fonts -->
    <link href='font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <link href='css/principal.css' rel='stylesheet'>

    <!-- Favicon -->
    <link rel='icon' type='images/png' sizes='32x32' href='images/favicon.ico'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
        <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->

</head>

<?php require_once 'header.php'; ?>

<body>
     
	  
	    <div id='myCarousel' class='carousel slide' data-ride='carousel'>
                <!-- Indicador -->
                <ol class='carousel-indicators'>
                <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                <li data-target='#myCarousel' data-slide-to='1'></li>
                </ol>

                 <!-- slides -->
        <div class='carousel-inner'>
                 <div class='item active'>
                 <img src='images/circuits.png' alt='Imagem tema 1'>
                 <div class='carousel-caption'>
                 <h3>Colegiado de Engenharia de Computa��o da UEFS</h3>
                 <p>Portal de comunica��o com o estudante</p>
                 <br>
                 </div>
                 </div>


                 <div class='item'>
                 <img  src='images/theme-image1.jpeg' alt='Imagem tema 2'>
                 <div class='carousel-caption'>
                 <h3 >Fique atento �s not�cias do colegiado</h3>
                 <p>Acompanhe as novidades de est�gio e not�cias do curso</p>
                 <br>
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
                <div class='panel panel-default textEdit'>
	  
                    <div class="panel-heading text-center">
                        <h4><i class="fa fa-spin fa-paperclip"></i> O que faz um Engenheiro de Computa��o?</h4>
                    </div>
                    <div class="panel-body">
					Loorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lacinia et metus ac blandit. Phasellus sit amet odio ex. Sed sapien arcu, dictum ac nibh id, posuere facilisis diam. Morbi in efficitur massa. Duis pharetra lectus felis, eu pellentesque est suscipit vel. Quisque congue convallis nulla, a convallis odio placerat id. Praesent libero nulla, porta nec finibus nec, feugiat quis ligula. Vestibulum eget purus ut turpis mollis tempus.
                    </div>
                
	  
	  
	            </div>
		    </div>
			<div class='col-md-6'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h4><i class='	fa fa-twitch fa-spin'></i> Not�cias</h4>
                    </div>
                    <div class='panel-body'>
                         <?php 
						   $query = mysql_query('SELECT*FROM `ccecomp_noticias`');

						   if(mysql_num_rows($query)>0){
						       
							    echo "<button class='btn btn-default'data-toggle='collapse' data-target='#notices'>Not�cias</button>";
								echo " <div id='notices' class='collapse'> ";
								echo "<ul style='list-style-type:none'><br>";
						        while($notice = mysql_fetch_array($query)){
								
								         $name = $notice['Titulo'];
										 $link = $notice['Link_Page'];

								      echo "<li><a href='$link'>$name</a></li>";


								}
								echo "</ul>";
								echo "</div>";
						   }
						   else{
						          echo "<a role='button'class='btn btn-default'>N�o existem not�cias.</a>";

						   }
						 
						?>
                        
                    </div>
                </div>
            </div>
            <div class='col-md-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h4><i class='fa fa-spin  fa-plus-square'></i>    Est�gios</h4>
                    </div>
                    <div class='panel-body'>
					   <?php 
						   $query = mysql_query('SELECT*FROM `ccecomp_estagios`');

						   if(mysql_num_rows($query)>0){
						       
							    echo "<button class='btn btn-default'data-toggle='collapse' data-target='#internship'>Not�cias de Est�gio</button>";
								echo "<div id='internship' class='collapse'>";
								echo "<ul style='list-style-type:none'><br>";
						        while($notice = mysql_fetch_array($query)){
								
								         $name = $notice['Titulo'];
										 $link = $notice['Link_Page'];

								      echo "<li><a href='$link'>$name</a></li>";


								}
								echo "</ul>";
								echo "</div>";
						   }
						   else{
						          echo "<a role='button'class='btn btn-default'>N�o existem not�cias de est�gio.</a>";

						   }
						 
						?>
                    </div>
                </div>
            </div>
        </div>
        
         
		 
     
     <hr>

        

    </div>
    <!-- /.container -->
	<?php require_once 'editPageIndex.php'; ?>
    <!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>

    <?php require_once('footer.php') ?>

</body>

</html>