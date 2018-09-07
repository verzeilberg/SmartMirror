
/*
 * 
 * Call functions on page load ready
 */
$(document).ready(function () {
    getWeatherData();
    setInterval(function(){ getWeatherData();}, 60000);
});
/*
 * Ajax call to get current weather
 */
function getWeatherData() {
    $.ajax({
        url: "/weather/get-weather-data",
        async: true,
        success: function (data) {
            if (data.succes === true) {
                var sunsetrise;
                sunsetrise = '<i class="wi wi-sunrise"></i> ' + data.weatherData.sunRise + ' ';
                sunsetrise += '<i class="wi wi-sunset"></i> ' + data.weatherData.sunSet;
                $('span.sunsetrise').html(sunsetrise);
                var tempwind;
                tempwind = '<i class="wi ' + data.weatherData.icon + '"></i> ' + data.weatherData.temp + '<i class="wi wi-celsius"></i> ';
                tempwind += '<i class="wi wi-strong-wind"></i> ' + data.weatherData.windSpeed;
                $('span.temp-wind').html(tempwind);
                var forecast;
                $.each(data.weatherForecastData, function( date, value ) {
                   forecast += '<tr>'; 
                   forecast += '<td width="33%">'+moment(date).format("dd")+'</td>';
                   forecast += '<td width="33%"><i class="wi '+value.icon+'"></i></td>';
                   forecast += '<td width="33%">'+value.temp+'<i class="wi wi-celsius"></i></td>';
                   forecast += '</tr>'; 
                });
                $('table#foreCastTable').html(forecast);
            }
        }
    });
}