
<?php

if(!isset($_SESSION))
session_start();
require_once 'conexao.php';


require_once 'addPage.php';

 ?>



<nav style="background-color:#4d6aa0;color:white;border-color:#4d6aa0" class="navbar navPanel navbar-inverse navbar-fixed-top" role="navigation">
<form style='margin-bottom:2px'method='post' action=''>
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
            <img  alt="logo do colegiado" width="45" height="40" style="padding-top:10px" src="images/customLogo1.png" />
            <a class="navbar-brand" href="index.php" >CCECOMP</a>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="about.php">SOBRE</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">O CURSO</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="objetivos.php">Objetivos</a>
                        </li>
                        <li>
                            <a href="perfil.php">Perfil do Profissional</a>
                        </li>
                        <li>
                            <a href="mercado.php">Mercado</a>
                        </li>
                        <li>
                            <a href="docentes.php">Docentes</a>
                        </li>
                        <li>
                            <a href="curriculo.php">Currículo do Curso</a>
                        </li>
                        <li>
                            <a href="infraestrutura.php">Infraestrutura</a>
                        </li>
                        <?php  require_once 'listAddPageCurso.php';?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">ÁREA DO ALUNO</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="formularios.php">Procedimentos e Formulários</a>
                        </li>
                        <li>
                            <a href="tcc.php">TCC</a>
                        </li>
                        <li>
                            <a href="estagio.php">Estágio</a>
                        </li>
                        <li>
                            <a href="resolucoes.php">Resoluções</a>
                        </li>
                        <?php   require_once 'listAddPageAreaAluno.php'?>
                    </ul>
                </li>
                <li>
                    <a href="entidades.php">ENTIDADES</a>
                </li>
                <li>
                    <a href="contact.php">CONTATO</a>
                </li>
                <li class="dropdown">
                    <a href="login.php">ACESSO RESTRITO</a>
                <li>
            </li>
            </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->

    <!--Cadastro Form -->
</form>
<script src='js/registerPage.js'> </script>
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
