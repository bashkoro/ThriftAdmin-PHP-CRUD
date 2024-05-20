<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "thriftadmin");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Mengambil ID pembeli dari URL
$kasirid = $_GET['id'];

// Query untuk menghapus data
$query = "DELETE FROM kasir WHERE kasirid = '$kasirid'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Data berhasil dihapus.";
    echo "<br>";
    echo "<a href='kasir.php'>Kembali ke halaman Kasir</a>";
} else {
    echo "Data gagal dihapus.";
}

//file json yang akan dibaca
$file = "kasir.json";

//mendapatkan file json
$admin = file_get_contents($file);

//mendecode admin.json
$data = json_decode($admin, true);

//membaca data array menggunakan foreach
foreach ($data as $key => $d) {
    // hapus data kedua
    if ($d['no'] === 2) {
        //mneghapus data array sesuai dengan index
        //menggantinya dengan elemen baru
        array_splice($data, $key, 1);
    }
    }

// mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// menyimpan data ke dalam admin.json
$admin = file_put_contents($file, $jsonfile);

mysqli_close($conn);
?>