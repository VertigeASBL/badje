jQuery(document).ready(function($) {
    $(".supprimer").on("click", function () {
        confirm("êtes-vous sur de vouloir supprimer ?");
    });
});