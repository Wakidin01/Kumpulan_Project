<html>
<head>
	<title>Aplikasi Kelola Data Kampus</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<div class="row justify-content-center">
	<div class="col-xl-6 col-lg-6 col-md-6">
	<div class="card shadow-sm my-5">
	<div class="card-body p-5">
	<div class="row">

	<div class="col-lg-12">

<?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']== "gagal"){
                echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
					Username & Password Salah </div>";
            }
        }
    ?>


<form method="POST" action="<?php echo"proses_login.php?aksi=login" ?>">
<div class="text-center">
<h3 class="h4 text-gray-900 mb 4">LOGIN USER</h3>
</div>
	<div class="form-group">
	<label>Username :</label>
	<input type="text" name="username" class="form-control">
	</div>

	<div class="form-group">
	<label>Password :</label>
	<input type="password" name="password" class="form-control">
	</div>

	<div class="form-group">
	<input type="submit" class="btn btn-info" value="Sign In">
	</div>

</form>

</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
