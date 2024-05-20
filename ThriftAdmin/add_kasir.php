<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kasir</title>
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
            <h3 class="card-title">Tambah Kasir</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="insert_kasir.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="kasirid">Kasir ID:</label>
                    <input type="number" class="form-control" name="kasirid" id="kasirid" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kasir:</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon:</label>
                    <input type="number" class="form-control" name="telepon" id="telepon" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderL" value="Laki-Laki" required>
                        <label class="form-check-label" for="genderL">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderP" value="Perempuan" required>
                        <label class="form-check-label" for="genderP">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script>
function insert_kasir() {
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