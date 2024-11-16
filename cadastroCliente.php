<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];
    $sexo = $_POST['sexo'];
    $estadoCivil = $_POST['estado-civil'];
    $cep = $_POST['cep'];
    $tipoLogradouro = $_POST['tipo-de-logradouro'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $interesses = isset($_POST['interesses']) ? $_POST['interesses'] : [];
    $informacoesComplementares = $_POST['informacoes-complementares'];

    // Processar o upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagemNome = $_FILES['imagem']['name'];
        $imagemTmpNome = $_FILES['imagem']['tmp_name'];
        $imagemDestino = 'uploads/' . $imagemNome;

        // Mover o arquivo para o diretório de destino
        if (move_uploaded_file($imagemTmpNome, $imagemDestino)) {
            $imagemEnviada = true;
            echo "Imagem enviada com sucesso: " . $imagemNome . "<br>";
        } else {
            echo "Erro ao enviar a imagem.<br>";
        }
    } else {
        echo "Nenhuma imagem enviada.<br>";
    }

    // Exibir os dados coletados (para fins de teste)
    echo "Nome: " . $nome . "<br>";
    echo "Email: " . $email . "<br>";
    echo "CPF: " . $cpf . "<br>";
    echo "Idade: " . $idade . "<br>";
    echo "Telefone: " . $telefone . "<br>";
    echo "Data de Nascimento: " . $nascimento . "<br>";
    echo "Sexo: " . $sexo . "<br>";
    echo "Estado Civil: " . $estadoCivil . "<br>";
    echo "CEP: " . $cep . "<br>";
    echo "Tipo de Logradouro: " . $tipoLogradouro . "<br>";
    echo "Logradouro: " . $logradouro . "<br>";
    echo "Bairro: " . $bairro . "<br>";
    echo "Cidade: " . $cidade . "<br>";
    echo "Estado: " . $estado . "<br>";
    echo "Interesses: " . implode(", ", $interesses) . "<br>";
    echo "Informações Complementares: " . $informacoesComplementares . "<br>";

    if ($imagemEnviada) {
        echo "<img src='$imagemDestino' alt='Imagem enviada' style='max-width: 300px;'><br>";
    }
}
?>