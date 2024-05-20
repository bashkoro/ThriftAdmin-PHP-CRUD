<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Table Kasir Dashboard</title>

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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/ThriftLogo.png" alt="ThriftAdmin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ThriftAdmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               <--with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="barang.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kasir.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kasir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="transaksi.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard Kasir</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="add_kasir.php" class="btn btn-primary">Tambah Data Kasir</a>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <div class="float-sm-right">
          </div>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Kasir</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-sm-6">
                <div class="input-group">
                  <input type="text" class="form-control" id="search_Id" placeholder="Cari berdasarkan ID...">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="searchByIdButton">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <div class="input-group">
                  <input type="text" class="form-control" id="search_Name" placeholder="Cari berdasarkan Nama...">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="searchByNameButton">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
            <table id="kasirTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kasir ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>tgl_Lahir</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Koneksi ke database ThriftAdmin
                $conn = mysqli_connect("localhost", "root", "", "thriftadmin");

                // Memeriksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Mendefinisikan jumlah data per halaman
                $per_page = 10;

                // Mengambil halaman saat ini
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Query untuk mendapatkan jumlah total data
                $total_rows_query = "SELECT COUNT(*) as total_rows FROM kasir";
                $total_rows_result = $conn->query($total_rows_query);
                $total_rows = $total_rows_result->fetch_assoc()['total_rows'];

                // Menghitung jumlah halaman
                $total_pages = ceil($total_rows / $per_page);

                // Memastikan halaman saat ini tidak melebihi jumlah halaman yang tersedia
                $current_page = max(1, min($current_page, $total_pages));

                // Menghitung offset
                $offset = ($current_page - 1) * $per_page;

                // Query untuk mendapatkan data barang dengan pagination
                $sql = "SELECT kasirid, nama, alamat, telepon, email, gender, tgl_lahir FROM kasir LIMIT $offset, $per_page";
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
                    echo "<tr><td colspan='5'>Tidak ada data kasir</td></tr>";
                }

                // Menutup koneksi database
                $conn->close();
                ?>

                <!-- Tampilkan pagination -->
                <div class="pagination">
                    <?php
                    // Tampilkan tombol "Sebelumnya" jika halaman saat ini bukan halaman pertama
                    if ($current_page > 1) {
                        echo "<a href='?page=" . ($current_page - 1) . "' class='btn btn-primary'>Sebelumnya</a>";
                    }

                    // Tampilkan nomor halaman dan aktifkan kelas "active" pada halaman saat ini
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<a href='?page=$i' class='btn btn-primary " . ($current_page == $i ? 'active' : '') . "'>$i</a>";
                    }

                    // Tampilkan tombol "Selanjutnya" jika halaman saat ini bukan halaman terakhir
                    if ($current_page < $total_pages) {
                        echo "<a href='?page=" . ($current_page + 1) . "' class='btn btn-primary'>Selanjutnya</a>";
                    }
                    ?>
                </div>
              </tbody>
              </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<!-- /.content -->

<!-- JavaScript -->

<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
  // Fungsi pencarian berdasarkan ID
  document.getElementById('searchByIdButton').addEventListener('click', function() {
    var searchId = document.getElementById('search_Id').value;
    searchBarang('kasirid', searchId);
  });

  // Fungsi pencarian berdasarkan Nama
  document.getElementById('searchByNameButton').addEventListener('click', function() {
    var searchName = document.getElementById('search_Name').value;
    searchBarang('nama', searchName);
  });

  // Fungsi untuk mengirim permintaan pencarian ke server
  function searchBarang(filter, keyword) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById('kasirTable').getElementsByTagName('tbody')[0].innerHTML = xhr.responseText;
      }
    };
    xhr.open('POST', 'search_kasir.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var params = 'filter=' + filter + '&keyword=' + encodeURIComponent(keyword);
    xhr.send(params);
  }
});
</script>
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
