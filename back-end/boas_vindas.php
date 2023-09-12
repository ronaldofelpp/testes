<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo!</title>
</head>
<body>
    <?php

        //inicia uma sessão php para acessar as variáveis de sessão.
        session_start();

        /*Verifica se o usuário NÃO(!) está autenticado, se realmente não estiver
        o usuário será redirecionado novamente para a página de login*/
        if (!isset($_SESSION["id"])) {
            header("location: login.html");
            exit();
        }

        /*Armazenam o nome e o sobrenome do usuário a partir
        das variáveis de sessão*/
        $nome = $_SESSION["nome"];
        $sobrenome = $_SESSION["sobrenome"];
    ?>
    <!--Exibe o nome e o sobrenome do usuário, e mostra um link para encerrar da sessão de usuário-->
    <h2>Seja muito bem-vindo, <?php echo $nome." ".$sobrenome?></h2>
    <a href="encerra_sessao.php">Sair da sessão</a>

</body>
</html>