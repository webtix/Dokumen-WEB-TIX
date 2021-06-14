<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-top:15px; text-align: center; font-size:40px">Tambah Film</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('film') ?>" class="btn btn-primary float-right">Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <form action="<?php echo base_url('film/store') ?>" method="post" enctype="multipart/form-data" class="row">
                <div class="form-group col-md-6">
                    <label>Nama Film</label>
                    <input type="text" class="form-control" name="NamaFilm" placeholder="Masukan nama film" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Durasi Film</label>
                    <input type="number" class="form-control" name="Durasi" placeholder="Masukan durasi" required min="0">
                </div>
                <div class="form-group col-md-6">
                    <label>Rating</label>
                    <select name="Rating" class="form-control" required>
                        <option value="Semua Umur">Semua Umur</option>
                        <option value="Perlu Bimbingan Orang Tua">Perlu Bimbingan Orang Tua</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="17 Tahun Keatas">17 Tahun Keatas</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Poster</label>
                    <input type="file" class="form-control" name="poster" placeholder="Pilih file" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Sinopsis</label>
                    <textarea name="Sinopsis" class="form-control" placeholder="Masukan sinopsis" rows="5" required></textarea>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>