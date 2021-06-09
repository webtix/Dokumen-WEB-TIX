<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Booking Information</h1>
  

        </div>
    </div>
        <div class="row">
        <div class="regist rounded mx-auto d-block">
            <div class="detail">
                <img src="<?php echo base_url().'assets/img/'.$detailfilm['poster']; ?>" class="card-img" style="margin-top:5px; height: 352px; width: 245px;">
                <br style="font-size: 24px ;color: darkblue; text-align: center;"><?= $detailfilm['NamaFilm']?></br>
                <form action="<?php echo base_url('C_auth/tambah_user')?>" method="post">
                    <div class="biodata">Username</div>
                        <input class="form-control input" type="text" name="username" placeholder="masukkan username">
                    <div class="biodata">Password</div>
                        <input class="form-control input" type="password" name="password" placeholder="password">
                    <h2 style="text-align:center">________________________</h2> 
                    <div class="biodata">Nama</div>
                        <input class="form-control input" type="text" name="nama" placeholder="nama">
                    <div class="biodata">Email</div>
                        <input class="form-control input" type="text" name="email" placeholder="email"> 
                    <div class="biodata">No. HP</div>
                        <input class="form-control input" type="text" name="hp" placeholder="No. HP">
                    <div class="biodata">TTL</div>
                        <input class="form-control input" type="text" name="ttl" placeholder="Tempat, Tanggal Lahir">
                    <button type="submit" name="tambah" class="btn btn-warning float-right tombol">Daftar</button>
                    <a href="<?php echo base_url()?>">
                        <button type="button" class="btn btn-warning float-left tombol" >Kembali</button>
                    </a>
                </form>
            </div>
    </div>
</div>