<?php
// Koneksi ke database ThriftAdmin
$conn = mysqli_connect("localhost", "root", "", "thriftadmin");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $barangid = $_POST["barangid"];
    $kasirid = $_POST["kasirid"];
    $tgl_transaksi = $_POST["tgl_transaksi"];
    $nama_barang = $_POST["nama_barang"];
    $harga_barang = $_POST["harga_barang"];
    $kuantitas = $_POST["kuantitas"];
    
    // Menghitung total
    $total = $harga_barang * $kuantitas;

    // Menyiapkan pernyataan SQL
    $query = "INSERT INTO transaksi (barangid, kasirid, tgl_transaksi, nama_barang, harga_barang, kuantitas, total) VALUES ('$barangid', '$kasirid', '$tgl_transaksi', '$nama_barang', '$harga_barang', '$kuantitas', '$total')";

    if (mysqli_query($conn, $query)) {
        echo "Data Transaksi berhasil ditambahkan.";
        echo "<br>";
        echo "<a href='transaksi.php'>Kembali ke halaman transaksi</a>";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

// File json yang akan dibaca
$file = "transaksi.json";

// Mendapatkan file json
$admin = file_get_contents($file);

// Mendecode admin.json
$data = json_decode($admin, true);

// Mendapatkan nilai dari form
$barangid = $_POST["barangid"];
$kasirid = $_POST["kasirid"];
$tgl_transaksi = $_POST["tgl_transaksi"];
$nama_barang = $_POST["nama_barang"];
$harga_barang = $_POST["harga_barang"];
$kuantitas = $_POST["kuantitas"];

// Data array baru
$newData = array(
    'barangid' => $barangid,
    'kasirid' => $kasirid,
    'tgl_transaksi' => $tgl_transaksi,
    'nama_barang' => $nama_barang,
    'harga_barang' => $harga_barang,
    'kuantitas' => $kuantitas
);

// Menambahkan data baru ke array
$data[] = $newData;

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam admin.json
file_put_contents($file, $jsonfile);
?>