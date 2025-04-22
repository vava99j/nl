<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nomeProduto = htmlspecialchars($_POST['nome_produto']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $preco = htmlspecialchars($_POST['preco']);

    // Verifica se uma imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem = $_FILES['imagem'];
        $nomeImagem = uniqid() . '-' . $imagem['name'];
        $caminhoImagem = 'uploads/' . $nomeImagem;

        // Move a imagem para a pasta "uploads"
        if (move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
            // Aqui você pode salvar os dados no banco de dados
            // Exemplo de conexão com banco de dados (MySQL):
            /*
            $conn = new mysqli('localhost', 'usuario', 'senha', 'banco');
            if ($conn->connect_error) {
                die('Erro na conexão: ' . $conn->connect_error);
            }
            $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES ('$nomeProduto', '$descricao', '$preco', '$caminhoImagem')";
            if ($conn->query($sql) === TRUE) {
                echo 'Produto cadastrado com sucesso!';
            } else {
                echo 'Erro ao cadastrar produto: ' . $conn->error;
            }
            $conn->close();
            */
            echo 'Produto cadastrado com sucesso!<br>';
            echo 'Nome: ' . $nomeProduto . '<br>';
            echo 'Descrição: ' . $descricao . '<br>';
            echo 'Preço: R$ ' . $preco . '<br>';
            echo '<img src="' . $caminhoImagem . '" alt="Imagem do Produto" width="200">';
        } else {
            echo 'Erro ao salvar a imagem.';
        }
    } else {
        echo 'Erro ao enviar a imagem.';
    }
} else {
    echo 'Método de requisição inválido.';
}
?>