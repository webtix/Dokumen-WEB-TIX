<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>List Film</h3>
            <a href="<?php echo base_url('C_staff/tambahfilm') ?>" class="btn btn-warning">Tambah Film</a>
			
            <button href="<?php echo base_url('') ?>" class="btn btn-warning">Edit List</button>
        </div>
    </div>
    <?php foreach ($preview as $f) :?>
        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="font-size: 24px ;color: darkblue; text-align: center;">
                        <?= $f['NamaFilm']?>
                    </div>
                    <div class="card-body" >
                        <div class="media position-relative">
                            <div class="card-body">
                                <img src="<?php echo base_url().'assets/img/'.$f['poster']; ?>" class="card-img" style="margin-top:5px; height: 352px; width: 245px;">
                                
                            </div>
                            <div class="media-body">
                                <h5 class="card-text" style="Color:grey">Rating Umur : <?= $f['RatingUmur'];?></h5>
                                <h5 class="card-text" style="Color:grey">Durasi : <?= $f['Durasi'];?> Menit</h5>
                                <h5>Sinopsis</h5>
                                <p><?= $f['Sinopsis'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

