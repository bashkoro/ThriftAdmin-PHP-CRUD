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
    $sql = "SELECT kasirid, nama, alamat, telepon, email, gender, tgl_lahir FROM kasir  WHERE $filter LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Menampilkan data barang dalam tabel
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["kasirid"] . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["alamat"] . "</td>";
            echo "<td>" . $row["telepon"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["tgl_lahir"] . "</td>";
            echo "<td>";
            echo "<a href='edit_kasir.php?id={$row['kasirid']}' class='btn btn-primary btn-sm ml-2'>Edit</a>";
            echo "<a href='delete_kasir.php?id={$row['kasirid']}' class='btn btn-danger btn-sm ml-2'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data Kasir</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>Permintaan tidak valid</td></tr>";
}

// Menutup koneksi database
$conn->close();
?>