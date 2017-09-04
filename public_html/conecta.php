<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'db_ccecomp';
    
    $conexao = mysqli_connect($host, $user, $pass, $database);

    if(!$conexao){
        echo '
        <script>
            alert("Erro na conexão");
        </script>
        ';
    }
    else{
        echo '
        <script>
            alert("Conexão efetuada com sucesso!");
        </script>
        ';
    }
?>