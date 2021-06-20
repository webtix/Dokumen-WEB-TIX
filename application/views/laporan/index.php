<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Cetak Laporan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('home') ?>" class="btn btn-primary float-right">Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <form action="<?php echo base_url('laporan/export') ?>" method="get" enctype="multipart/form-data" class="row" target="_BLANK">
                <div class="form-group col-md-12">
                    <label>Bioskop</label>
                    <select name="IDBioskop" id="IDBioskop" class="form-control" required>
                        <?php foreach($bioskop as $bioskop){ ?>
                            <option value="<?php echo $bioskop['IDBioskop'] ?>"><?php echo $bioskop['NamaBioskop'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary float-right" type="submit">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>