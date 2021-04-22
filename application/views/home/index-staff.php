<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/css/tambah.css">

    <!-- My Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    
    <title>WebTix Staff</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <DIV class="container">
            <a class="navbar-brand" href="#"><h2>WebTix Staff</h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active ">
                    <a class="nav-link mr-3 menu" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link mr-3 menu" href="#">Film</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link mr-3 menu" href="#">Accounts</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link mr-3 menu" href="<?php echo base_url() ?>">Log out</a>
                </li>
                </ul>
            </div>
        </DIV>
        </nav> 
	<div class="container dokter">
    <div class="row">
        <div class="col">
            <h3>List Film</h3>
            <a href="<?php echo base_url('index.php/C_staff/tambahfilm') ?>" class="btn btn-warning">Tambah Film</a>
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <div class="card-deck">
                <div class="card" >
                    <img src="<?php echo base_url()?>assets/img/Contoh Poster 1.jpg" style="height: 352px; width: 200px; align-self: center;" >
                    <div class="card-body">
                        <h5 class="card-title" style="color: darkblue; text-align: center;">Avengers : Endgame</h5>
                        <p class="card-text" style="text-align: center;">Semua Umur</p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo base_url()?>assets/img/Contoh Poster 3.jpg" style="height: 352px; width: 200px; align-self: center;" >
                    <div class="card-body">
                        <h5 class="card-title" style="color: darkblue; text-align: center;">Mantan Manten</h5>
                        <p class="card-text" style="text-align: center">Remaja</p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo base_url()?>assets/img/Contoh Poster 2.jpg" style="height: 352px; width: 200px; align-self: center;" >
                    <div class="card-body">
                        <h5 class="card-title" style="color: darkblue; text-align: center;">Shazam</h5>
                        <p class="card-text" style="text-align: center;">Semua Umur</p>
                    </div>
                </div>
            </div>
            <nav aria-label="...">
                <ul class="pagination mt-4 justify-content-center">
                    <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active " aria-current="page">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
	</<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
