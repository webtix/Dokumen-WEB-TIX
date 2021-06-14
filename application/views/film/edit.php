<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Edit Film</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('film') ?>" class="btn btn-primary float-right">Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <?php foreach($film as $val){ ?>
                <form action="<?php echo base_url('film/update/'.$val['IDFilm']) ?>" method="post" enctype="multipart/form-data" class="row">
                    <div class="form-group col-md-6">
                        <label>Nama Film</label>
                        <input type="text" class="form-control" name="NamaFilm" placeholder="Masukan nama film" required value="<?php echo $val['NamaFilm'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Durasi Film</label>
                        <input type="number" class="form-control" name="Durasi" placeholder="Masukan durasi" required min="0" value="<?php echo $val['Durasi'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Rating</label>
                        <select name="Rating" class="form-control" required>
                            <option value="Semua Umur" <?php echo $val['RatingUmur'] == 'Semua Umur' ? 'selected' : '' ?>>Semua Umur</option>
                            <option value="Perlu Bimbingan Orang Tua" <?php echo $val['RatingUmur'] == 'Perlu Bimbingan Orang Tua' ? 'selected' : '' ?>>Perlu Bimbingan Orang Tua</option>
                            <option value="Terbatas" <?php echo $val['RatingUmur'] == 'Terbatas' ? 'selected' : '' ?>>Terbatas</option>
                            <option value="17 Tahun Keatas" <?php echo $val['RatingUmur'] == '17 Tahun Keatas' ? 'selected' : '' ?>>17 Tahun Keatas</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Poster</label>
                        <input type="file" class="form-control" name="poster" placeholder="Pilih file">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Sinopsis</label>
                        <textarea name="Sinopsis" class="form-control" placeholder="Masukan sinopsis" rows="5" required><?php echo $val['Sinopsis'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>