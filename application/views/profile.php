<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Profile <?= $user['Nama'] ?></h1>
  

        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-size: 24px ;color: darkblue;">
                     <img src="<?php echo base_url().'assets/img/'.$user['foto_profil']; ?>" class="card-img" style="margin-top:5px; height: 352px; width: 345px;"></br>                        
                    <div class="card-body">
                        Nama     : <?= $user['Nama'] ?></br>
                        Email    : <?= $user['Email'] ?></br>
                        Nomor HP : <?= $user['HP'] ?></br>
                        Tanggal Lahir  : <?= $user['TTL'] ?></br>    
                    </div>
                </div>
                <div class="card-body" >
                    <div class="media position-static">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>