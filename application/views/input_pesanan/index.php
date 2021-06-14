<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">List Pemesanan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('input_pesanan/add') ?>" class="btn btn-primary float-right">Tambah pesanan</a>
        </div>
    </div>
    
    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">No. </th>
                        <th>Tanggal</th>
                        <th>Film</th>
                        <th>Bioskop</th>
                        <th>Status</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pesanan as $key => $pesanan){ ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $pesanan['Tanggal'] ?></td>
                            <td><?php echo $pesanan['NamaFilm'] ?></td>
                            <td><?php echo $pesanan['NamaBioskop'] ?></td>
                            <td><?php echo $pesanan['Status'] ?></td>
                            <td>
                                <?php if($pesanan['Status'] == 'Belum dibayar'){ ?>
                                    <a href="<?php echo base_url('input_pesanan/bayar/'.$pesanan['IDOrder']) ?>" class="btn btn-success">Bayar</a>
                                    <a href="<?php echo base_url('input_pesanan/delete/'.$pesanan['IDOrder']) ?>" class="btn btn-danger" onClick="return confirm('Apakah anda ingin menghapus data ini?')">Hapus</a>
                                <?php }else if($pesanan['Status'] == 'Pembayaran selesai di-verifikasi'){ ?>
                                    <a href="<?php echo base_url('input_pesanan/export/'.$pesanan['IDOrder']) ?>" class="btn btn-success" target="_BLANK">Cetak</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>