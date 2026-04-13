<?php
include("config/conexao.php");

$sql = "SELECT * FROM equipe_suporte ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe Cadastrada</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Equipe de Suporte Cadastrada</h1>
    <p class="subtitulo">Visualização dos membros registrados no sistema</p>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Cargo</th>
                    <th>Turno</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo htmlspecialchars($row["nome"]); ?></td>
                            <td><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td><?php echo htmlspecialchars($row["telefone"]); ?></td>
                            <td><?php echo htmlspecialchars($row["cargo"]); ?></td>
                            <td><?php echo htmlspecialchars($row["turno"]); ?></td>
                            <td><?php echo htmlspecialchars($row["status"]); ?></td>
                            <td>
                                <a class="acao editar" href="editar.php?id=<?php echo $row["id"]; ?>">Editar</a>
                                <a class="acao excluir" href="excluir.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Deseja excluir este registro?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="acoes">
        <a class="btn-link" href="index.php">Novo cadastro</a>
    </div>
</div>

</body>
</html>