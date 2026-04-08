<?php
include("config/conexao.php");

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = intval($_GET['id']);

$sql = "DELETE FROM equipe_suporte WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: listar.php");
    exit();
} else {
    echo "Erro ao excluir: " . $conn->error;
}

$stmt->close();
$conn->close();
?>