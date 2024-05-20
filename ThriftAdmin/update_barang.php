<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "thriftadmin");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Mengambil data yang dikirim melalui form
$barangid = $_POST['barangid'];
$jenis_barang = $_POST['jenis_barang'];
$nama = $_POST['nama'];
$stock = $_POST['stock'];
$harga = $_POST['harga'];

// Query untuk update data barang di database
$query = "UPDATE Barang SET jenis_barang = '$jenis_barang', nama = '$nama', stock = '$stock', harga = '$harga' WHERE barangid = '$barangid'";
$result = mysqli_query($conn, $query);

// Cek hasil query
if ($result) {
    echo "Data barang berhasil diupdate di database.";
    echo "<br>";
    echo "<a href='barang.php'>Kembali ke halaman Barang</a>";
} else {
    echo "Gagal mengupdate data barang di database: " . mysqli_error($conn);
}

// File json yang akan dibaca
$file = "barang.json";

// Mendapatkan file json
$admin = file_get_contents($file);

// Mendecode barang.json
$data = json_decode($admin, true);

// Mencari data barang yang akan diupdate berdasarkan barangid
foreach ($data as $key => $d) {
    if ($d['barangid'] === $barangid) {
        // Update data barang di array
        $data[$key]['jenis_barang'] = $jenis_barang;
        $data[$key]['nama'] = $nama;
        $data[$key]['stock'] = $stock;
        $data[$key]['harga'] = $harga;
    }
}

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam barang.json
file_put_contents($file, $jsonfile);

mysqli_close($conn);
?>