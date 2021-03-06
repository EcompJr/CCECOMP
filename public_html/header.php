<?php

if(!isset($_SESSION))
session_start();


$con = @mysql_connect("localhost", "root", "") or die("Não foi possível conectar ao BD!");
mysql_select_db("ccecompbd", $con) or die("Banco não localizado!");
    require_once("addPage.php");

?>

<style>

.sizeHighBrand{


    position:relative;
    top:15px;
}

.sizeHighList{

    position:relative;
    top:15px;

}



@media screen and (min-width:200px){

    .sizeHighBrand{

        font-size:15px;
        top:0px;
        
    } 

        
    .sizeHighImg{
        height:40px; 
    }

     
}

@media screen and (min-width:980px){ 

    .sizeHighBrand{

        height:40px;
        font-size:35px;
        top:15px;
        line-height: 20px;


    } 


    .sizeHighImg{

        height:70px; 
    
    }

    .sizeHighLit{


        padding-top: 15px;
        padding-bottom: 15px;
        padding: 10px 15px;
        line-height: 20px;


    }


}

</style>

<nav style="background-color:#002f87;color:white;border-color:#002f87" class="navbar navPanel navbar-inverse navbar-fixed-top" role="navigation">
<form style='margin-bottom:-1px'method='post' action=''>
    <div  class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div   class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
            <div>
            <img  class="sizeHighImg"alt="logo da uefs"  height="70" style="padding-top:10px" src="../images/uefsLogo2.png" />
             
            <a  class="navbar-brand sizeHighBrand" href="../index.php" >CCECOMP</a>
            <img class="sizeHighImg" alt="logo do colegiado" width="45" height="60" style="padding-top:10px" src="../images/customLogo1.png" />
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right sizeHighList">
                <li>
                    <a href="../public_html/about.php">Sobre</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">O Curso</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../public_html/objetivos.php">Objetivos</a>
                        </li>
                        <li>
                            <a href="../public_html/perfil.php">Perfil do Profissional</a>
                        </li>
                        <li>
                            <a href="../public_html/mercado.php">Mercado</a>
                        </li>
                        <li>
                            <a href="../public_html/docentes.php">Docentes</a>
                        </li>
                        <li>
                            <a href="../public_html/curriculo.php">Currículo do Curso</a>
                        </li>
                        <li>
                            <a href="../public_html/infraestrutura.php">Infraestrutura</a>
                        </li>
                      
                        <?php 
                           if($_SERVER['REQUEST_URI'] == '/index.php'){

                                  require_once 'public_html/listAddPageCurso.php';
                           }
                           else{
                                  require_once 'listAddPageCurso.php';
                           }
                        
                        ?>
                        
                      

                    </ul>
                </li>
                <li class="dropdown">
                   <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Área do Aluno</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../public_html/formularios.php">Procedimentos e Formulários</a>
                        </li>
                        <li>
                            <a href="../public_html/tcc.php">TCC</a>
                        </li>
                        <li>
                            <a href="../public_html/estagio.php">Estágio</a>
                        </li>
                        <li>
                            <a href="../public_html/resolucoes.php">Resoluções</a>
                        </li>
                        
                         <?php

                                if($_SERVER['REQUEST_URI'] == '/index.php'){

                                    require_once 'public_html/listAddPageAreaAluno.php';
                                }
                                else{
                                    require_once 'listAddPageAreaAluno.php';
                                }

                         ?>
                    
                    </ul>
                </li>
                <li>
                    <a href="../public_html/entidades.php">Entidades</a>
                </li>
                <li>
                    <a href="../public_html/contact.php">Contato</a>
                </li>

            </li>
            </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->

    <!--Cadastro Form -->
</form>
<script src='../js/registerPage.js'> </script>
<script src="../js/bootstrap-dropdownhover.min.js"></script>
</nav>

<?php


if(isset($_SESSION['auth'])){

if($_SESSION['auth']){
  echo"  <div class='modal fade' id='CadastrarPage' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog modal-lg' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <h4 class='modal-title' id='myModalLabel'>Cadastrar Nova Página</h4>
          </div>
          <div id='bodyRegister'class='modal-body text-justify'>
            <label for='sectionsNumber'>Número de Sessões</label>
            <input  name='sectionsNumber'id='sectionsNumber' class='form-control' />
            <br>
            <button class='btn btn-primary' onclick='buildSections(this)' >Enviar</button>
        </div>
      </div>
    </div>
    </div>";


    }
}

 ?>
