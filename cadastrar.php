<?php
include("config/conexao.php");

header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Requisição inválida."
    ]);
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$cargo = trim($_POST["cargo"] ?? "");
$turno = trim($_POST["turno"] ?? "");
$status = trim($_POST["status"] ?? "");

if (
    empty($nome) ||
    empty($email) ||
    empty($telefone) ||
    empty($cargo) ||
    empty($turno) ||
    empty($status)
) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Todos os campos são obrigatórios."
    ]);
    exit;
}

$sql = "INSERT INTO equipe_suporte (nome, email, telefone, cargo, turno, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Erro ao preparar a consulta."
    ]);
    exit;
}

$stmt->bind_param("ssssss", $nome, $email, $telefone, $cargo, $turno, $status);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "sucesso",
        "mensagem" => "Cadastro realizado com sucesso!"
    ]);
} else {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Erro ao cadastrar no banco."
    ]);
}

$stmt->close();
$conn->close();
?>