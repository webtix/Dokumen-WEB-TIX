<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Now Playing</h1>
  

        </div>
    </div>
    <?php foreach ($film as $f) :?>
        <div class="row mt-2">
            <div class="col">
                <div class="card row">
                    <a class="card-header" style="font-size: 24px ;color: darkblue; text-align: center;"><?= $f['NamaFilm']?></a>
                    <div class="card-body" >
                        <div class="media position-relative">
                            <div class="card-body">
                                <img src="<?php echo base_url().'assets/img/'.$f['poster']; ?>" class="card-img" style="margin-top:5px; height: 352px; width: 245px;">
                            </div>
                            <div class="media-body">
                                <h5 class="card-text" style="Color:grey">Rating Umur : <?= $f['RatingUmur'];?></h5>
                                <h5 class="card-text" style="Color:grey">Durasi : <?= $f['Durasi'];?> Menit</h5>
                                <div class="card-text position-relative">
                                    <h5 style="margin-left: 3px">Sinopsis :</h5>
                                    <p style="margin-left: 3px"><?= $f['Sinopsis'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>