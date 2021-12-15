$(document).ready(function() {
    
    // Acessibilidade. Tecla de atalho. Alt+#.
    $("#portal-home-link").attr("accesskey", 0);
    $("body").append('<a accesskey=1 href="#header-institucional"></a>');
    $("body").append('<a accesskey=2 href="#footer-institucional"></a>');
    $("#menu-local__form input[type=search]").attr("accesskey", 3);
    $("body").append('<a accesskey=4 href="#content"></a>');
    
    // CorreÃ§Ã£o collapse.se
    // Menu local e pesquisa
    var $btnCollapse = $('[data-toggle="collapse.se"]');
    $btnCollapse.click(function() {
        var $target = $($(this).data("target"));
        if (!$target.hasClass("fixed")) {
            $target.addClass("fixed");
            return;
        }
        $target.toggle();
        if ($(this).attr("aria-expanded") === "true") {
            $(this).attr("aria-expanded", false);
        } else {
            $(this).attr("aria-expanded", true);
        }
    });
    
});
