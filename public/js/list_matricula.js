$(document).ready(function ($) {
    base_url = window.location.origin;
    var table = $("#matriculas").DataTable({
        ajax: base_url + "/Matricula/show",
        serverSide: true,
        responsive: true,
        processing: true,
        searching: true,
        order: [0, "ASC"],
        columns: [
            { width: "10%", data: "id", name: "id" },
            { width: "40%", data: "curso", name: "curso" }, //nome Curso
            { width: "35%", data: "aluno", name: "aluno" }, //nome Aluno
            { width: "15%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".btnExcluir", function () {
        id = $(this).data("id");
        console.log(id);
        $.ajax({
            type: "delete",
            url: base_url + "/Matricula/" + id,
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
