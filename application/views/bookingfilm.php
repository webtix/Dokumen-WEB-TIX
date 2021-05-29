<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/regist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/header.css">

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
 	<script>
  		$( function() {
    		$( "#datepicker" ).datepicker();
  		} );
  	</script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <DIV class="container">
            <a class="navbar-brand" href="<?php echo base_url('C_home')?>"><h4>WebTix</h4></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active ">
                    <a class="nav-link mr-3 menu" href="<?php echo base_url('C_home/booking') ?>">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link mr-3 menu" href="<?= base_url('C_home/view_film');?>">Film</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link mr-3 menu" href="<?= base_url('C_home/profile');?>">Profil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link mr-3 menu" href="<?php echo base_url('C_login/logout');?>">Log out</a>
                </li>
                </ul>
            </div>
        </DIV>
    </nav> 
	<h2 style="text-align: center;">Registrasi Pengguna Baru</h2>
	<div class="row">
		<div class="regist rounded mx-auto d-block">
	       	<div class="detail">
	        	<form action="<?php echo base_url('C_auth/tambah_user')?>" method="post">
					<div class="biodata">Username</div>
						<input class="form-control input" type="text" name="username" placeholder="masukkan username">
					<div class="biodata">Password</div>
						<input class="form-control input" type="password" name="password" placeholder="password">
					<h2 style="text-align:center">________________________</h2>	
					<div class="biodata">Nama</div>
						<input class="form-control input" type="text" name="nama" placeholder="nama">
					<div class="biodata">Email</div>
						<input class="form-control input" type="text" name="email" placeholder="email">	
					<div class="biodata">No. HP</div>
						<input class="form-control input" type="text" name="hp" placeholder="No. HP">
					<div class="biodata">TTL</div>
						<input class="form-control input" type="text" name="ttl" placeholder="Tempat, Tanggal Lahir">
					<button type="submit" name="tambah" class="btn btn-warning float-right tombol">Daftar</button>
      				<a href="<?php echo base_url()?>">
						<button type="button" class="btn btn-warning float-left tombol" >Kembali</button>
					</a>
	        	</form>
			</div>
	</div>
	<div class="regist rounded mx-auto d-block">
	       	<div class="detail">
	        	<form action="<?php echo base_url('C_auth/tambah_user')?>" method="post">
					<div class="biodata">Username</div>
						<input class="form-control input" type="text" name="username" placeholder="masukkan username">
					<div class="biodata">Password</div>
						<input class="form-control input" type="password" name="password" placeholder="password">
					<h2 style="text-align:center">________________________</h2>	
					<div class="biodata">Nama</div>
						<input class="form-control input" type="text" name="nama" placeholder="nama">
					<div class="biodata">Email</div>
						<input class="form-control input" type="text" name="email" placeholder="email">	
					<div class="biodata">No. HP</div>
						<input class="form-control input" type="text" name="hp" placeholder="No. HP">
					<div class="biodata">TTL</div>
						<input class="form-control input" type="text" name="ttl" placeholder="Tempat, Tanggal Lahir">
					<button type="submit" name="tambah" class="btn btn-warning float-right tombol">Daftar</button>
      				<a href="<?php echo base_url()?>">
						<button type="button" class="btn btn-warning float-left tombol" >Kembali</button>
					</a>
	        	</form>
			</div>
	</div>
</body