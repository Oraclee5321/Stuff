<?php
function getWeather(){
    $api_key = "af8a63d35394f3eae7c96f34014651ff";
    $get_coord_json = file_get_contents("https://api.openweathermap.org/geo/1.0/zip?zip=TR96RU,GB&appid=".$api_key."");
    $get_coord_json = json_decode($get_coord_json, true);
    $lat = $get_coord_json["lat"];
    $lon = $get_coord_json["lon"];
    $get_weather_json = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=".$api_key."");
    $get_weather_json = json_decode($get_weather_json, true);
    //get temperature
    $temp = $get_weather_json["main"]["temp"];
    //convert kelvin to celsius
    $temp = $temp - 273.15;
    //round to 1 decimal place
    $temp = round($temp, 1);
    //get weather description
    $description = $get_weather_json["weather"]["0"]["description"];
    //get wind speed
    $wind = $get_weather_json["wind"]["speed"];
    //get humidity
    $humidity = $get_weather_json["main"]["humidity"];
    //get pressure
    $pressure = $get_weather_json["main"]["pressure"];
    //get sunrise
    $sunrise = $get_weather_json["sys"]["sunrise"];
    //get sunset
    $sunset = $get_weather_json["sys"]["sunset"];
    //get timezone
    $timezone = $get_weather_json["timezone"];
    //get city name
    $city = $get_weather_json["name"];
    //present data
    echo "The weather in ".$city." is ".$description." with a temperature of ".$temp."°C. The wind speed is ".$wind."m/s and the humidity is ".$humidity."%. The pressure is ".$pressure."hPa. The sunrise is at ".date("H:i", $sunrise + $timezone)." and the sunset is at ".date("H:i", $sunset + $timezone).".";


}
function getAirQuality(){
    $api_key = "af8a63d35394f3eae7c96f34014651ff";
    $get_coord_json = file_get_contents("https://api.openweathermap.org/geo/1.0/zip?zip=TR96RU,GB&appid=".$api_key."");
    $get_coord_json = json_decode($get_coord_json, true);
    $lat = $get_coord_json["lat"];
    $lon = $get_coord_json["lon"];
    $get_air_json = file_get_contents("https://api.openweathermap.org/data/2.5/air_pollution?lat=".$lat."&lon=".$lon."&appid=".$api_key."");
    $get_air_json = json_decode($get_air_json, true);
    //get air quality
    $air_quality = $get_air_json["list"]["0"]["main"]["aqi"];
    //get carbon monoxide
    $co = $get_air_json["list"]["0"]["components"]["co"];
    //get nitrogen dioxide
    $no2 = $get_air_json["list"]["0"]["components"]["no2"];
    //get ozone
    $o3 = $get_air_json["list"]["0"]["components"]["o3"];
    //get sulphur dioxide
    $so2 = $get_air_json["list"]["0"]["components"]["so2"];
    //get pm2.5
    $pm2_5 = $get_air_json["list"]["0"]["components"]["pm2_5"];
    //get pm10
    $pm10 = $get_air_json["list"]["0"]["components"]["pm10"];
    //get nitrogen monoxide
    $n02 = $get_air_json["list"]["0"]["components"]["no"];
    //present data
    echo "The air quality is ".$air_quality.".";
    //echo out the list of pollutants
    echo "<br>";
    echo "The pollutants are: ";
    echo "<br>";
    echo "Carbon monoxide: ".$co."ppm";
    echo "<br>";
    echo "Nitrogen monoxide: ".$n02."ppm";
    echo "<br>";
    echo "Nitrogen dioxide: ".$no2."ppm";
    echo "<br>";
    echo "Ozone: ".$o3."ppm";
    echo "<br>";
    echo "Sulphur dioxide: ".$so2."ppm";
    echo "<br>";
    echo "PM2.5: ".$pm2_5."µg/m³";
    echo "<br>";
    echo "PM10: ".$pm10."µg/m³";
}
getWeather();
echo "<br>";
getAirQuality();
?>