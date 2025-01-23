<?php
session_start();
$servername = "sql207.infinityfree.com";
$username = "if0_38035742";
$password = "d00pak104";
$dbname = "if0_38035742_deepaura104"; // Ensure this is the correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Variable to hold messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE email = ?");
    if (!$stmt) {
        $message = "Prepare failed: " . $conn->error;
    } else {
        $stmt->bind_param("s", $email);
        if (!$stmt->execute()) {
            $message = "Execute failed: " . $stmt->error;
        } else {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    // Successful login
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    header("Location: index.php"); // Redirect to home page
                    exit();
                } else {
                    // Password mismatch
                    echo "<script>alert('Invalid password. Please try again.');</script>";
                }
            } else {
                // Email not found
                echo "<script>alert('No user found with this email. Please sign up.');</script>";
            }
        }
        $stmt->close(); 
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
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

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1.1em;
            font-weight: 500;
            cursor: pointer;
        }

        .submit-btn:hover {
           transform: translateY(-2px);
           box-shadow: 0 5px 15px rgba(139,69,19,0.3);
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

       .error-message { 
           background:#FFEBEE; 
           color :var(--error-color); 
           padding :10px; 
           border-radius :8px; 
           margin-bottom :20px; 
           font-size :0.9em; 
           text-align:center; 
       }
       
       @media (max-width :768px) { 
           .container { padding :30px20px; } 
           h2 { font-size :1.8em; } 
       }
   </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
             <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
             </div>
             <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
             </div>
             <button type="submit" class="submit-btn">Login</button>
             <div class="form-footer">
                 <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
             </div>
         </form>
     </div>
 </body>
</html>
