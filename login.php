<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<style>
.css {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

h1 {
  font-size: large;
}

body {
  font-family: 'Times New Roman', Times, serif;
  color: rgb(0, 0, 0);
  background-color: #dee2e6;
  text-align: center;
}
</style>
<body style="padding: 100px;">
    <img src="gambar/logo.png" width="auto" height="100px">
    <div class="css">
        <!-- Form login -->
        <form method="POST" action="">
            <h1>PET INFORMATION</h1>
            <input type="id" id="username" name="username" placeholder="username"><br><p></p>
            <input type="password" id="password" name="password" placeholder="password"><br><p></p>
            <button type="submit">LOGIN</button>
            <p id="error" style="color: red;">
                
                
<?php
 // Kode PHP untuk validasi login admin
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Koneksi ke database
 $host = "localhost";  // Ganti dengan host server MySQL Anda
 $dbUsername = "root"; // Ganti dengan username MySQL Anda
$dbPassword = "";     // Ganti dengan password MySQL Anda
 $dbName = "pet";      // Nama database

// Membuat koneksi ke MySQL
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

 // Cek koneksi
 if ($conn->connect_error) {
  die("Koneksi ke database gagal: " . $conn->connect_error);
 }

  // Mengambil data dari form login
   $username = $_POST['username'];
    $password = $_POST['password'];

// Mencegah SQL Injection
 $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

 // Query untuk memeriksa apakah data admin sesuai
  $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = $conn->query($query);

 // Jika data ditemukan
 if ($result->num_rows > 0) {
 // Login berhasil
  $_SESSION['loggedin'] = true; // Set session
  $_SESSION['username'] = $username; // Set session username

 // Redirect ke halaman admin
 header("Location: admin.php");
    exit();
} else {
     echo "Username atau password salah";
}
// Tutup koneksi
  $conn->close();
} ?>
            </p>
        </form>
    </div>
</body>
</html>
