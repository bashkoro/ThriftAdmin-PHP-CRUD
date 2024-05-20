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
            <h3 class="card-title">Tambah Transaksi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="insert_transaksi.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="transaksiid">Transaksi ID:</label>
                    <input type="number" class="form-control" name="transaksiid" id="transaksiid" required>
                </div>
                <div class="form-group">
                    <label for="barangid">Barang ID:</label>
                    <input type="number" class="form-control" name="barangid" id="barangid" required>
                </div>
                <div class="form-group">
                    <label for="kasirid">Kasir ID:</label>
                    <input type="number" class="form-control" name="kasirid" id="kasirid" required>
                </div>
                <div class="form-group">
                    <label for="tgl_transaksi">Tanggal Transaksi:</label>
                    <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi" required>
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang:</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga</label>
                    <input type="number" name="harga_barang" class="form-control" id="harga_barang" required>
                </div>
                <div class="form-group">
                    <label for="kuantitas">Kuantitas</label>
                    <input type="number" name="kuantitas" class="form-control" id="kuantitas" required>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function insert_transaksi() {
    console.log("sendData Function Called");
    var xhr = new XMLHttpRequest();
    var url = "https://jsonplaceholder.typicode.com/posts";

    var data = JSON.stringify({
        transaksiid: document.getElementById("transaksiid").value,
        barangid: document.getElementById("barangid").value,
        kasirid: document.getElementById("kasirid").value,
        tgl_transaksi: document.getElementById("tgl_transaksi").value,
        nama_barang: document.getElementById("nama_barang").value,
        harga_barang: document.getElementById("harga_barang").value,
        kuantitas: document.getElementById("kuantitas").value,
        
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