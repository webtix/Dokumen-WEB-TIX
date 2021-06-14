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
                    <h3>Profile</h3>
                </div>
                <div class="card-body" >
                    <div class="media position-static">
                        Nama     : <?= $user['Nama'] ?></br>
                        Email    : <?= $user['Email'] ?></br>
                        Nomor HP : <?= $user['HP'] ?></br>
                        Tanggal Lahir  : <?= $user['Tanggal_Lahir'] ?></br>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>