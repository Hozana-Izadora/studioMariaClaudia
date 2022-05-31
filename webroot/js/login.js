$(document).ready(function () {
    $("#btn-senha").click(function () {
        if ($(this).attr("class") == "fa fa-eye-slash") {
            $("i").removeClass("fa-eye-slash");
            $("i").addClass("fa-eye");
            $("#password").prop("type", "text");
        } else {
            $("i").removeClass("fa-eye");
            $("i").addClass("fa-eye-slash");
            $("#password").prop("type", "password");
        }
    });
});
