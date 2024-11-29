<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <title>Admin</title>
</head>
<body>
  <div class="container">
<div class="header">
        <img src="gambar/logo.png" alt="Petcare Logo" class="logo">
        <div class="header-text">
            <h1>Pet Information</h1>
            <p>Pusat Informasi Hewan Peliharaan</p>
        </div>
        <button class="logout-btn">Log Out</button>
        </div>
    
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="informasi.php">Informasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="makanan.php">Rekomendasi Makanan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
   


    <div class="content">
        <button class="add-content-btn">
            <span class="plus">+</span> Tambahkan Konten
        </button>
    </div>

    <!-- JavaScript untuk mengatur fungsi tombol -->
    <script>
        // Fungsi untuk Log Out dan kembali ke halaman login
        document.querySelector('.logout-btn').addEventListener('click', function() {
            // Redirect ke halaman login
            window.location.href = 'login.php';  // Ganti dengan halaman login Anda
        });

        // Fungsi untuk menambahkan konten (contoh)
        document.querySelector('.add-content-btn').addEventListener('click', function() {
          window.location.href = 'upload.php';
            // Tambahkan logika untuk menambahkan konten di sini
        });
    </script>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0d6efd" fill-opacity="1"
          d="M0,32L6.2,74.7C12.3,117,25,203,37,218.7C49.2,235,62,181,74,133.3C86.2,85,98,43,111,74.7C123.1,107,135,213,148,256C160,299,172,277,185,245.3C196.9,213,209,171,222,154.7C233.8,139,246,149,258,149.3C270.8,149,283,139,295,128C307.7,117,320,107,332,106.7C344.6,107,357,117,369,133.3C381.5,149,394,171,406,176C418.5,181,431,171,443,176C455.4,181,468,203,480,213.3C492.3,224,505,224,517,240C529.2,256,542,288,554,298.7C566.2,309,578,299,591,272C603.1,245,615,203,628,176C640,149,652,139,665,149.3C676.9,160,689,192,702,192C713.8,192,726,160,738,149.3C750.8,139,763,149,775,138.7C787.7,128,800,96,812,96C824.6,96,837,128,849,144C861.5,160,874,160,886,176C898.5,192,911,224,923,234.7C935.4,245,948,235,960,213.3C972.3,192,985,160,997,165.3C1009.2,171,1022,213,1034,229.3C1046.2,245,1058,235,1071,208C1083.1,181,1095,139,1108,149.3C1120,160,1132,224,1145,218.7C1156.9,213,1169,139,1182,90.7C1193.8,43,1206,21,1218,48C1230.8,75,1243,149,1255,176C1267.7,203,1280,181,1292,186.7C1304.6,192,1317,224,1329,229.3C1341.5,235,1354,213,1366,202.7C1378.5,192,1391,192,1403,181.3C1415.4,171,1428,149,1434,138.7L1440,128L1440,320L1433.8,320C1427.7,320,1415,320,1403,320C1390.8,320,1378,320,1366,320C1353.8,320,1342,320,1329,320C1316.9,320,1305,320,1292,320C1280,320,1268,320,1255,320C1243.1,320,1231,320,1218,320C1206.2,320,1194,320,1182,320C1169.2,320,1157,320,1145,320C1132.3,320,1120,320,1108,320C1095.4,320,1083,320,1071,320C1058.5,320,1046,320,1034,320C1021.5,320,1009,320,997,320C984.6,320,972,320,960,320C947.7,320,935,320,923,320C910.8,320,898,320,886,320C873.8,320,862,320,849,320C836.9,320,825,320,812,320C800,320,788,320,775,320C763.1,320,751,320,738,320C726.2,320,714,320,702,320C689.2,320,677,320,665,320C652.3,320,640,320,628,320C615.4,320,603,320,591,320C578.5,320,566,320,554,320C541.5,320,529,320,517,320C504.6,320,492,320,480,320C467.7,320,455,320,443,320C430.8,320,418,320,406,320C393.8,320,382,320,369,320C356.9,320,345,320,332,320C320,320,308,320,295,320C283.1,320,271,320,258,320C246.2,320,234,320,222,320C209.2,320,197,320,185,320C172.3,320,160,320,148,320C135.4,320,123,320,111,320C98.5,320,86,320,74,320C61.5,320,49,320,37,320C24.6,320,12,320,6,320L0,320Z">
        </path>
      </svg>

      <footer>
        <p>&copyCreated By<a href="https://www.instagram.com/kalvinnv/" class="text-black fw-bold"> Fernanda Kalvin</a>
          </p>
      </footer>