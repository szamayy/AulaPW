<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar personagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>⚡ GeekVerse</h1>
    <p>Atualize os dados do personagem</p>
</header>

<main class="container formulario">

    <h2>Editar personagem</h2>

    <?php if ($mensagem != "") { ?>
        <p class="mensagem">
            <?php echo htmlspecialchars($mensagem); ?>
        </p>
    <?php } ?>

    <form method="POST" action="index.php?acao=editar">

        <input
            type="hidden"
            name="id"
            value="<?php echo $personagem["id"]; ?>"
        >

        <label for="nome">Nome:</label>
        <input
            id="nome"
            type="text"
            name="nome"
            maxlength="100"
            value="<?php echo htmlspecialchars($personagem["nome"]); ?>"
            required
        >

        <label for="universo">Universo:</label>
        <input
            id="universo"
            type="text"
            name="universo"
            maxlength="100"
            value="<?php echo htmlspecialchars($personagem["universo"]); ?>"
            required
        >

        <label for="poder">Poder:</label>
        <input
            id="poder"
            type="text"
            name="poder"
            maxlength="100"
            value="<?php echo htmlspecialchars($personagem["poder"]); ?>"
            required
        >

        <button type="submit">Salvar alterações</button>

    </form>

    <a class="voltar" href="index.php">← Voltar para a lista</a>

</main>

<footer>
    Projeto MVC de personagens • PHP e MySQL
</footer>

</body>
</html>