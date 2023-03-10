<?php
function getPostcode($postcode)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    $data = [
        "codes" => $postcode
    ];

    curl_setopt($ch, CURLOPT_URL, "https://app.zipcodebase.com/api/v1/search?" . http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "apikey: de707090-be5f-11ed-8d52-e90b7cbee7c0",
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response, true);
    $return_value = $json["results"][$postcode]["0"];
    return json_encode($return_value);
}

function getWeather(){
    $api_key = "af8a63d35394f3eae7c96f34014651ff";
    $get_coord_json = file_get_contents("https://api.openweathermap.org/geo/1.0/zip?zip=E14,GB&appid={".$api_key."}");
    echo $get_coord_json;
}

if (isset($_GET["postcode"])) {
    echo getPostcode($_GET["postcode"]);
}

if(isset($_GET["weather"])){
    echo getWeather($_GET["weather"]);
}