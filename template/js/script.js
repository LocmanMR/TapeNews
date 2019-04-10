$(document).ready(function () {
    var inProgress = false;
    var startForm = 10;

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() && !inProgress) {
            $.ajax({
                url: 'obr.php',
                method: 'POST',
                data: {"startForm": startForm},
                beforeSend: function () {
                    inProgress = true;
                }
            }).done(function (data) {
                data = jQuery.parseJSON(data);
                if (data.lenght > 0) {
                    $.each(data, function (index, data) {
                        $("#content").append("<p><b>" + data.title + "</b><br/>" + data.content + "</b><br/> "+ data.date +"</b><br/> " + data.tags + "</p>" );
                    });
                    inProgress = false;

                    startForm += 10;
                }
            });
        }
    });
});