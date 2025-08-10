<!DOCTYPE html>
<html>
<head>
    <title>Online Application Form</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Online Application Form</h2>
        <form id="applicationForm" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>

            <input type="submit" value="Submit">
        </form>

        <div id="result"></div>
    </div>

    <script>
        // JavaScript/jQuery code (consider including in a separate file for better separation)
        $(document).ready(function() {
            $("#applicationForm").submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "", // Assuming this script is the processing script
                    data: formData,
                    success: function(response) {
                        $("#result").html(response);
                    }
                });
            });
        });
    </script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); // Sanitize user input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // Sanitize user input
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING); // Sanitize user input
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING); // Sanitize user input

    // Validate and potentially store data in a database or send an email here
    // For now, let's just display it on the page in a secure way:

    // Escape data to prevent XSS attacks
    $escapedName = htmlspecialchars($name);
    $escapedEmail = htmlspecialchars($email);
    $escapedPhone = htmlspecialchars($phone);
    $escapedMessage = htmlspecialchars($message);

    echo "<h2>Your Information</h2>";
    echo "<p>Name: " . $escapedName . "</p>";
    echo "<p>Email: " . $escapedEmail . "</p>";
    echo "<p>Phone: " . $escapedPhone . "</p>";
    echo "<p>Message: " . $escapedMessage . "</p>";
}
?>
</body>
</html>