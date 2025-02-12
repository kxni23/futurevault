<!DOCTYPE html>
<html lang="en">
<?php
$id = 1;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="#" class="btn btn-success me-2 approve-btn" data-id="<?php echo $id; ?>">Approve</a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.approve-btn').on('click', function(event) {
                event.preventDefault();
                let userId = $(this).data('id');
                updateUserStatus(userId, "New content");
            });
        });
    </script>

    <!-- Ajax In JSON Format -->
    <!-- <script>
        function updateUserStatus(userId, action) {
            let data = {
                id: userId,
                status: action
            };

            // Check if data has values
            if (!data.id || !data.status) {
                alert('Data is missing: ' + JSON.stringify(data));
                return; // Exit the function if data is incomplete
            } else {
                console.log('Data passed:', data); // Log data to the console for debugging
            }
            
            $.ajax({
                url: '../api_notes/update.php', // Change to your API URL
                method: 'POST',
                data: JSON.stringify({
                    id: userId,
                    status: action
                }),
                contentType: 'application/json',
                success: function(response) {
                    if (response.status === 200) {
                        alert(response.message); // Success message
                        // Optionally, you can refresh the list or hide the updated entry
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        alert(response.message); // Error or failure message
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Something went wrong while updating user status.');
                }
            });
        }
    </script> -->

    <!-- Ajax In REQUEST Format -->
    <script>
        function updateUserStatus(userId, action) {
            let formData = new FormData();
            formData.append('id', userId);
            formData.append('status', action);

            $.ajax({
                url: '../api_notes/update.php', // Your PHP API URL
                method: 'POST',
                data: formData,
                processData: false, // Prevent automatic data processing
                contentType: false, // Let the browser set the content type
                success: function(response) {
                    if (response.status === 200) {
                        alert(response.message); // Display success message
                        location.reload(); // Reload page to reflect changes
                    } else {
                        alert('Error: ' + response.message); // Display server-side error message
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error details:', xhr.responseText); // Log error for debugging
                    alert(error); // Display generic error
                }
            });
        }
    </script>
</body>

</html>