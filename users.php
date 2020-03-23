<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Kriptografi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php
    include 'header.php';
    $db = new database();
    $data = $db->tampil_data();
    
    if(isset($_GET['action']))
    {
	    $id = $_GET['id'];
	    $db->delete_data($id);
	    header('location:users.php');
    }
?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link active">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-header">Enkripsi dan Dekripsi</li>
          <li class="nav-item">
            <a href="caesar.php" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                Caesar Cipher
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="steganografi.php" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                Steganografi
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataUsers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="add-user.php">
                <button type="button" class="btn btn-md btn-outline-primary">Tambah Data</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
		              foreach($data as $row){
			          ?>
                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-success">Edit</a>
                    <button type="button" class="btn btn-danger mb-1 btn-sm" data-toggle="modal" data-target="#staticModal<?php echo $no; ?>">
                      <i class="menu-icon fa fa-times-circle"></i> Hapus
                    </button>
                    <div class="modal fade" id="staticModal<?php echo $no++; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Hapus data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>
                              Apakah anda yakin akan menghapus data <strong><?php echo $row['name']; ?></strong>
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="users.php?action=delete&id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">OK</button></a>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php 
		              }
		            ?>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">AdminLTE.io</a> & Ahfasxp.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
