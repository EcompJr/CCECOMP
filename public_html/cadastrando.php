<?php
    
    include_once ('conecta.php');

    $cpf=$_GET['cpf'];
    $nome=$_GET['nome'];
    $email=$_GET['email'];
    $senha=$_GET['senha'];
    $tipo=$_GET['tipo'];
    $telefone=$_GET['telefone'];
    $endereco=$_GET['endereco'];

    $sql = "insert into user (cpf, nome, email, senha, tipo, telefone, endereco) values
    ('$cpf', '$nome', '$email, '$senha', '$tipo', '$telefone', '$endereco')";
    $salvar = mysqli_query($conexao, $sql);

    if ($conexao->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }
   
    mysqli_close($conexao);
?>
