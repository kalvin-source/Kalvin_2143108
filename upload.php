<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Center the form on the page */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Form container styling */
        form {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Form title styling */
        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Label styling */
        label {
            display: block;
            font-weight: bold;
            color: #333333;
            margin-bottom: 5px;
        }

        /* Input and select fields styling */
        input[type="text"],
        input[type="file"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333333;
            background-color: #f9f9f9;
        }

        /* Button styling */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: #ffffff;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Error message styling */
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h2>Upload Makanan or Informasi</h2>
    
    <label for="upload_type">Select Type:</label>
    <select name="upload_type" id="upload_type" required>
        <option value="makanan">Makanan</option>
        <option value="informasi">Informasi</option>
    </select>

    <!-- Bagian Judul Informasi -->
    <div id="title_field" style="display: none;">
        <label for="title">Title (for Informasi):</label>
        <input type="text" name="title" id="title">
    </div>

    <!-- Bagian Upload Gambar -->
    <div id="image_field">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image">
    </div>

    <!-- Bagian Teks -->
    <label for="text">Text:</label>
    <textarea name="text" id="text" rows="5" required></textarea>

    <!-- Bagian Rating -->
    <div id="rating_field" style="display: none;">
        <label for="rating">Rating (1-5, for Makanan):</label>
        <input type="number" name="rating" id="rating" min="1" max="5">
    </div>

    <button type="submit" name="submit">Upload</button>
</form>
<script>
// JavaScript untuk menampilkan elemen sesuai tipe yang dipilih
document.getElementById('upload_type').addEventListener('change', function () {
    var uploadType = this.value;

    // Tampilkan atau sembunyikan bagian judul untuk Informasi
    document.getElementById('title_field').style.display = (uploadType === 'informasi') ? 'block' : 'none';

    // menyembunyikan untuk upload gambar diinformasi
    document.getElementById('image_field').style.display = (uploadType === 'makanan') ? 'block' : 'none';

    // Tampilkan atau sembunyikan bagian rating untuk Makanan
    document.getElementById('rating_field').style.display = (uploadType === 'makanan') ? 'block' : 'none';
    
});

</script>

<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Database connection details
    $host = "localhost";      // Your MySQL server host
    $dbUsername = "root";     // Your MySQL username
    $dbPassword = "";         // Your MySQL password
    $dbName = "pet";          // Your database name

    // Create MySQL connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $upload_type = mysqli_real_escape_string($conn, $_POST['upload_type']);
    $text = mysqli_real_escape_string($conn, $_POST['text']);
    $title = $upload_type === 'informasi' ? mysqli_real_escape_string($conn, $_POST['title']) : null;
    $rating = $upload_type === 'makanan' ? (int)$_POST['rating'] : null;

    // Directory to save uploaded images
    $targetDir = "upload/";

    // Ensure the uploads directory exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);  // Create the directory if it does not exist
    }

    // Get file details (only for makanan)
    $fileName = "";
    $targetFilePath = "";
    if ($upload_type === 'makanan') {
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allowed file types
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');

        // Check if file type is allowed
        if (in_array(strtolower($fileType), $allowTypes)) {
            // Check for upload errors
            if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                // Move the file to the target directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                    // Prepare an SQL statement to insert data into the database
                    $stmt = $conn->prepare("INSERT INTO upload (upload_type, title, image_url, content, rating) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssi", $upload_type, $title, $targetFilePath, $text, $rating);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "Data and image successfully uploaded and saved to the database.";
                    } else {
                        echo "Error saving information to the database.";
                    }

                    // Close the statement
                    $stmt->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "File upload error. Error code: " . $_FILES["image"]["error"];
            }
        } else {
            echo "Only JPG, JPEG, PNG, GIF, and WEBP files are allowed.";
        }
    } else {
        // For Informasi, no image is needed
        // Prepare an SQL statement to insert data into the database (without image)
        $stmt = $conn->prepare("INSERT INTO upload (upload_type, title, content) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $upload_type, $title, $text);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data successfully uploaded and saved to the database.";
        } else {
            echo "Error saving information to the database.";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>



</body>
</html>
