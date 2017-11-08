<?php

           $query = mysql_query("SELECT*FROM `ccecomp_paginas_criadas` WHERE `Tipo` = 'entidades'");



           if(mysql_num_rows($query)>0){ //Existem paginas desse tipo

        if(isset($_SESSION['auth'])){

          if($_SESSION['auth']){
              while($linhas = mysql_fetch_array($query)){

                     $nome = $linhas['Nome'];
                     $link = $linhas['Link'];
                     $id = $linhas['ID'];


                     echo "

                           <h2 class='page-header'>
                           <a href='$link' > $nome </a>
                           <button class='btn btn-danger' style='float:right' name='removerPageEntidades' type='submit' value='$id'>Remover</button></h2>

                     ";
              }

              echo "

         <h2 class='page-header'><a data-toggle=\"modal\"   data-target=\"#CadastrarPageEntidade\" role=\"button\"  >Adicionar</a></h2>

              ";
              }
              else{

                while($linhas = mysql_fetch_array($query)){

                       $nome = $linhas['Nome'];
                       $link = $linhas['Link'];
                       $id = $linhas['ID'];

                       echo "

                             <h2 class='page-header'>
                             <a href='$link' > $nome </a>
                             </h2>

                       ";
                }
              }


            }
           else{
             while($linhas = mysql_fetch_array($query)){

                    $nome = $linhas['Nome'];
                    $link = $linhas['Link'];
                    $id = $linhas['ID'];

                    echo "

                          <h2 class='page-header'>
                          <a href='$link' > $nome </a>
                          </h2>

                    ";
             }

           }

           }
           else{

                  if(isset($_SESSION['auth'])){

                    if($_SESSION['auth']){

                       echo "

                  <h2 class='page-header'><a  data-toggle=\"modal\"  data-target=\"#CadastrarPageEntidade\" role=\"button\" >Adicionar</a></h2>

                       ";
                     }
                  }



           }
 ?>
