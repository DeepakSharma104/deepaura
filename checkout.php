<?php

session_start();
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "customer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $totalPrice = $_POST['totalPrice'];
    $productNames = $_POST['productNames'];
    $paymentMethod = $_POST['paymentMethod'];

    // Log the form data for debugging purposes
    error_log("Full Name: $fullName, Email: $email, Address: $address, Total Price: $totalPrice, Payment Method: $paymentMethod");

    // Check if the total price is at least 500
    if ($totalPrice >= 500) {
        // Proceed with the order if the price is 500 or more
        $sql = "INSERT INTO orders (fullName, email, address, totalPrice, paymentMethod, productNames) 
                VALUES('$fullName', '$email', '$address', '$totalPrice', '$paymentMethod', '$productNames')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Order placed successfully
            echo "<div class='message success'>Thank you for your purchase, $fullName! Your order for $productNames has been placed.</div>";
            // Redirect back to index.php after 3 seconds
            echo "<meta http-equiv='refresh' content='3;url=index.php'>";
        } else {
            // Log error if the query failed
            error_log("Error: " . mysqli_error($conn)); // Log the error
            echo "<div class='message error'>Error: " . mysqli_error($conn) . "</div>";
            // Redirect back to index.php after 3 seconds
            echo "<meta http-equiv='refresh' content='3;url=index.php'>";
        }
    } else {
        // Display a message if the total price is less than 500
        echo "<div class='message error'>Sorry, your total order price must be at least 500 to proceed with the checkout.</div>";
        // Redirect back to index.php after 3 seconds
        echo "<meta http-equiv='refresh' content='3;url=index.php'>";
    }

    // Close the connection
    $conn->close();
} else {
    // Handle error or redirect back to the shop
    header("Location: index.php"); // or wherever your shop is
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        /* Container for the message */
        .message {
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-align: center;
            padding: 15px;
            margin: 20px auto;
            width: 80%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Success message */
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Error message */
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <!-- The PHP code will display the success or error messages here -->
</body>
</html>
