<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $userType = $_POST['userType'];

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select table based on user type
    $table = ($userType == 'farmer') ? 'farmer' : 'nonfarmer';

    $sql = "SELECT * FROM $table WHERE name = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['name'] = $name;
        $_SESSION['userType'] = $userType;
        if ($userType == 'farmer') {
            header("Location: collabration.html");
            exit();
        } else {
            header("Location: nonfarmer.html");
            exit();
        }
    } else {
        $error = "Invalid username, email, or user type.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: url('https://i.ibb.co/5KbG98t/image.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 99;
            background: rgba(0, 0, 0, 0.7);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo {
            font-size: 2em;
            color: #f0a500;
            user-select: none;
        }
        .login-container {
            background:rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h2 {
            margin-bottom: 20px;
            color: #f0a500;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #f0a500;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #d18d00;
        }
        .error {
            color: #ff4d4d;
            margin-bottom: 15px;
        }
        a {
            color: #f0a500;
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #d18d00;
        }
        button {
        background-color: #f0a500;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    button:hover {
        background-color: #f0a500;
    }
.home-button {
        background-color: #f0a500;
position:center;
    }

    .home-button:hover {
        background-color: #007B9E;
    }
        .topright {
            position: absolute; /* Position the button absolutely */
            top: 100px; /* 20px from the top of the viewport */
            right: 20px; /* 20px from the right of the viewport */
            padding: 10px 20px; /* Padding for the button */
            background-color: transparent; /* Background color */
            color: #black; /* Text color */
            border: 1px solid white; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Change cursor on hover */
        }
        footer {
            background:transparent;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<header>
    <h2 class="logo">EMPOWERING FARMERS</h2>
</header>
<div class="login-container">
    <h2>Login</h2>
    <?php if (isset($error)) { echo '<p class="error">' . $error . '</p>'; } ?>
    <form action="login.php" method="post">
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="userType">User Type:</label>
        <select id="userType" name="userType" required>
            <option value="farmer">Farmer</option>
            <option value="nonfarmer">Non-Farmer</option>
        </select>
        <input type="submit" value="Login">
        <a href="CHATGPT1PAGE.html">Not Registered?</a>
    </form>
</div>
<button type="button" class="topright" onclick="goToHomePage()">back</button></body>
<script>
      function goToHomePage() {
        window.location.href = 'index.html'; // Change 'index.html' to your actual home page URL
    }
</script>
</html>
