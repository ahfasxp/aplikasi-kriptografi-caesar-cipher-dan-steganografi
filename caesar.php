<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Kriptograpi</title>
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
		
	if(isset($_POST['enkripsi'])){
            function Cipher($ch, $key)
            {
                if (!ctype_alpha($ch))
                        return $ch;

                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
            }

            function Encipher($input, $key)
            {
                $output = "";

                $inputArr = str_split($input);
                foreach ($inputArr as $ch)
                        $output .= Cipher($ch, $key);

                return $output;
            }

            function Decipher($input, $key)
            {
                    return Encipher($input, 26 - $key);
            }
            
            
        }else if(isset($_POST['dekripsi'])){
            function Cipher($ch, $key)
            {
                if (!ctype_alpha($ch))
                        return $ch;

                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
            }

            function Encipher($input, $key)
            {
                $output = "";

                $inputArr = str_split($input);
                foreach ($inputArr as $ch)
                        $output .= Cipher($ch, $key);

                return $output;
            }

            function Decipher($input, $key)
            {
                    return Encipher($input, 26 - $key);
            }
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
            <a href="users.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-header">Enkripsi dan Dekripsi</li>
          <li class="nav-item">
            <a href="caesar.php" class="nav-link active">
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
            <h1>Caesar Cipher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CaesarCipher</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enkripsi / Plaintext</h3>
              </div>
              <!-- form start -->
              <form role="form" method="POST" action="">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="plain" placeholder="Isi Text" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="metode" placeholder="Jumlah Deret atau Key" required autocomplete="off">
                    </div>
                    <button type="submit" name="enkripsi" class="btn btn-primary">Submit</button>
                    <br>
                    <br>
                    <?php if(isset($_POST['enkripsi'])){ ?>
                    <dl>
                        <dt>Hasil Enkripsi</dt>
                            <dd><?php if (isset($_POST['enkripsi'])){ echo Encipher($_POST['plain'], $_POST['metode']);}?></dd>
                        <dt>Plaintext</dt>
                            <dd><?php if (isset($_POST['enkripsi'])){ echo Decipher(Encipher($_POST['plain'], $_POST['metode']),$_POST['metode']);}?></dd>
                        <dt>Jumlah Deret atau Key</dt>
                            <dd><?php if (isset($_POST['enkripsi'])){ echo $_POST['metode'];}?></dd>
                    </dl>
                    <?php } ?>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- Right column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dekripsi / Ciphertext</h3>
              </div>
              <!-- form start -->
              <form role="form" method="POST" action="">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="plain" placeholder="Isi Text" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="metode" placeholder="Jumlah Deret atau Key" required autocomplete="off">
                    </div>
                    <button type="submit" name="dekripsi" class="btn btn-primary">Submit</button>
                    <br>
                    <br>
                    <?php if(isset($_POST['dekripsi'])){ ?>
                    <dl>
                    <dt>Hasil Dekripsi</dt>
                        <dd><?php if (isset($_POST['dekripsi'])){ echo Decipher($_POST['plain'], $_POST['metode']);}?></dd>
                    <dt>Ciphertext</dt>
                        <dd><?php if (isset($_POST['dekripsi'])){ echo Encipher(Decipher($_POST['plain'], $_POST['metode']),$_POST['metode']);}?></dd>
                    <dt>Jumlah Deret atau Key</dt>
                        <dd><?php if (isset($_POST['dekripsi'])){ echo $_POST['metode'];}?></dd>
                    </dl>
                    <?php } ?>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
        
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
