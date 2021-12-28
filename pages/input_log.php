<!DOCTYPE html>
<html>

<head>
	<title> Input Data</title>
	<link rel="icon" href="https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body class="d-flex h-100 text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<br><br>
				<h3>Input Data </h3>
				<br><br>
				<form action="proses/log_input_proses.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="idlog">ID</label>
						<input type="number" name="idlog" class="form-control" disabled="" placeholder="Diisi Otomatis menggunakan Auto Increment">
					</div>
					<div class="form-group">
						<label for="nama_log">Nama</label>
						<input type="text" name="nama_log" class="form-control">
					</div>
					<div class="form-group">
						<label for="tanggal_log" class="col-sm-1 col-form-label" name="tanggal_log">Tanggal</label>
						<div class="input-group date" id="from-datepicker">
							<input type="date" name="tanggal_log" class="form-control">
							<span class="input-group-append">
								<span class="input-group-text bg-white d-block">
									<i class="fa fa-calendar"></i>
								</span>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="desc_log">Keterangan</label>
						<textarea class="form-control" name="desc_log" rows="3"></textarea>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>


</body>

</html>