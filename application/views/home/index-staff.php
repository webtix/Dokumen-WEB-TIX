<div class="container dokter">
    <div class="row">
        <div class="col">
            <h3>List Film</h3>
            <a href="<?php echo base_url('index.php/C_dokter/tambah_dokter') ?>" class="btn btn-warning">Tambah Film</a>
			<a href="<?php echo base_url('index.php/C_dokter/tambah_dokter') ?>" class="btn btn-warning">Edit List</a>
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <div class="card-deck">
                <div class="card" >
                    <img src="assets/img/Contoh Poster 1.jpg" style="height: 352px; width: 200px; align-self: center;" >
                    <div class="card-body">
                        <h5 class="card-title" style="color: darkblue; text-align: center;">Avengers : Endgame</h5>
                        <p class="card-text" style="text-align: center;">Semua Umur</p>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/img/Contoh Poster 3.jpg" style="height: 352px; width: 200px; align-self: center;" >
                    <div class="card-body">
                        <h5 class="card-title" style="color: darkblue; text-align: center;">Mantan Manten</h5>
                        <p class="card-text" style="text-align: center">Remaja</p>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/img/Contoh Poster 2.jpg" style="height: 352px; width: 200px; align-self: center;" >
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

