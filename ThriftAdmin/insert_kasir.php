<?php
// Koneksi ke database ThriftAdmin
$conn = mysqli_connect("localhost", "root", "", "thriftadmin");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari form
    $kasirid = $_POST["kasirid"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $tgl_lahir = $_POST["tgl_lahir"];

    // Membuat query untuk menyimpan data kasir
    $query = "INSERT INTO kasir (kasirid, nama, alamat, telepon, email, gender, tgl_lahir) VALUES 
    ('$kasirid', '$nama', '$alamat', '$telepon', '$email', '$gender', '$tgl_lahir')";

    if (mysqli_query($conn, $query)) {
        echo "Data kasir berhasil ditambahkan.";
        echo "<br>";
        echo "<a href='Kasir.php'>Kembali ke halaman Kasir</a>";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

// File json yang akan dibaca
$file = "kasir.json";

// Mendapatkan file json
$admin = file_get_contents($file);

// Mendecode admin.json
$data = json_decode($admin, true);

// Menambahkan data baru dari form ke array
$newData = array(
    'kasirid' => $_POST["kasirid"],
    'nama' => $_POST["nama"],
    'alamat' => $_POST["alamat"],
    'telepon' => $_POST["telepon"],
    'email' => $_POST["email"],
    'gender' => $_POST["gender"],
    'tgl_lahir' => $_POST["tgl_lahir"]
);

// Menambahkan data baru ke array
$data[] = $newData;

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam admin.json
file_put_contents($file, $jsonfile);
?>