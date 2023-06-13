$(document).ready(function ($) {
    base_url = window.location.origin;
    var table = $("#cursos").DataTable({
        ajax: base_url + "/Curso/show",
        serverSide: true,
        responsive: true,
        processing: true,
        searching: true,
        order: [1, "ASC"],
        columns: [
            { width: "10%", data: "id", name: "id" },
            { width: "65%", data: "nome", name: "nome" },
            { width: "10%", data: "cargaHoraria", name: "cargaHoraria" },
            { width: "15%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".btnExcluir", function () {
        id = $(this).data("id");
        console.log(id);
        $.ajax({
            type: "delete",
            url: base_url + "/Curso/" + id,
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
