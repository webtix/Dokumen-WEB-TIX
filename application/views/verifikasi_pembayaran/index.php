<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Verifikasi Pembayaran</h1>
        </div>
    </div>
    
    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">No. </th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Film</th>
                        <th>Bioskop</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pesanan as $key => $pesanan){ ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $pesanan['Nama'] ?></td>
                            <td><?php echo $pesanan['Tanggal'] ?></td>
                            <td><?php echo $pesanan['NamaFilm'] ?></td>
                            <td><?php echo $pesanan['NamaBioskop'] ?></td>
                            <td>
                                <?php if($pesanan['Status'] == 'Pembayaran sedang di-verifikasi'){ ?>
                                    <a href="<?php echo base_url('verifikasi_pembayaran/store_verifikasi/'.$pesanan['IDOrder']) ?>" class="btn btn-success" onClick="return confirm('Apakah anda ingin mengkonfirmasi data ini?')">Verifikasi</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>