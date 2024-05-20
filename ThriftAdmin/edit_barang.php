<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="app/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="app/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="app/plugins/summernote/summernote-bs4.min.css">
</head>
<body>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Barang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "thriftadmin");

        // Cek koneksi
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Mengambil ID barang dari URL
        $barangid = $_GET['id'];

        // Query data barang berdasarkan ID
        $query = "SELECT * FROM Barang WHERE barangid = '$barangid'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        mysqli_close($conn);
        // Check if the data exists
        if (!$row) {
            echo "Data tidak ditemukan.";
            exit();
        }

        // Display the form with the existing data
        ?>
        <form method="POST" action="update_barang.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="barangid">Barang ID:</label>
                    <input type="text" class="form-control" name="barangid" id="barangid" value="<?php echo $row['barangid']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis_barang">Jenis Barang:</label>
                    <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang:</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $row['stock']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" class="form-control" name="harga" id="harga" value="<?php echo $row['harga']; ?>" required>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <script>
        function update_barang() {
    console.log("sendData Function Called");
    var xhr = new XMLHttpRequest();
    var url = "https://jsonplaceholder.typicode.com/posts";

    var data = JSON.stringify({
        barangid: document.getElementById("barangid").value,
        jenis_barang: document.getElementById("jenis_barang").value,
        nama: document.getElementById("nama").value,
        stock: document.getElementById("stock").value,
        harga: document.getElementById("harga").value
        
    });
    console.log("Data Yang di Kirim:", data);
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            console.log("Request Successful");
            console.log(this.response);
        } else {
            console.error(xhr.status);
        }
    };
    xhr.onerror = function() {
        console.error("Request Failed");
    };
    xhr.send(data);
    return false;
}
    </script>
</body>
</html>