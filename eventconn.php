<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'booking');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO events (name, email, phone, event_date, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $date, $message);

if ($stmt->execute()) {
    echo "<h1 style='text-align: center; color: #ff75b3; font-family: Great Vibes;'>Registration Successful!</h1>";
    echo "<p style='text-align: center; color: #000; font-size: 20px;'>&hearts; Our Team Will Contact You Very Soon... &hearts;</p>";
    echo "<div style='text-align: center; margin-top: 20px;'>
    <button onclick=\"window.location.href='index1.html'\" style='padding: 10px 20px; background-color: #ff75b3; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;'>Go Back to Home</button>
  </div>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
