<?php

    /*váriaveis criadas para armazenar informações para acessar
    e se conectar ao banco de dados*/
    $servername = "localhost";
    $username = "root";
    $password = "5566710";
    $dbname = "bd_teste";

     /*$conn para armazernar a ação de criar uma conexão mysql com os dados
    fornecidos pelas variáveis acima, com as informações para realizar o acesso
    e a conexão com o banco desejado*/
    $conn = new mysqli($servername, $username, $password, $dbname);

    /*Verifica se a conexão ao banco de dados foi bem-sucedida, se não for, exibe
    uma mensagem de erro e encerra o script*/
    if ($conn->connect_error) {
        die ("Falha na conexão: ".$conn->connect_error);
    }

    /*Variáveis criadas para receber e armazenar os valores enviados pelo formulário
    de cadastro via método POST*/
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

     /*Variável com uma consulta SQL criada para inserir novos registros na tabela desejada
     dentro do banco de dados*/
    $sql = "INSERT INTO teste_usuarios (nome, sobrenome, login, senha) VALUES ('$nome','$sobrenome','$login','$senha')";
    
    /*Executa a consulta SQL e emite um feedback para o usuário, se foi realizado com sucesso
    ou foi falho*/
    if ($conn->query($sql) === TRUE ) {
        echo "Cadastro realizado com sucesso, <a href=login.html>iniciar sessão agora.</a>";
    } else {
        echo "Erro ao cadastrar: ".$conn->error;
    }

    //Fecha a conexão com o banco de dados quando a operação é concluída
    $conn->close();
?>