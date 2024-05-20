<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "thriftadmin");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Mengambil data yang dikirim melalui form
$kasirid = $_POST["kasirid"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$tgl_lahir = $_POST["tgl_lahir"];

// Query untuk update data kasir di database
$query = "UPDATE kasir SET nama = '$nama', alamat = '$alamat', telepon = '$telepon', email = '$email', gender = '$gender', tgl_lahir = '$tgl_lahir' WHERE kasirid = '$kasirid'";
$result = mysqli_query($conn, $query);

// Cek hasil query
if ($result) {
    echo "Data kasir berhasil diupdate di database.";
    echo "<br>";
    echo "<a href='kasir.php'>Kembali ke halaman Kasir</a>";
} else {
    echo "Gagal mengupdate data kasir di database: " . mysqli_error($conn);
}

// File json yang akan dibaca
$file = "kasir.json";

// Mendapatkan file json
$admin = file_get_contents($file);

// Mendecode kasir.json
$data = json_decode($admin, true);

// Mencari data kasir yang akan diupdate berdasarkan kasirid
foreach ($data as $key => $d) {
    if ($d['kasirid'] === $kasirid) {
        // Update data kasir di array
        $data[$key]['nama'] = $nama;
        $data[$key]['alamat'] = $alamat;
        $data[$key]['telepon'] = $telepon;
        $data[$key]['email'] = $email;
        $data[$key]['gender'] = $gender;
        $data[$key]['tgl_lahir'] = $tgl_lahir;
    }
}

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam kasir.json
file_put_contents($file, $jsonfile);

mysqli_close($conn);
?>