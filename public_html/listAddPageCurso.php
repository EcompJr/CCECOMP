<?php

           $query = mysql_query("SELECT*FROM `ccecomp_paginas_criadas` WHERE `Tipo` = 'curso'");



           if(mysql_num_rows($query)>0){ //Existem paginas desse tipo

        if(isset($_SESSION['auth'])){

          if($_SESSION['auth']){
              while($linhas = mysql_fetch_array($query)){

                     $nome = $linhas['Nome'];
                     $link = $linhas['Link'];
                     $id = $linhas['ID'];


                     echo "

                           <li>
                           <a style='float:left;padding-right:20px'href='$link' > $nome </a><button style='font-size:10px;padding:0px 2px 0px 2px;float:right;border-radius:5px'class='btn btn-danger' name='removerPage' value='$id' type='submit'>remover</button>
                           </li>

                     ";
              }

              echo "

         <li><a data-toggle=\"modal\" onclick=\"unBuildSections('curso')\"  data-target=\"#CadastrarPage\" role=\"button\"  >Adicionar</a></li>

              ";
              }
              else{

                while($linhas = mysql_fetch_array($query)){

                       $nome = $linhas['Nome'];
                       $link = $linhas['Link'];

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

                  <td><li><a  data-toggle=\"modal\" onclick=\"unBuildSections('curso')\"  data-target=\"#CadastrarPage\" role=\"button\" >Adicionar</a></li></td>

                       ";
                     }
                  }



           }
 ?>
