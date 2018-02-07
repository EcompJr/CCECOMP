<?php

           $query = mysql_query("SELECT*FROM `ccecomp_paginas_criadas` WHERE `Tipo` = 'areaAluno'");



           if(mysql_num_rows($query)>0){ //Existem paginas desse tipo

        if(isset($_SESSION['auth'])){

          if($_SESSION['auth']){
              while($linhas = mysql_fetch_array($query)){

                     $nome = $linhas['Nome'];
                     $link = $linhas['Link'];
                     $link = "../public_html/". $link;
                     $id = $linhas['ID'];
                  

                     echo "

                           <li>
                           <a style='float:left;padding-right:20px'href='$link' > $nome </a><button style='font-size:10px;padding:0px 2px 0px 2px;float:right;border-radius:5px'class='btn btn-danger' name='removerPage' value='$id' type='submit'>remover</button>
                           </li>

                     ";
              }

              echo "

         <li><a data-toggle=\"modal\" onclick=\"unBuildSections('areaAluno')\"  data-target=\"#CadastrarPage\" role=\"button\"  >Adicionar</a></li>

              ";
              }
              else{

                while($linhas = mysql_fetch_array($query)){

                       $nome = $linhas['Nome'];
                       $link = $linhas['Link'];
                       $link = "../public_html/". $link;

                       echo "

                             <li>
                             <a href='$link' > $nome </a>
                             </li>

                       ";
                }
              }


            }
           else{
             while($linhas = mysql_fetch_array($query)){

                    $nome = $linhas['Nome'];
                    $link = $linhas['Link'];
                    $link = "../public_html/". $link;

                    echo "

                          <li>
                          <a href='$link' > $nome </a>
                          </li>

                    ";
             }

           }

           }
           else{

                  if(isset($_SESSION['auth'])){

                    if($_SESSION['auth']){

                       echo "

                <li><a  data-toggle=\"modal\" onclick=\"unBuildSections('areaAluno')\"  data-target=\"#CadastrarPage\" role=\"button\" >Adicionar</a></li>

                       ";
                     }
                  }



           }
 ?>
