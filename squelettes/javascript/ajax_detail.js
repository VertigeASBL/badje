jQuery(document).ready(function($) {
    $("a.plus_detail").on('click', function () {
        $("#sidebar-recherche").animateLoading();
        $.get("spip.php?page=squelettes/inclure/recherche-sidebar", 
            {
                id_activite: $(this).data("id_activite")
            }).done(function (data) {
                $("#sidebar-recherche").html(data).endLoading();
            });
        return false;
    });
});