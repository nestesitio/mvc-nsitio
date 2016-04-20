var formcontainer = 0;
var filtercontainer = 0;
$(window).scroll(function () {
    if (formcontainer > 0) {
        var btn = document.getElementsByClassName("btns-form")[0];
        var datawork = getParentByClass(btn, "datawork");
        if (datawork !== null) {
            var pos = $(datawork).offset().top;
            var w = $(document).scrollTop();

            if (w > pos && (w - pos) < (formcontainer - 20)) {
                $(".btns-form").stop().animate({top: (w - pos) + 5}, 10);
            } else if (w <= pos) {
                $(".btns-form").stop().animate({top: "0"}, 10);
            }
        }
    }
    if (filtercontainer > 0) {
        var pos = $(".grid-filters").offset().top;
        var w = $(document).scrollTop();
        if (w > pos && (w - pos) < (filtercontainer - 20)) {
            $(".btns-filter").stop().animate({top: (w - pos) + 5}, 10);
        } else if (w <= pos) {
            $(".btns-filter").stop().animate({top: "0"}, 10);
        }
    }
});

