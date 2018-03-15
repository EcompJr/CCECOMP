<?php


       




        $htmlPage = "
		<html>
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
		   <link href='../css/bootstrap-dropdownhover.min.css' rel='stylesheet'>
		   <script src='../js/jquery.js'></script>
         </head>
         <body>		
		";

		 $htmlPage .= "<?php require_once 'header.php'?>";
		 $htmlPage .= "<br>
               <div class='container'>
              <div class='row'>
                  <div class='col-lg-12'>
                      <h1 class='page-header'>$titulo</h1>
                      <ol class='breadcrumb'>
                          <li><a href='../index.php'>Home</a>
                          </li>
                          <li class='active'>$titulo</li>
                      </ol>
                  </div>
              </div>
                            <br><br>";

                 if($imagem != ''){
					  $htmlPage .= "
							  <div class='row'>
								  <div class='col-lg-6'> ";
						
						      $z=0;		  
							  $texto = explode("\n", $texto);
							  for($cont=0; $z<sizeof($texto) && ($cont+strlen($texto[$z]) <= 900  || $z == 0 ); $z++){
									$cont+=strlen($texto[$z]);	  
									$htmlPage .= "<p align='justify'>$texto[$z]</p>";
							  }
						
					

							
						

					  $htmlPage .= "</div>	<div class='col-lg-6'>
					
								   <img width='400'style='border-radius:10px'alt='Imagem da notícia' src='$imagem' />
								</div>
							  </div>";
							   
		         
			

					 $htmlPage .= "<div class='row'>
								   <div class='col-lg-12'> ";
					 
                   
				   						   
					 for(; $z<sizeof($texto); $z++)
					 $htmlPage .= "<p align='justify'>$texto[$z]</p>";
				   
                    
				   $htmlPage .= "</div>";
				   $htmlPage .= "</div>";

				}
				else{

					$htmlPage .= "<div class='row'>
					<div class='col-lg-12'> ";
					$texto = explode("\n", $texto);
					for($i=0; $i<sizeof($texto); $i++)
					$htmlPage .= "<p align='justify'>$texto[$i]</p>";

					$htmlPage .= "</div>";
					$htmlPage .= "</div>";

				   $htmlPage .= "<div class='row'>
				                 <div class='col-lg-12'> ";
					 $links = $_POST['links'];
					 $htmlPage .= "<ul>";
	                 for($i=0; $i<sizeof($links); $i++){
	   
	                       if($links[$i] != ''){
		  
		                      $htmlPage .= "<li style='display:inline'><a role='button' target='_blank'class='btn btn-warning'href='$links[$i]'>Link</a></li>";


		                    }
	                 }
					 $htmlPage .= "</ul>";
					 

			
		  $htmlPage .="
		           </div>
				</div>";
			}
			$htmlPage .="<hr>
				  </div>";
			

          $htmlPage .="

                    <script src='../js/bootstrap.min.js'></script>
					<script src='../js/navbarADM.js'></script>    
					<script src='../js/bootstrap-dropdownhover.min.js'></script>
					<?php require_once 'editPage.php';?>
					<br><br><br>
		           <?php  require_once 'footer.php' ?>
		            </body>
					</html>
		  ";
		  
		      








?>