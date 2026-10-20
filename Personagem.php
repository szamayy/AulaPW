
<?php

require_once "config/conexao.php";

class Personagem
{
    public function listar($busca = "")
    {
        global $conn;

        $sql = "SELECT * FROM personagens
                WHERE nome LIKE '%$busca%'
                OR universo LIKE '%$busca%'
                OR poder LIKE '%$busca%'";

        $resultado = mysqli_query($conn, $sql);

        $personagens = [];

        while ($linha = mysqli_fetch_assoc($resultado)) {
            $personagens[] = $linha;
        }

        return $personagens;
    }

    public function buscarPorId($id)
    {
        global $conn;

        $resultado = mysqli_query($conn, "SELECT * FROM personagens WHERE id = $id");

        return mysqli_fetch_assoc($resultado);
    }

    public function cadastrar($nome, $universo, $poder)
    {
        global $conn;

        $sql = "INSERT INTO personagens (nome, universo, poder)
                VALUES ('$nome', '$universo', '$poder')";

        return mysqli_query($conn, $sql);
    }

    public function editar($id, $nome, $universo, $poder)
    {
        global $conn;

        $sql = "UPDATE personagens
                SET nome = '$nome', universo = '$universo', poder = '$poder'
                WHERE id = $id";

        return mysqli_query($conn, $sql);
    }

    public function excluir($id)
    {
        global $conn;

        return mysqli_query($conn, "DELETE FROM personagens WHERE id = $id");
    }
}
