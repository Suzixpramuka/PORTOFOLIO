<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Koneksi ke database
    $conn = connectDB();

    // Query untuk menyimpan data formulir ke database
    $sql = "INSERT INTO kontak (id, name, email, message) VALUES (NULL, '$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pesan berhasil dikirim!. Terima kasih.! 😊');</script>";
        echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Metode pengiriman tidak valid.";
}
?>