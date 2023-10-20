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

$sql = "SELECT * FROM tb_mahasiswa WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <nav>
        <ul class="menu">
            <li><a href="index.html">Beranda</a></li>
            <li><a href="formBiodata.html">Tugas Javascript</a></li>
            <li><a href="tugasDatabase.html">Tugas Database</a></li>
        </ul>
    </nav>

    <h1>Edit Mahasiswa</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nama">Nama Mahasiswa:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>

        <label for="nim">NIM Mahasiswa:</label>
        <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required pattern="[0-9]{8}"><br>

        <label for="program_studi">Program Studi:</label>
        <select name="program_studi" required>
            <option value="Teknik Arsitektur" <?php if ($row['program_studi'] == 'Teknik Arsitektur') echo 'selected'; ?>>Teknik Arsitektur</option>
            <option value="Teknik Elektro" <?php if ($row['program_studi'] == 'Teknik Elektro') echo 'selected'; ?>>Teknik Elektro</option>
            <option value="Teknik Industri" <?php if ($row['program_studi'] == 'Teknik Industri') echo 'selected'; ?>>Teknik Industri</option>
            <option value="Teknik Lingkungan" <?php if ($row['program_studi'] == 'Teknik Lingkungan') echo 'selected'; ?>>Teknik Lingkungan</option>
            <option value="Teknik Mesin" <?php if ($row['program_studi'] == 'Teknik Mesin') echo 'selected'; ?>>Teknik Mesin</option>
            <option value="Teknik Sipil" <?php if ($row['program_studi'] == 'Teknik Sipil') echo 'selected'; ?>>Teknik Sipil</option>
            <option value="Teknologi Informasi" <?php if ($row['program_studi'] == 'Teknologi Informasi') echo 'selected'; ?>>Teknologi Informasi</option>
        </select><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?> required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> required> Perempuan<br>

        <label for="hobi">Hobi:</label>
        <input type="text" name="hobi" value="<?php echo $row['hobi']; ?>" required><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
