<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados pelo formulário
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $endereco = htmlspecialchars($_POST['endereco'] ?? '');
    $cidade = htmlspecialchars($_POST['cidade'] ?? '');
    $estado = htmlspecialchars($_POST['estado'] ?? '');
    $cep = htmlspecialchars($_POST['cep'] ?? '');
    $telefone = htmlspecialchars($_POST['telefone'] ?? '');
    $produto = htmlspecialchars($_POST['produto'] ?? '');
    $quantidade = htmlspecialchars($_POST['quantidade'] ?? '');
    $preco = htmlspecialchars($_POST['preco'] ?? '');

    // Validação básica
    if (empty($nome) || empty($endereco) || empty($cidade) || empty($estado) || empty($cep) || empty($telefone) || empty($produto) || empty($quantidade) || empty($preco)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit;
    }

    // Calcula o valor total da compra
    $total = $quantidade * $preco;

    // Exibe a confirmação da compra
    echo "<h1>Compra realizada com sucesso!</h1>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Endereço:</strong> $endereco, $cidade - $estado, CEP: $cep</p>";
    echo "<p><strong>Telefone:</strong> $telefone</p>";
    echo "<p><strong>Produto:</strong> $produto</p>";
    echo "<p><strong>Quantidade:</strong> $quantidade</p>";
    echo "<p><strong>Preço unitário:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";
    echo "<p><strong>Total:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>";
} else {
    // Caso o acesso não seja via POST, exibe uma mensagem de erro
    echo "Método de requisição inválido.";
}
?>