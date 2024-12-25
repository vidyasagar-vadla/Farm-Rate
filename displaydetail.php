<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Price</title>
    <style>
    /* styles.css */

    body { 
        background: url('https://i.ibb.co/5KbG98t/image.jpg') no-repeat center center fixed;
        background-size: cover;
        background-position: center;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        color: white;
        padding: 20px 0;
        text-align: center;
    }

    section {
        margin: 80px auto;
        max-width: 600px;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background: rgba(0, 0, 0, 0.5);
    }

    h1, h2 {
        margin: 30px;
        color: #f0a500;
    }

    form {
        display: grid;
        gap: 10px;
    }

    label {
        font-weight: bold;
        color: white;
    }

    input[type="text"],
    select {
        padding: 8px;
        width: 100%;
        box-sizing: border-box;
    }

    button {
        background-color: #f0a500;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    button:hover {
        background-color: #4CAF50;
    }

    .home-button {
        background-color: #f0a500;
        position: center;
    }

    .home-button:hover {
        background-color: #007B9E;
    }

    .topright {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 10px 20px;
        background-color: transparent;
        color: black;
        border: 1px solid white;
        border-radius: 5px;
        cursor: pointer;
    }

    footer {
        color: white;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        width: 100%;
        bottom: 0;
        background-color: transparent;
    }
    </style>
</head>
<body>

<header>
    <h1>Get Crop Price</h1>
</header>

<section>
    <h2>Enter Details</h2>

    <form method="POST">
        <label for="platformname">Platform Name:</label>
        <select id="platformname" name="platformname" required>
            <option value="">SELECT OPTION</option>
            <option value="BINDU TRADERS(PVT)">BINDU TRADERS(PVT)</option>
            <option value="GOVT-GeM">GOVT-GeM</option>
            <option value="NCEDX(GOVT)">NCEDX(GOVT)</option>
            <option value="RYTHU PATHIMILLU(GOVT)">RYTHU PATHIMILLU(GOVT)</option>
            <option value="PRANAV(PVT)">PRANAV(PVT)</option>
            <option value="BABBLU(INDIVIDUAL)">BABBLU(INDIVIDUAL)</option>
        </select>

        <label for="cropselection">Crop Selection:</label>
        <select id="cropselection" name="cropselection" required>
            <option value="">SELECT OPTION</option>
            <option value="rice">rice</option>
            <option value="cotton">cotton</option>
            <option value="wheat">wheat</option>
            <option value="corn">corn</option>
            <option value="bengal gram">bengal gram</option>
            <option value="redgram">redgram</option>
            <option value="Tomato">Tomato</option>
        </select>
        
        <button type="submit">Get Price</button>
    </form>

    <?php
    // Database connection settings
    $servername = "localhost";
    $username = "root"; // Default XAMPP MySQL username
    $password = ""; // Default XAMPP MySQL password is empty
    $dbname = "agriculturedb1"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $platformname = $_POST['platformname'];
        $cropselection = $_POST['cropselection'];

        // Prepare SQL statement to retrieve price
        $stmt = $conn->prepare("SELECT price FROM crops WHERE platformname = ? AND cropselection = ?");
        $stmt->bind_param("ss", $platformname, $cropselection);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if we got any result
        if ($result->num_rows > 0) {
            // Fetch the price
            $row = $result->fetch_assoc();
            echo "<style> p { color: white; } </style>";
            echo "<p>Price: " . $row["price"] . "</p>";
        } else {
            echo "<style> p { color: white; } </style>";
            echo "<p>No data found for the given platform name and crop selection.</p>";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>

</section>

<button type="button" class="topright" onclick="goToHomePage()">Go to Home Page</button>

<footer>
    <p>&copy; 2024 RTRP CSM 2ND YEAR.JNTUHCEM.</p>
</footer>

<script>
    function goToHomePage() {
        window.location.href = 'index.html'; // Change 'index.html' to your actual home page URL
    }
</script>

</body>
</html>
