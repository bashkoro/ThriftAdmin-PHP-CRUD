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
    $barangid = $_POST["barangid"];
    $jenis_barang = $_POST["jenis_barang"];
    $nama = $_POST["nama"];
    $stock = $_POST["stock"];
    $harga = $_POST["harga"];

    // Membuat query untuk menyimpan data barang
    $query = "INSERT INTO barang (barangid, jenis_barang, nama, stock, harga) VALUES ('$barangid', '$jenis_barang', '$nama', '$stock', '$harga')";

    if (mysqli_query($conn, $query)) {
        echo "Data Barang berhasil ditambahkan.";
        echo "<br>";
        echo "<a href='barang.php'>Kembali ke halaman Barang</a>";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

// File json yang akan dibaca
$file = "barang.json";

// Mendapatkan file json
$admin = file_get_contents($file);

// Mendecode admin.json
$data = json_decode($admin, true);

// Menambahkan data baru dari form ke array
$newData = array(
    'barangid' => $_POST["barangid"],
    'jenis_barang' => $_POST["jenis_barang"],
    'nama' => $_POST["nama"],
    'stock' => $_POST["stock"],
    'harga' => $_POST["harga"]
);

// Menambahkan data baru ke array
$data[] = $newData;

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam admin.json
file_put_contents($file, $jsonfile);
?>