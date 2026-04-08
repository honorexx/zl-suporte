<?php
include("config/conexao.php");

if (isset($_POST['atualizar'])) {
    $id = intval($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $cargo = trim($_POST['cargo']);
    $turno = trim($_POST['turno']);
    $status = trim($_POST['status']);

    $sql = "UPDATE equipe_suporte SET nome = ?, email = ?, telefone = ?, cargo = ?, turno = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nome, $email, $telefone, $cargo, $turno, $status, $id);

    if ($stmt->execute()) {
        header("Location: listar.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }

    $stmt->close();
}

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM equipe_suporte WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dados = $result->fetch_assoc();

if (!$dados) {
    die("Registro não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Editar Cadastro</h1>
    <p class="subtitulo">Atualize as informações do membro da equipe</p>

    <form method="POST" class="form-card">
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nome']); ?>" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($dados['email']); ?>" required>

        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($dados['telefone']); ?>" required>

        <label for="cargo">Cargo</label>
        <select id="cargo" name="cargo" required>
            <option value="Analista" <?php if ($dados['cargo'] == 'Analista') echo 'selected'; ?>>Analista</option>
            <option value="Suporte" <?php if ($dados['cargo'] == 'Suporte') echo 'selected'; ?>>Suporte</option>
            <option value="Supervisor" <?php if ($dados['cargo'] == 'Supervisor') echo 'selected'; ?>>Supervisor</option>
            <option value="Administrador" <?php if ($dados['cargo'] == 'Administrador') echo 'selected'; ?>>Administrador</option>
        </select>

        <label for="turno">Turno</label>
        <select id="turno" name="turno" required>
            <option value="Manhã" <?php if ($dados['turno'] == 'Manhã') echo 'selected'; ?>>Manhã</option>
            <option value="Tarde" <?php if ($dados['turno'] == 'Tarde') echo 'selected'; ?>>Tarde</option>
            <option value="Noite" <?php if ($dados['turno'] == 'Noite') echo 'selected'; ?>>Noite</option>
            <option value="Integral" <?php if ($dados['turno'] == 'Integral') echo 'selected'; ?>>Integral</option>
        </select>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="Ativo" <?php if ($dados['status'] == 'Ativo') echo 'selected'; ?>>Ativo</option>
            <option value="Inativo" <?php if ($dados['status'] == 'Inativo') echo 'selected'; ?>>Inativo</option>
        </select>

        <button type="submit" name="atualizar">Salvar alterações</button>
    </form>

    <div class="acoes">
        <a class="btn-link" href="listar.php">Voltar para listagem</a>
    </div>
</div>

</body>
</html>