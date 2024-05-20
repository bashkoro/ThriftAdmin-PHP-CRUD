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
    $transaksiid = $_POST["transaksiid"];
    $barangid = $_POST["barangid"];
    $kasirid = $_POST["kasirid"];
    $tgl_transaksi = $_POST["tgl_transaksi"];
    $nama_barang = $_POST["nama_barang"];
    $harga_barang = $_POST["harga_barang"];
    $kuantitas = $_POST["kuantitas"];
    
    // Menghitung total
    $total = $harga_barang * $kuantitas;

    // Menyiapkan pernyataan SQL
    $query = "UPDATE transaksi SET barangid='$barangid', kasirid='$kasirid', tgl_transaksi='$tgl_transaksi', nama_barang='$nama_barang', harga_barang='$harga_barang', kuantitas='$kuantitas', total='$total' WHERE transaksiid=$transaksiid";

    if (mysqli_query($conn, $query)) {
        echo "Data Transaksi berhasil diperbarui di database.";
        echo "<br>";
        echo "<a href='transaksi.php'>Kembali ke halaman transaksi</a>";
    } else {
        echo "Terjadi kesalahan dalam mengupdate data transaksi di database: " . mysqli_error($conn);
    }
}

// File json yang akan dibaca dan diperbarui
$file = "transaksi.json";

// Mendapatkan file json
$admin = file_get_contents($file);

// Mendecode transaksi.json
$data = json_decode($admin, true);

// Mencari data transaksi yang akan diupdate berdasarkan transaksiid
foreach ($data as $key => $d) {
    if ($d['transaksiid'] === $transaksiid) {
        // Update data transaksi di array
        $data[$key]['barangid'] = $barangid;
        $data[$key]['kasirid'] = $kasirid;
        $data[$key]['tgl_transaksi'] = $tgl_transaksi;
        $data[$key]['nama_barang'] = $nama_barang;
        $data[$key]['harga_barang'] = $harga_barang;
        $data[$key]['kuantitas'] = $kuantitas;
        $data[$key]['total'] = $total;
    }
}

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam transaksi.json
file_put_contents($file, $jsonfile);

mysqli_close($conn);
?>