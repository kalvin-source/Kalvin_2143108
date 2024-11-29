<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<style>
       body {
    font-family: Arial, sans-serif;
    background-color: #121212;
    color: #ffffff;
    padding: 5px;
}

.container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px; /* Jarak antar kartu */
    margin-top: 20px; /* Tambahkan jarak dari elemen di atasnya */
}

.card {
    background-color: #1e1e1e;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: 200px; /* Memberikan tinggi tetap untuk gambar agar seragam */
    border-radius: 8px;
    object-fit: cover; /* Memastikan gambar tetap proporsional */
}

.card h2 {
    font-size: 1.1em;
    margin: 10px 0 5px;
    font-weight: bold;
    color: #ffcc00; /* Highlight color */
}

.card p {
    font-size: 0.9em;
    margin: 0;
}

.rating {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 5px;
    color: #ffcc00;
    font-size: 0.9em;
}

.stars {
    color: #ffcc00;
    margin-right: 5px;
}

.chapter {
    color: #888;
    font-size: 0.8em;
}

/* Tambahkan media query untuk layar lebih kecil */
@media (max-width: 768px) {
    .container {
        grid-template-columns: repeat(2, 1fr); /* 2 kolom di perangkat kecil */
    }
}

@media (max-width: 480px) {
    .container {
        grid-template-columns: 1fr; /* 1 kolom di perangkat sangat kecil */
    }
}

    </style>
</head>
<body>


<body style="background-color:#ffffff;">
<div id="header"> 
    <div style="display: flex;">
    <img src="gambar/logo.png" alt="Petcare Logo" style="width: 100px; height: 100px;">
    <div style="margin-left: 20px; color:black" >
      <h1 style="font-size: 32px;">Pet Information</h1>
      <h2 style="font-size: 24px;">Pusat Informasi Hewan Peliharaan</h2>
    </div>    
  </div>
</div>

    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary"> -->
  <div class="container-fluid">
  <a class="navbar-brand" href="javascript:history.back()" style="color: black; text-decoration: none;">
  &#8592; Kembali
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
</div>

</body>
</html>
<div class="container">

<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pet";

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query SQL untuk mengambil data
$sql = "SELECT title, content, image_url, upload_type, rating FROM upload WHERE upload_type = 'makanan'";
$result = $conn->query($sql);

// Cek apakah ada data yang diambil
if ($result->num_rows > 0) {
    // Looping untuk menampilkan setiap baris data
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        
        // Menampilkan gambar di atas judul
        echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['title']) . "'>";
        
        // Menampilkan judul di bawah gambar
        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
        
        // Menampilkan teks konten
        echo "<p class='chapter'> " . htmlspecialchars($row['content']) . "</p>";
        
        // Menampilkan rating jika ada
        if (!empty($row['rating'])) {
            echo "<div class='rating'>";
            echo "<span class='stars'>★</span> " . htmlspecialchars($row['rating']) . "/5";
            echo "</div>";
        }

        echo "</div>";
    }
} 

// Tutup koneksi
$conn->close();
?>

