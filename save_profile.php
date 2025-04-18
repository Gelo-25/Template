<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['profileName'];
    $email = $_POST['profileEmail'];
    $link = $_POST['profileLink'];
    
    // Handle file upload
    $targetDir = ""; // Directory to store uploaded images
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $fileName = basename($_FILES["profilePhoto"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $targetFilePath)) {
        // Insert data into database
        $sql = "INSERT INTO profiles (name, email, link, photo) VALUES ('$name', '$email', '$link', '$targetFilePath')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: choose.php?success=1");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the photo.";
    }
}

$conn->close();
?>
