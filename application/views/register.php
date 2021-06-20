<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/regist.css">

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
	<h2 style="text-align: center; margin-top: 40px;">Registrasi Pengguna Baru</h2>
	<p style="text-align: center; margin-top: 15px; color: red"><?php echo $this->session->flashdata('status'); ?></p>
	<div class="regist rounded mx-auto d-block mt-5">
	       	<div class="detail">
	        	<form action="<?php echo base_url('register/store')?>" method="post">
					<div class="biodata">Username</div>
						<input class="form-control input" type="text" name="username" placeholder="masukkan username" required>
					<div class="biodata">Password</div>
						<input class="form-control input" type="password" name="password" placeholder="password" required>
					<h2 style="text-align:center">________________________</h2>	
					<div class="biodata">Nama</div>
						<input class="form-control input" type="text" name="nama" placeholder="nama" required>
					<div class="biodata">Email</div>
						<input class="form-control input" type="text" name="email" placeholder="email" required>	
					<div class="biodata">No. HP</div>
						<input class="form-control input" type="text" name="hp" placeholder="No. HP" required>
					<div class="biodata">TTL</div>
						<input class="form-control input" type="date" name="ttl" placeholder="Tanggal Lahir" required>
					<button type="submit" name="tambah" class="btn btn-warning float-right tombol">Daftar</button>
      				<a href="<?php echo base_url()?>">
						<button type="button" class="btn btn-warning float-left tombol" >Kembali</button>
					</a>
		        		
	        	</form>
			</div>
	</div>
</body