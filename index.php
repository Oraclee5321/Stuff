<?php



?>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <h1>Test</h1>
        <input type=" text" name="postcode" value="">
        <button type="button" onclick="getPostcode()">Find City</button>
        <input type="text" name="city" value="">
        <input type="text" name="country" value="">
    </body>
    <script type="text/javascript">
        function getPostcode() {
            var postcode = document.querySelector("input[name=postcode]").value;
            var city = document.querySelector("input[name=city]");
            var country = document.querySelector("input[name=country]");
            var xhttp = new XMLHttpRequest();
            //get the city and country value from the functions.php file returns an array
            xhttp.open("GET", "functions.php?postcode=" + postcode, true);
            xhttp.send();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    city.value = response.city;
                    country.value = response.state;
                }
            }
        }


    </script>
</html>
