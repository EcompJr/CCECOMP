
<div id="wrapper">
       <div class="overlay"></div>

       <!-- Sidebar -->
       <nav class="navbar navbar-inverse  navbar-fixed-top" id="sidebar-wrapper" role="navigation">
           <ul class="nav sidebar-nav">
               <li class="sidebar-brand">
                   <a href="index.php">
                      <img  alt="logo do colegiado" width="40"  src="../images/customLogo1.png" /> CCECOMP ADM
                           <i style="color:#f0ad4e" class="fa fa fa-wrench fa-spin fa-2x" aria-hidden="true"></i>
                   </a>
               </li>  <br><br>
               <li>
                   <a href="dashboardADM.php">Home</a>
               </li>
               <li>
                 <a href="dashboard-noticias.php">Notícias</a>
               </li>
               <li>
                   <a href="dashboard-tcc.php">TCC</a>
               </li>
               <li>
                   <a href="dashboard-resolucoes.php">Resoluções</a>
               </li>
               <li>
                   <a href="dashboard-estagio.php">Oportunidades de Estágio</a>
               </li>
               <li>
                   <a href="../index.php">Início</a>
               </li>
              <li>
                 <a href="?logoff=go"> Sair </a>
              </li>




           </ul>
       </nav>
       <!-- /#sidebar-wrapper -->

       <!-- Page Content -->
       <div id="page-content-wrapper">
           <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
               <span class="hamb-top"></span>
         <span class="hamb-middle"></span>
       <span class="hamb-bottom"></span>
           </button>

       </div>
       <!-- /#page-content-wrapper -->

   </div>
   <!-- /#wrapper -->


   <?php

      if(isset($_GET['logoff'])){
          if($_GET['logoff'] == 'go'){


                   $_SESSION['auth']= False;
				   unset($_SESSION['email']);
                   header("location:login.php");


          }
        }


    ?>
