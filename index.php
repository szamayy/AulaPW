
<?php

require_once "controllers/PersonagemController.php";

$controller = new PersonagemController();

$acao = $_GET["acao"] ?? "listar";
$mensagem = "";

if ($acao == "cadastrar") {
    $mensagem = $controller->cadastrar();
    require "views/cadastrar.php";

} elseif ($acao == "editar") {
    $id = $_GET["id"] ?? $_POST["id"] ?? 0;
    $personagem = $controller->buscarPorId($id);

    if (!$personagem) {
        header("Location: index.php");
        exit;
    }

    $mensagem = $controller->editar();
    require "views/editar.php";

} elseif ($acao == "excluir") {
    $controller->excluir();

} else {
    $busca = $_GET["busca"] ?? "";
    $personagens = $controller->listar($busca);
    require "views/listar.php";
}
