$(document).ready(function () {
    getNewsData();
    setInterval(function(){ getNewsData();}, 30000);
});

/*
 * Ajax call to get current news from news feeds as set in config
 */
function getNewsData() {
    $.ajax({
        url: "/news/get-news-data",
        async: true,
        success: function (data) {
            console.log(data);
            $("ul#newsData").empty();
            if (data.succes === true) {
                $.each(data.newsData, function (source, value) {
                    $('ul#newsData').append('<li>' + value.title + '</li>');
                });
            }

            $(".textSlider").scrollText({
                'duration': 8000
            });
        }
    });
}