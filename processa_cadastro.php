<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
// Conexão com o banco de dados
$servername = "localhost"; // ou o endereço do seu servidor
$username = "root"; // seu usuário do MySQL
$password = "&tec77@info!"; // sua senha do MySQL
$dbname = "db_quiz";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

// Validação de dados
if (empty($nome) || empty($email) || empty($senha)) {
    die("Todos os campos são obrigatórios.");
}

if (!preg_match("/^[a-zA-Z\s]+$/", $nome)) {
    die("O nome deve conter apenas letras e espaços.");
}

// Verificar se o email já existe
$sql = "SELECT * FROM db_quiz.tbl_usuario WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die("Este email já está cadastrado.");
}

// Criptografar a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Inserir novo usuário
$sql = "INSERT INTO db_quiz.tbl_usuario (nome_usuario, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $senha_hash);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
    echo '<img src="fro.jpg" alt="Sucesso" />';
} else {
    echo "Erro: " . $stmt->error;
    echo '<img src="caminho/para/erro.png" alt="Erro" />';
}
// Fechar conexão
$stmt->close();
$conn->close();
?>
</body>
</html>