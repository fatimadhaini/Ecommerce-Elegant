<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Encoding Form</title>
</head>
<body>
    <h2>Enter Details</h2>
    <form id="myForm">
        <label for="firstName">First Name:</label><br>
        <input type="text" id="firstName" name="firstName"><br><br>
        
        <label for="lastName">Last Name:</label><br>
        <input type="text" id="lastName" name="lastName"><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        
        <button type="button" onclick="encodeJson()">Encode to JSON</button>
    </form>

    <h2>Encoded JSON</h2>
    <pre id="encodedJson"></pre>

    <script>
        function encodeJson() {
            // Fetching form data
            const formData = new FormData(document.getElementById('myForm'));
            const jsonData = {};
            
            // Converting FormData to JSON
            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            // Displaying JSON
            document.getElementById('encodedJson').textContent = JSON.stringify(jsonData, null, 2);
        }
    </script>
</body>
</html>
