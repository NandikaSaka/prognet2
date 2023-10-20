<?php
$servername = "prognet.localnet";
$username = "2205551006";
$password = "2205551006";
$dbname = "db_2205551006";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM tb_mahasiswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: tugasDatabase.html");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
