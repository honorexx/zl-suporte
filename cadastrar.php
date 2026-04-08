<?php
include("config/conexao.php");

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$telefone = trim($_POST['telefone']);
$cargo = trim($_POST['cargo']);
$turno = trim($_POST['turno']);
$status = trim($_POST['status']);

if (empty($nome) || empty($email) || empty($telefone) || empty($cargo) || empty($turno) || empty($status)) {
    die("Todos os campos são obrigatórios.");
}

$sql = "INSERT INTO equipe_suporte (nome, email, telefone, cargo, turno, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nome, $email, $telefone, $cargo, $turno, $status);

if ($stmt->execute()) {
    header("Location: listar.php");
    exit();
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>