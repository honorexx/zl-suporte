<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da Equipe de Suporte</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Cadastro da Equipe de Suporte</h1>
    <p class="subtitulo">Sistema para gerenciamento dos membros da equipe do ZL</p>

    <form id="formCadastro" class="form-card">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome completo" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>

        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone" required>

        <label for="cargo">Cargo</label>
        <select id="cargo" name="cargo" required>
            <option value="">Selecione</option>
            <option value="Analista">Analista</option>
            <option value="Suporte">Suporte</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Administrador">Administrador</option>
        </select>

        <label for="turno">Turno</label>
        <select id="turno" name="turno" required>
            <option value="">Selecione</option>
            <option value="Manhã">Manhã</option>
            <option value="Tarde">Tarde</option>
            <option value="Noite">Noite</option>
            <option value="Integral">Integral</option>
        </select>

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="">Selecione</option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>

    <div class="acoes">
        <a class="btn-link" href="listar.php">Ver equipe cadastrada</a>
    </div>
</div>

<script src="./js/script.js"></script>
</body>
</html>