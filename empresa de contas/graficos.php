<?php
session_start();

if (!empty($_SESSION['id_usuario'])) {
    // O login foi feito, permanece na página
} else {
    // Redireciona para a página de login se não estiver logado
    header("Location: index.php");
    exit();
}
//session_unset();
include_once ('controller/controller_conta.php');
$contas = controller_conta::Get_contas("receita");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rota Financeira</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/padrao.css">
    <link rel="stylesheet" href="css/extrato.css">
</head>

<body>
    <header>
        <img src="ROTA financeira.png" alt="" id="logo">
        <div class="icones">
            <a href="receitas.php"><i class="material-icons">&#xe88a;</i></a>
            <a href="graficos.php"><i class="material-icons">&#xe01d;</i></a>
            <form action="index.php" method="post" class="sair">
                <button type="submit">
                    <i class="material-icons">&#xe879;</i>
                </button>
            </form>
        </div>
    </header>

    <?php include_once ('includes/extrato.php'); ?>
    <?php include_once ('includes/grafico.php') ?>
    
</body>

</html>
