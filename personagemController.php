<?php

require_once "models/Personagem.php";

class PersonagemController
{
    public $model;

    public function __construct()
    {
        $this->model = new Personagem();
    }

    public function listar($busca = "")
    {
        return $this->model->listar($busca);
    }

    public function buscarPorId($id)
    {
        return $this->model->buscarPorId($id);
    }

    public function cadastrar()
    {
        if (isset($_POST["nome"])) {
            $nome = $_POST["nome"];
            $universo = $_POST["universo"];
            $poder = $_POST["poder"];

            if ($nome == "" || $universo == "" || $poder == "") {
                return "Preencha todos os campos.";
            }

            $this->model->cadastrar($nome, $universo, $poder);

            header("Location: index.php");
            exit;
        }

        return "";
    }

    public function editar()
    {
        if (isset($_POST["nome"])) {
            $this->model->editar(
                $_POST["id"],
                $_POST["nome"],
                $_POST["universo"],
                $_POST["poder"]
            );

            header("Location: index.php");
            exit;
        }

        return "";
    }

    public function excluir()
    {
        if (isset($_POST["id"])) {
            $this->model->excluir($_POST["id"]);
        }

        header("Location: index.php");
        exit;
    }
}