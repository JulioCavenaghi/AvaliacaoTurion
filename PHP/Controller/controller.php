<?php
require_once('/xampp/htdocs/Turion/PHP/Function/Util.php');
require_once('/xampp/htdocs/Turion/PHP/Model/modelProduto.php');

if (isset($_POST['opcao'])) {
    $opcao = $_POST['opcao'];
    $dados = isset($_POST['dados']) ? $_POST['dados'] : '';

    switch ($opcao) {
        case 'visualizar':
            $model = new modelProduto();
            $response = $model ->visualizarProdutos();
            break;
        case 'tipo':
            $model = new modelProduto();
            $response = $model ->visualizarTipos();
            break;
        case 'inserir':
            $model = new modelProduto();
            $response = $model ->inserirProduto($dados);
            break;
        case 'excluir':
            $model = new modelProduto();
            $response = $model ->excluirProduto($dados);
            break;
        case 'visualizarId':
            $model = new modelProduto();
            $response = $model ->visualizarProdutoId($dados);
            break;
        case 'alterar':
            $model = new modelProduto();
            $response = $model ->alterarProduto($dados);
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = ['status' => 'error', 'message' => 'Nenhuma opção fornecida.'];
    header('Content-Type: application/json');
    echo json_encode($response);
}