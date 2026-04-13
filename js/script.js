document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formCadastro");

    if (!form) {
        console.error("Formulário não encontrado.");
        return;
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const dados = new FormData(form);

        fetch("cadastrar.php", {
            method: "POST",
            body: dados
        })
        .then(function (res) {
            return res.json();
        })
        .then(function (data) {
            if (data.status === "sucesso") {
                alert(data.mensagem);
                form.reset();
                window.location.href = "listar.php";
            } else {
                alert(data.mensagem);
            }
        })
        .catch(function (erro) {
            console.error("Erro:", erro);
            alert("Erro ao enviar os dados.");
        });
    });
});