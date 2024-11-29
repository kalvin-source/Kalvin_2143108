<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        /* Styling card */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            margin: 10px auto;
            padding: 5px;
            max-width: 600px;
            transition: all 0.3s ease;
        }

        /* Hover effect for cards */
        .card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            transform: scale(1.02);
        }

        /* Card title styling */
        .card h2 {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
            text-align: center;
            cursor: pointer;
            color: black;
            transition: color 0.3s ease;
            background-color:#007bff;
        }

        /* Hover effect for title */
        .card h2:hover {
            color: #0056b3;
        }

        /* Content inside the card */
        .card p {
            font-size: 16px;
            line-height: 1.5;
            margin: 15px 0 0 0;
            display: none; /* Initially hide the text */
            color: #333;
        }

        /* Active card content (visible state) */
        .card.active p {
            display: block;
        }
    </style>
</head>
<body style="background-color:#dee2e6;">
    <div id="header">
        <div style="display: flex;">
            <img src="gambar/logo.png" alt="Petcare Logo" style="width: 100px; height: 100px;">
            <div style="margin-left: 20px;">
                <h1 style="font-size: 32px;">Pet Information</h1>
                <h2 style="font-size: 24px;">Pusat Informasi Hewan Peliharaan</h2>
            </div>    
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:history.back()" style="color: black; text-decoration: none;">
                &#8592; Kembali
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <h1 class="page-title" style="font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #333;">Rawat Kucing Anda Agar Tumbuh Sehat</h1>
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

    $sql = "SELECT title, content, image_url, upload_type FROM upload WHERE upload_type = 'informasi'";
    $result = $conn->query($sql);

    // Cek apakah ada data yang diambil
    if ($result->num_rows > 0) {
        // Looping untuk menampilkan setiap baris data
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            // Menampilkan gambar di atas judul
            if (!empty($row['image_url'])) {
                echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='Image' style='width: 100%; border-radius: 5px;'>";
            }
            // Menampilkan judul di bawah gambar
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            // Menampilkan teks (disembunyikan secara default)
            echo "<p>" . htmlspecialchars($row['content']) . "</p>";
            echo "</div>";
        }
    }

    // Tutup koneksi
    $conn->close();
    ?>

    <script>
        // Menangani interaksi klik pada judul
        document.querySelectorAll('.card h2').forEach(function(title) {
            title.addEventListener('click', function() {
                const card = this.parentElement; // Mendapatkan elemen parent (card)
                card.classList.toggle('active'); // Toggle class 'active' untuk membuka/menutup teks
            });
        });
    </script>
</body>
</html>
