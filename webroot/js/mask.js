$(document).ready(function () {
    $("#cpf").mask("999.999.999-99");
    $("#telefone").mask("(99)99999-9999");

    $("#example").DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json",
        },
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
    });
});
