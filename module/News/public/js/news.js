$(document).ready(function () {
    getNewsData();
    setInterval(function () {
        getNewsData(1);
    }, 100000);
});

/*
 * Ajax call to get current news from news feeds as set in config
 */
function getNewsData(destroy) {
    $.ajax({
        url: "/news/get-news-data",
        async: true,
        success: function (data) {
            console.log('refresh');
            var ulList = '';
            if (data.succes === true) {
                $.each(data.newsData, function (source, value) {
                    ulList += '<div>' + value.title + '</div>';
                });
                if(destroy == 1){
                    $('#newsData').slick('unslick');
                }
                $("div#newsData").empty();
                $('div#newsData').append(ulList);
                $('#newsData').slick({
                    infinite: true,
                    dots: false,
                    speed: 300,
                    slidesToShow: 1,
                    vertical: true,
                    autoplay: true,
                    autoplaySpeed: 4000
                });  
            }

        }
    });


}