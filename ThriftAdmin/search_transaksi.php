<?php
// Koneksi ke database ThriftAdmin
$conn = mysqli_connect("localhost", "root", "", "thriftadmin");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa parameter filter dan keyword
if (isset($_POST['filter']) && isset($_POST['keyword'])) {
    $filter = $_POST['filter'];
    $keyword = $_POST['keyword'];

    // Query untuk mendapatkan data barang berdasarkan filter dan keyword
    $sql = "SELECT transaksiid, barangid, kasirid, tgl_transaksi, nama_barang, harga_barang, kuantitas, total FROM transaksi WHERE $filter LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Menampilkan data barang dalam tabel
        while ($row = $result->fetch_assoc()) {
            $total_bayar = $row['harga_barang'] * $row['kuantitas'];
            echo "<tr>";
            echo "<td>" . $row["transaksiid"] . "</td>";
            echo "<td>" . $row["barangid"] . "</td>";
            echo "<td>" . $row["kasirid"] . "</td>";
            echo "<td>" . $row["tgl_transaksi"] . "</td>";
            echo "<td>" . $row["nama_barang"] . "</td>";
            echo "<td>" . $row["harga_barang"] . "</td>";
            echo "<td>" . $row["kuantitas"] . "</td>";
            echo "<td>{$total_bayar}</td>";
            echo "<td>";
            echo "<a href='edit_transaksi.php?id={$row['transaksiid']}' class='btn btn-primary btn-sm ml-2'>Edit</a>";
            echo "<a href='delete_transaksi.php?id={$row['transaksiid']}' class='btn btn-danger btn-sm ml-2'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data Transaksi</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>Permintaan tidak valid</td></tr>";
}

// Menutup koneksi database
$conn->close();
?>