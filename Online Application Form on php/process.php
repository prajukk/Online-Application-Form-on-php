<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // You can store the data in a database or send an email here
    // For now, let's just display it on the page

    echo "<h2>Your Information</h2>";
    echo "<p>Name: " . $name . "</p>";
    echo "<p>Email: " . $email . "</p>";
    echo "<p>Phone: " . $phone . "</p>";
    echo "<p>Message: " . $message . "</p>";
}
?>