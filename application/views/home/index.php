<div class="container dokter">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Now Playing</h1>
  

        </div>
    </div>
    <?php foreach ($film as $f) :?>
        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="font-size: 24px ;color: darkblue; text-align: center;">
                        <?= $f['NamaFilm']?>
                    </div>
                    <div class="card-body" >
                        <div class="media position-relative">
                            <div class="card-body">
                                <img src="<?php echo base_url().'assets/img/'.$f['poster']; ?>" class="card-img-top" 
                                        style="margin-top:5px; height: 352px; width: 245px;">
                                <h5 class="card-text"><?= $f['RatingUmur'];?></h5>
                            </div>
                            <div class="media-body">
                                <h5>Sinopsis</h5>
                                <p><?= $f['Sinopsis'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    <nav aria-label="...">
                    <ul class="pagination mt-4 justify-content-center">
                        <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled" aria-current="page">
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