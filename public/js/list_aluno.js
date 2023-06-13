$(document).ready(function ($) {
    base_url = window.location.origin;
    var table = $("#alunos").DataTable({
        ajax: base_url + "/Aluno/show",
        serverSide: true,
        responsive: true,
        processing: true,
        searching: true,
        order: [1, "ASC"],
        columns: [
            { width: "5%", data: "id", name: "id" },
            { width: "25%", data: "nome", name: "nome" },
            { width: "15%", data: "cpf", name: "cpf" },
            { width: "15%", data: "email", name: "email" },
            { width: "15%", data: "telefone", name: "telefone" },
            { width: "10%", data: "nascimento", name: "nascimento" },
            { width: "15%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".btnExcluir", function () {
        id = $(this).data("id");
        console.log(id);
        $.ajax({
            type: "delete",
            url: base_url + "/Aluno/" + id,
            dataType: "json",
            crossDomain: true,
            contentType: "application/json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                location.reload();
            },
            error: function () {
                //alert("Não foi possível excluir!");
                location.reload();
            },
        });
    });
});
