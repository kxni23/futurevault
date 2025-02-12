<?php 
include('api/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Settings</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: #4a4a4a;
            line-height: 1.6;
        }

       

        .container {
            max-width: 800px;
            margin: 60px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 30px;
            font-size: 16px;
            color: #555;
        }

        .select-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
        }

        select {
            width: 60%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            margin-bottom: 20px;
        }

        button {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #357ab7;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #4caf50;
            display: none;
        }
        .footer{
            position:relative;
            top:145px;
            bottom:0px;
        }
    </style>
</head>
<?php include('header.php')?>
<body>
    <div class="container">
        <h1>Language Settings</h1>
        <p>Select your preferred language for the Future Vault platform.</p>
        <div class="select-container">
            <label for="languageSelect">Choose Language:</label>
            <select id="languageSelect">
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
                <option value="de">German</option>
                <option value="it">Italian</option>
                <option value="pt">Portuguese</option>
                <option value="ru">Russian</option>
                <option value="zh">Chinese</option>
                <option value="ja">Japanese</option>
                <option value="ar">Arabic</option>
            </select>
            <button onclick="saveLanguage()">Save Preferences</button>
        </div>
        <div id="message" class="message">Your language preference has been saved!</div>
    </div>

    <script>
        function saveLanguage() {
            const selectedLanguage = document.getElementById('languageSelect').value;

            // Show confirmation message
            const messageElement = document.getElementById('message');
            messageElement.style.display = 'block';
            messageElement.textContent = `Language preference set to: ${document.querySelector("#languageSelect option:checked").textContent}`;

            // Here, add logic to save the preference (e.g., localStorage, API call)
        }
    </script>
     <script>
        function toggleMenu() {
            var menu = document.getElementById("profile-menu");
            menu.classList.toggle("show-menu");
        }
    </script>
</body>
<?php include('footer.php')?>
</html>
