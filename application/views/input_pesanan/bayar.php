<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Bayar Pesanan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('pesanan') ?>" class="btn btn-primary float-right">Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <form action="<?php echo base_url('input_pesanan/store_bayaran/'.$id) ?>" method="post" enctype="multipart/form-data" class="row">
                <div class="form-group col-md-12">
                    <label>Jenis Pembayaran</label>
                    <select name="TipePembayaran" id="TipePembayaran" class="form-control" required>
                        <option value="Virtual Account Bank Mega">Virtual Account Bank Mega</option>
                        <option value="Virtual Account BCA">Virtual Account BCA</option>
                        <option value="Virtual Account BRI">Virtual Account BRI</option>
                        <option value="Virtual Account Mandiri">Virtual Account Mandiri</option>
                        <option value="Virtual Account BNI">Virtual Account BNI</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>