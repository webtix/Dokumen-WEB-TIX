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
	<h3 style="text-align: center;">Registrasi Pengguna Baru</h3>
	<div class="regist rounded mx-auto d-block">
	       	<div class="detail">
				<h2 style="text-align:center">Masukkan Data Pengguna</h2>	
	        	<form action="">
					<div style="margin-top:5px; margin-left:10px;">username</div>
						<input class="form-control input" type="text" name="username" placeholder="masukkan username">
					<div style="margin-top:5px; margin-left:10px;">Password</div>
						<input class="form-control input" type="password" name="password" placeholder="password">
					<div style="margin-top:5px; margin-left:10px;">Nama</div>
						<input class="form-control input" type="text" name="nama" placeholder="nama">
						
					<div style="margin-top:5px; margin-left:10px;">Email</div>
						<input class="form-control input" type="text" name="email" placeholder="email">	
					<div style="margin-top:5px; margin-left:10px;">HP</div>
						<input class="form-control input" type="text" name="HP" placeholder="No. HP">
      				<a href="<?php echo base_url()?>">
						<button type="button" class="btn btn-warning float-left tombol" >Kembali</button>
					</a>
					<a href="">
		        		<button type="button" class="btn btn-warning float-right tombol" href="">Daftar</button>
		        	</a>
	        	</form>
			</div>
	</div>
</body