<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Deletion</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download (1).jpg') no-repeat center center/cover;
            color: #4a4a4a;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            text-align: left;
        }

        select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #46b6ea;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #369dcc98;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Account Deletion Request</h2>
        <p>We're sorry to see you go. Please select a reason for deleting your account, and confirm your request below. Your feedback helps us improve.</p>
        
        <label for="reason">Reason for account deletion:</label>
        <select id="reason">
            <option value="privacy">Privacy concerns</option>
            <option value="inactive">Not using the service</option>
            <option value="better_alternatives">Found better alternatives</option>
            <option value="technical_issues">Technical issues</option>
            <option value="other">Other</option>
        </select>

        <textarea id="additionalComments" placeholder="Please provide additional comments (optional)..."></textarea>
        
        <button onclick="confirmDelete()">Confirm Deletion</button>
    </div>
<script>
    function confirmDelete() {
    var reason = document.getElementById("reason").value;
    var additionalComments = document.getElementById("additionalComments").value;

    if (confirm("Are you sure you want to delete your account? This action is irreversible.")) {
        fetch('api/seldel.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ reason: reason, comments: additionalComments })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                window.location.href = 'logoutsel.php'; // Redirect after deletion
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        alert("Account deletion cancelled.");
    }
}
</script>

</body>
</html>
