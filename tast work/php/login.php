<?php
// login.php
$servername = "sql12.freemysqlhosting.net";
$username = "sql12668500";
$password = "QTFbPxNVCj";
$dbname = "	sql12668500";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        // Password is correct, create a session token
        $sessionToken = bin2hex(random_bytes(32));

        // Store the session token in Redis
        // Implement Redis connection and storage logic here

        echo json_encode(['status' => 'success', 'token' => $sessionToken]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }

    $stmt->close();
    $conn->close();
}
?>
