<!DOCTYPE html>
<html>
<head>
    <title>Online Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        #result {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
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

        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
                $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

                // Escape data to prevent XSS attacks
                $escapedName = htmlspecialchars($name);
                $escapedEmail = htmlspecialchars($email);
                $escapedPhone = htmlspecialchars($phone);
                $escapedMessage = htmlspecialchars($message);

                echo "<h2>Your Information</h2>";
                echo "<p><strong>Name:</strong> " . $escapedName . "</p>";
                echo "<p><strong>Email:</strong> " . $escapedEmail . "</p>";
                echo "<p><strong>Phone:</strong> " . $escapedPhone . "</p>";
                echo "<p><strong>Message:</strong> " . $escapedMessage . "</p>";
            }
            ?>
        </div>
    </div>

    <script>
        document.getElementById("applicationForm").addEventListener("submit", function (event) {
            // Prevent default form submission
            event.preventDefault();

            const formData = new FormData(this);

            fetch("http://localhost:3000", {
                method: "POST",
                body: formData,
            })
                .then((response) => response.text())
                .then((data) => {
                    const resultDiv = document.getElementById("result");
                    resultDiv.innerHTML = data;
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("An error occurred while submitting the form.");
                });
        });
    </script>
</body>
</html>
