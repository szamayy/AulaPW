<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeekVerse - Personagens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>⚡ GeekVerse</h1>
    <p>Seu catálogo de personagens favoritos</p>
</header>

<main class="container">

    <h2>Catálogo de personagens</h2>

    <a class="botao" href="index.php?acao=cadastrar">
        + Cadastrar personagem
    </a>

    <form class="pesquisa" method="GET" action="index.php">
        <input
            type="text"
            name="busca"
            placeholder="Pesquisar nome, universo ou poder..."
            value="<?php echo htmlspecialchars($busca); ?>"
        >

        <button type="submit">Pesquisar</button>

        <a class="botao secundario" href="index.php">Limpar</a>
    </form>

    <?php if (count($personagens) == 0) { ?>

        <p class="vazio">Nenhum personagem encontrado.</p>

    <?php } else { ?>

        <div class="tabela-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Universo</th>
                    <th>Poder</th>
                    <th>Ações</th>
                </tr>

                <?php foreach ($personagens as $personagem) { ?>
                    <tr>
                        <td><?php echo $personagem["id"]; ?></td>

                        <td>
                            <?php echo htmlspecialchars($personagem["nome"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($personagem["universo"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($personagem["poder"]); ?>
                        </td>

                        <td class="acoes">
                            <a
                                class="botao editar"
                                href="index.php?acao=editar&id=<?php echo $personagem["id"]; ?>"
                            >Editar</a>

                            <form
                                method="POST"
                                action="index.php?acao=excluir"
                                onsubmit="return confirm('Deseja excluir este personagem?');"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?php echo $personagem["id"]; ?>"
                                >

                                <button class="botao excluir" type="submit">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    <?php } ?>

</main>

<footer>
    Projeto MVC de personagens • PHP e MySQL
</footer>

</body>
</html>