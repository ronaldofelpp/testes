<?php
    /*função para iniciar uma sessão php, permitindo o uso de variáveis de sessão,
    que funcionam em diversas páginas diferentes*/
    session_start();

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
    de login via método POST*/
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    /*Variável com uma consulta SQL criada para verificar se o login e senha correspondem
    a um registro no banco de dados*/
    $sql = "SELECT id, nome, sobrenome FROM teste_usuarios WHERE login = '$login' AND senha = '$senha'";
    
    /*Executa a consulta SQL e armazena o resultado na variável $result*/
    $result = $conn->query($sql);

    /*O IF verifica se a consulta retornou pelo emnos uma linha, se retornar
    obviamente seu login foi bem-sucedido*/
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); //<- Obtém os dados do usuário da linha retornada pela consulta
        $_SESSION["id"] = $row["id"];
        $_SESSION["nome"] = $row["nome"]; //<- Armazenam as informações da linha numa váriavel de sessão
        $_SESSION["sobrenome"] = $row["sobrenome"];
        header("location: boas_vindas.php"); //<- Redireciona o usuário para outra página
    } else {
        echo "Login ou senha incorretos, falha na consulta ao banco.<a href='login.html'>Tentar novamente</a>";
    };

    //Fecha a conexão com o banco de dados quando a operação é concluída
    $conn->close();
?>