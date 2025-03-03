<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $ktu_id = $_POST["ktu_id"];
    $college = $_POST["college"];
    
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO pk (name, email, ktu_id,college) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $ktu_id, $college);
    $stmt->execute();
    
    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
    
    // Close the statement
    $stmt->close();
}
?>



