<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/tambah.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
</head>
<body>
	<h3 style="text-align: center;">Tambah Film Baru</h3>
	<div class="kotak rounded mx-auto d-block">
	       	<div class="detail">
				<h2 style="text-align:center">Detail Film</h2>	
	        	<form action="<?php echo base_url();'C_staff/tambahfilm'?>" method="post">
					<div style="margin-top:5px; margin-left:10px;">Nama Film</div>
					<input class="form-control input" type="text" placeholder="Nama Film">
					<div style="margin-top:5px; margin-left:10px;">Sinopsis</div>
	            	<textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
					<div style="margin-top:5px; margin-left:10px;margin-bottom:10px;">Rating Umur</div>
					<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Remaja">
  						<label class="form-check-label" for="inlineRadio1">Remaja</label>
					</div>
					<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Semua Umur">
  						<label class="form-check-label" for="inlineRadio1">Semua Umur</label>
					</div>
					<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Bimbingan">
  						<label class="form-check-label" for="inlineRadio1">Bimbingan Orang Tua</label>
					</div>
		        	<div style="margin-top:10px; margin-left:10px;margin-bottom:10px;">Ruang Penayangan</div>
					<div class="form-check">
					  	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="ruang1">
					  	<label class="form-check-label" for="inlineCheckbox1">Ruang 1</label>
					</div>
		        	<div class="form-check">
					  	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="ruang2">
					  	<label class="form-check-label" for="inlineCheckbox1">Ruang 2</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="ruang3">
					  	<label class="form-check-label" for="inlineCheckbox1">Ruang 3</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="ruang4">
					  	<label class="form-check-label" for="inlineCheckbox1">Ruang 4</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="ruang5">
					  	<label class="form-check-label" for="inlineCheckbox1">Ruang 5</label>
					</div>
	        	</form>
			</div>
			<div class="poster">
				<div class="gambar_poster">
				</div>
				<input type="file" class="form-control-file" id="exampleFormControlFile1">
				<div class="tombol">
					<button type="button" class="btn btn-warning float-right " style="margin-top:15px;width: 150px">Tambahkan Film</button>
		        	<a href="<?php echo base_url().'index.php/C_staff'?>">
						<button type="button" class="btn btn-warning float-right " style="margin-top:15px; margin-right: 15px ;width: 80px;">Kembali</button>
					</a>
				</div>
			</div>
	</div>
</body>