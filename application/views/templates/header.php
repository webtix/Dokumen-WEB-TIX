<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/header.css">

	<!-- My Font Google -->
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
	
	<title>WebTix</title>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-warning">
		<DIV class="container">
			<a class="navbar-brand" href="<?php echo base_url('home')?>"><h4>WebTix</h4></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link mr-3 menu" href="<?php echo base_url('home') ?>">Home</a>
					</li>
					<?php if($this->session->TipeUser == 'staff'){ ?>
						<li class="nav-item">
							<a class="nav-link mr-3 menu" href="<?= base_url('film');?>">Film</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mr-3 menu" href="<?= base_url('verifikasi_pembayaran');?>">Verifikasi Pembayaran</a>
						</li>
					<?php }else if($this->session->TipeUser == 'user'){ ?>
						<li class="nav-item">
							<a class="nav-link mr-3 menu" href="<?= base_url('input_pesanan');?>">Input pesanan</a>
						</li>
					<?php }else if($this->session->TipeUser == 'manager'){ ?>
						<li class="nav-item">
							<a class="nav-link mr-3 menu" href="<?= base_url('laporan');?>">Laporan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mr-3 menu" href="<?= base_url('users');?>">Users</a>
						</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link mr-3 menu" href="<?= base_url('profile');?>">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mr-3 menu" href="<?php echo base_url('logout');?>">Log out</a>
					</li>
				</ul>
			</div>
		</DIV>
	</nav> 

