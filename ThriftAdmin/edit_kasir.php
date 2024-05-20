<!DOCTYPE html>
<html>
<head>
    <title>Edit kasir</title>
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
    <!-- JQVMap -->
    <link rel="stylesheet" href="app/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="app/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="app/plugins/summernote/summernote-bs4.min.css">
</head>
<body>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit kasir</h3>
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

        // Mengambil ID kasir dari URL
        $kasirid = $_GET['id'];

        // Query data kasir berdasarkan ID
        $query = "SELECT * FROM kasir WHERE kasirid = '$kasirid'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        // Check if the data exists
        if (!$row) {
            echo "Data tidak ditemukan.";
            exit();
        }

        // Display the form with the existing data
        ?>
        <form method="POST" action="update_kasir.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="kasirid">KasirID:</label>
                    <input type="number" class="form-control" name="kasirid" id="kasirid" value="<?php echo $row['kasirid']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon:</label>
                    <input type="number" class="form-control" name="telepon" id="telepon" value="<?php echo $row['telepon']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderL" value="Laki-Laki" <?php if ($row['gender'] == "Laki-Laki") echo "checked"; ?> required>
                        <label class="form-check-label" for="genderL">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderP" value="Perempuan" <?php if ($row['gender'] == "Perempuan") echo "checked"; ?> required>
                        <label class="form-check-label" for="genderP">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <script>
        function update_kasir() {
    console.log("sendData Function Called");
    var xhr = new XMLHttpRequest();
    var url = "https://jsonplaceholder.typicode.com/posts";

    var data = JSON.stringify({
        kasirid: document.getElementById("kasirid").value,
        nama: document.getElementById("nama").value,
        alamat: document.getElementById("alamat").value,
        telepon: document.getElementById("telepon").value,
        email: document.getElementById("email").value,
        gender: document.getElementById("gender").value,
        tgl_lahir: document.getElementById("tgl_lahir").value,
        
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