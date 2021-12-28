<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Jaya Mahendra</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png">
</head>
<!-- navbar -->

<body class="d-flex h-100 text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Tugas</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="logbook.php">Data</a>
                    <a class="nav-link" href="pages/input_log.php">Input</a>
                </nav>
            </div>
        </header>

        <!-- end navbar -->

        <!-- Aksi Insert Data dalam DB -->
        <?php
        include 'koneksi.php';
        if (isset($_REQUEST['simpan'])) {
            // $idlog = $_REQUEST['idlog'];
            $nama_log = $_REQUEST['nama_log'];
            $tanggal_log = $_REQUEST['tanggal_log'];
            $desc_log = $_REQUEST['desc_log'];

            $result = mysqli_query($db, "INSERT INTO logbook (nama_log, tanggal_log, desc_log) 
                              values ('$nama_log','$tanggal_log','$desc_log')");
            if ($result) {
                echo "<script>
                alert('Tambah Data Berhasil !');
                document.location='logbook.php';
                </script>";
            } else {
                echo "<script>
                alert('Tambah Data Gagal !');
                document.location='logbook.php';
                </script>";
            }
        }

        //   // Script update data
        if (isset($_REQUEST['update'])) {
            $idlog = $_REQUEST['idlog'];
            $nama_log = $_REQUEST['nama_log'];
            $tanggal_log = $_REQUEST['tanggal_log'];
            $desc_log = $_REQUEST['desc_log'];

            $result = mysqli_query($db, "UPDATE logbook SET 
                      idlog='$idlog', 
                      nama_log='$nama_log', 
                      tanggal_log='$tanggal_log', 
                      desc_log='$desc_log' 
                      WHERE idlog='$idlog'");
            if ($result) {
                echo "<script>
        alert('Edit Data Berhasil !');
        document.location='logbook.php';
        </script>";
            } else {
                echo "<script>
        alert('Edit Data Gagal !');
        document.location='logbook.php';
        </script>";
            }
        }
        // // Akhir update data

        if (isset($_REQUEST['hapus'])) {
            $idlog = $_REQUEST['idlog'];

            $result = mysqli_query($db, "DELETE FROM logbook WHERE idlog='$idlog'");

            if ($result) {
                echo "<script>
        alert('Hapus Data Berhasil !');
        document.location='logbook.php';
        </script>";
            } else {
                echo "<script>
        alert('Hapus Data Gagal !');
        document.location='logbook.php';
        </script>";
            }
        }
        ?>

        <!-- Menampilkan data  -->
        <div class="container">
            <br><br><br>
            <h2>Log Book</h2>
            <br>
            <table class="table table-striped table-primary">
                <tr>
                    <th>Id </th>
                    <th>Nama </th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include 'koneksi.php';
                $no = 1;
                $query = mysqli_query($db, "SELECT * FROM logbook ORDER BY idlog ASC");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data['idlog']; ?></td>
                        <td><?php echo $data['nama_log']; ?></td>
                        <td><?php echo $data['tanggal_log']; ?></td>
                        <td><?php echo $data['desc_log']; ?></td>
                        <td>

                            <!-- Edit Data -->
                            <a href="index.php?hal=edit&id=<?= $data['idlog'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['idlog']; ?>">Edit</a>

                            <div class="modal fade bs-example-modal-lg" id="edit<?php echo $data['idlog']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog  modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Edit Data </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" action="" method="POST">
                                                <input type="hidden" name="idlog" value="<?php echo $data['idlog']; ?>">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Nama </label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="inputEmail3" name="nama_log" value="<?php echo $data['nama_log']; ?>">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label class="col-sm-2 control-label">Tanggal</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="tanggal_log" value="<?php echo $data['tanggal_log']; ?>">
                                                    </div>
                                                </div> -->

                                                <div class="form-group">
                                                    <label for="tanggal_log" class="col-sm-1 col-form-label" name="tanggal_log">Tanggal</label>
                                                    <div class="input-group date" id="from-datepicker">
                                                        <input type="date" name="tanggal_log" class="form-control" value="<?php echo $data['tanggal_log']; ?>>
                                                        <span class="input-group-append">
                                                            <span class="input-group-text bg-white d-block">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Keterangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="desc_log" value="<?php echo $data['desc_log']; ?>">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir edit data -->
                            <!-- Hapus data -->
                            <a href="#" class="btn btn-danger btn-sm" data-target=".bs-example-modal-lg<?php echo $data['idlog']; ?>" data-toggle="modal">Hapus</a>
                            <div class="modal fade bs-example-modal-lg<?php echo $data['idlog']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h7>Anda yakin ingin menghapus data?</h7>
                                            <form action="" method="POST">
                                                <input type="hidden" name="idlog" value="<?php echo $data['idlog']; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
        <!-- Akhir hapus data -->
        </td>
        </tr>
    <?php } ?>
    </table>

    </div>
    <!-- Menampilkan Data -->
    <p class="lead">
        <a href="pages/input_log.php" class="btn btn-lg btn-primary">Tambah Data</a>
    </p>
    <br><br><br>
    <footer class="mt-auto text-primary-50">
        <p>UAS Jaya Mahendra</p>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>