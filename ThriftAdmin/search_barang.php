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
    $sql = "SELECT barangid, jenis_barang, nama, stock, harga FROM barang WHERE $filter LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Menampilkan data barang dalam tabel
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["barangid"] . "</td>";
            echo "<td>" . $row["jenis_barang"] . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["stock"] . "</td>";
            echo "<td>" . $row["harga"] . "</td>";
            echo "<td>";
            echo "<a href='edit.php?id={$row['barangid']}' class='btn btn-primary btn-sm ml-2'>Edit</a>";
            echo "<a href='delete.php?id={$row['barangid']}' class='btn btn-danger btn-sm ml-2'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data barang</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>Permintaan tidak valid</td></tr>";
}

// Menutup koneksi database
$conn->close();
?>