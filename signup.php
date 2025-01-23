<?php
session_start();

// Database configuration
$servername = "sql207.infinityfree.com";
$username = "if0_38035742";
$password = "d00pak104";
$dbname = "if0_38035742_deepaura104";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $city = trim($_POST['city']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic input validation
    if (empty($username) || empty($email) || empty($gender) || empty($city) || empty($password) || empty($confirm_password)) {
        echo "All fields are required!";
        exit;
    }

    // Check if the passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // (Optional) Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Sanitize user input to prevent XSS
    $username = htmlspecialchars($username);
    $email = htmlspecialchars($email);
    $city = htmlspecialchars($city);

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email); // "s" means string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "This email is already registered!";
        exit;
    }

    // Insert new user into the database
    $stmt = $conn->prepare("INSERT INTO user (username, email, gender, city, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $gender, $city, $hashed_password); // "sssss" means five string parameters
    $stmt->execute();

    // Redirect to login page after successful signup
    header("Location: login.php");
    exit; // Make sure to stop further script execution after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Signup Form</title>
    
<style>
        :root {
            --primary-color: #8B4513; /* Saddle Brown */
            --secondary-color: #D4AF37; /* Gold */
            --bg-color: #FDF5E6; /* Old Lace */
            --text-color: #2C1810; /* Dark Brown */
            --error-color: #D32F2F; /* Red */
            --input-bg: #FFFFFF; /* White */
            --shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--bg-color), #FFF8DC);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-color);
            font-size: 2.2em;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-color);
            font-weight: 500;
            font-size: 0.95em;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #E8E8E8;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            background: var(--input-bg);
            color: var(--text-color);
        }

        .form-group input:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
            outline: none;
        }

        button {
           width: 100%;
           padding: 14px; 
           background : linear-gradient(135deg,var(--primary-color),var(--secondary-color));
           border : none; 
           border-radius :10px; 
           color : white; 
           font-size :1.1em; 
           font-weight :500; 
           cursor : pointer; 
           transition : all .3s ease; 
           margin-top :10px; 
       }
       
       button:hover { 
           transform :translateY(-2px); 
           box-shadow :0 5px15px rgba(139,69,19,.3); 
       }
       
       .form-footer { 
           text-align:center; 
           margin-top :25px; 
           color :var(--text-color); 
           font-size :0.9em; 
       }
       
       .form-footer a { 
           color :var(--primary-color); 
           text-decoration:none; 
           font-weight :500; 
       }
       
       @media (max-width :768px) { 
           .container { padding :30px20px; } 
           h2 { font-size :1.8em; } 
       }
   </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="signup.php">
             <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="username" placeholder="Enter your full name" required>
             </div>
             <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
             </div>
             <div class="form-group">
                <label>Gender</label>
                <div class="gender-options">
                    <div class="radio-option">
                     <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="male" required>
                       
                    </div>
                    <div class="radio-option">
                       
                        <label for="female">Female</label>
                         <input type="radio" id="female" name="gender" value="female">
                    </div>
                </div>
             </div>
             <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" placeholder="Enter your city" required>
             </div>
             <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
             </div>
             <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
             </div>
             <button type="submit">Sign Up</button>
         </form>
         <div class="form-footer">
             Already have an account? <a href="login.php">Login here</a>.
         </div>
     </div>
 </body>
</html>

