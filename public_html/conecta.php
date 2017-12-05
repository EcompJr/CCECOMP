<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $userCod = md5($user);
    $passCod = md5($pass);
    $database = 'db_ccecomp';

    $conexao = mysqli_connect($host, $userCod, $passCod, $database);


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
