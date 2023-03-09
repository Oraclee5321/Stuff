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
    </body>
    <script type="text/javascript">
        function getPostcode() {
            console.log("AYYY")
            var postcode = document.querySelector("input[name=postcode]").value;
            var city = document.querySelector("input[name=city]");
            var xhttp = new XMLHttpRequest();
            //get the city value from functions.php file using the getPostcode function
            xhttp.open("GET", "functions.php?postcode=" + postcode, true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    city.value = this.responseText;
                }
            }


        };
    </script>
</html>
