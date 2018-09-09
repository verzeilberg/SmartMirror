moment.locale('nl');
var datetime = null,
        date = null
        time = null;

var update = function () {
    date = moment(new Date())
    datetime.html(date.format('dddd, D MMMM YYYY'));
    time.html(date.format('HH:mm:ss'));
};

$(document).ready(function () {
    datetime = $('.date');
    time = $('.time');
    update();
    setInterval(update, 1000);
});