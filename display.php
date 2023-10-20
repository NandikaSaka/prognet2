<?php
$servername = "prognet.localnet";
$username = "2205551006";
$password = "2205551006";
$dbname = "db_2205551006";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_mahasiswa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["nama"]."</td>";
        echo "<td>".$row["nim"]."</td>";
        echo "<td>".$row["program_studi"]."</td>";
        echo "<td>".$row["jenis_kelamin"]."</td>";
        echo "<td>".$row["hobi"]."</td>";
        echo "<td><a href='edit.php?id=".$row["id"]."'>Edit</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>